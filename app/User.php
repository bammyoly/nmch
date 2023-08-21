<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'name', 'email', 'password', 'admin', 'gender', 'avatar', 'slug',
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

    public function is_admin()
    {
        if($this->admin)
        {
            return true;
        }
        return false;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }*/

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function mrequests()
    {
        return $this->hasMany(Mrequest::class);
    }


}



