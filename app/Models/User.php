<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
    ] ;

    protected $hidden = [
        'password',
    ] ;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function hasRole($role)
    {
        $roles = $this->roles()->pluck('role_name')->toArray();
  
        return in_array($role, $roles);
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
