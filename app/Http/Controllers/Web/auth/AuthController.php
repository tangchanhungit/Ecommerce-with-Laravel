<?php
namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendVerificationCodeMail;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $user = $this->userRepository->findByEmail($email);

        $request->session()->put('email', $email);

        if ($user) {
            return redirect()->route('password.form');
        } else {
            $this->sendVerificationCode($email);
            
            return redirect()->route('register.form');
        }
    }   

    public function showLoginForm(){
        return view("auth.login");
    }

    public function showPasswordForm(Request $request){
        $email = $request->session()->get('email');
        
        return view("auth.password", compact('email'));
    }

    public function showRegisterForm(Request $request){
        $email = $request->session()->get('email');
        return view("auth.register",compact('email'));
    }

    public function login(Request $request)
    {
        $email = $request->session()->get('email');

        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.home');
            }

            return redirect()->route('home');
        }

        return redirect()->route('password.form')->withErrors(['password' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        $code = $request->input('code');
        $email = $request->session()->get('email');
        $storedCode = session('verification_code');
        $storedTimestamp = session('verification_code_timestamp');

        if (!$storedCode || !$storedTimestamp) {
            return redirect()->route('register.form')->withErrors(['code' => 'Verification code has expired.']);
        }

        $currentTime = now()->timestamp;
        $timeDifference = $currentTime - $storedTimestamp;

        if ($timeDifference > 60) {
            Session::forget('verification_code');
            Session::forget('verification_code_timestamp');
            Session::forget('email');
            return redirect()->route('register.form')->withErrors(['code' => 'Verification code has expired.']);
        }

        if ($code != $storedCode) {
            return redirect()->route('register.form')->withErrors(['code' => 'Invalid verification code']);
        }

            $user = $this->userRepository->createUser([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $email,
                'password' => $request->input('password'),
            ]);

        Auth::login($user);

        Session::forget('verification_code');
        Session::forget('verification_code_timestamp');
        Session::forget('email');

        return redirect()->route('home')->with('success', __('Registration successful!'));
    }

    public function sendVerificationCode($email)
    {
        $verificationCode = rand(100000, 999999);

        Mail::to($email)->send(new SendVerificationCodeMail($verificationCode));

        Session::put('verification_code', $verificationCode);
        Session::put('verification_code_timestamp', now()->timestamp);
        Session::put('email', $email);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
