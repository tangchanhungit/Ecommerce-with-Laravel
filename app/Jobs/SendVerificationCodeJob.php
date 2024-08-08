<?php

namespace App\Jobs;


use App\Mail\SendVerificationCodeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail as MailFacade;

class SendVerificationCodeJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $email;
    protected $verificationCode;

    public function __construct($email, $verificationCode)
    {
        $this->email = $email;
        $this->verificationCode = $verificationCode;
    }

    public function handle()
    {
        MailFacade::to($this->email)->send(new SendVerificationCodeMail($this->verificationCode));
    }
}
