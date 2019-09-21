<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function create($user)
    {
        if (!empty($user)) {
            $inst = new User();
            $inst->name = $user['name'];
            $inst->email = $user['email'];
            $inst->password = Hash::make($user['password']);
            $inst->mobile_number = $user['mobile'];
            $inst->age = $user['age'];
            $inst->created_at = date('Y-m-d H:i:s');
            $inst->updated_at = date('Y-m-d H:i:s');
            return $inst->save();
        }
    }
}
