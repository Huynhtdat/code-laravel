<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Staff\{StaffRoles, StaffGender};

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'username',
        'fullname',
        'email',
        'phone',
        'avatar',
        'gender',
        'birthday',
        'token_get_password',
        'password',
        'roles'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_querified_at' => 'datetime',
        'gender' => StaffGender::class,
        'roles' =>StaffRoles::class,
        'birthday' => 'date'
    ];
}
