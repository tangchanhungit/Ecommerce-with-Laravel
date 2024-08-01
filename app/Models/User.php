<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ] ;

    protected $hidden = [
        'password',
    ] ;

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function hasRole($role): bool
    {
        $roles = $this->roles()->pluck('role_name')->toArray();
        Log::info('User roles: ' . implode(', ', $roles));
        $hasRole = in_array($role, $roles);
        Log::info('Checking role: ' . $role . ', Result: ' . ($hasRole ? 'true' : 'false'));
        return $hasRole;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
