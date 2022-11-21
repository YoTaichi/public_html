<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'identity',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    public function articles () {
        return $this->hasMany('App\Models\ArticleModel');
    }
    public function article_floor () {
        return $this->hasMany('App\Models\ArticleFloorModel');
    }

    public function message () {
        return $this->hasMany('App\Models\MessageModel');
    }

    public function article_tag () {
        return $this->hasMany('App\Models\ArticleTagModel');
    }

    public function good () {
        return $this->hasMany('App\Models\GoodModel');
    }

    public function bad () {
        return $this->hasMany('App\Models\BadModel');
    }

    public function blacklist () {
        return $this->hasMany('App\Models\BlackListModel');
    }

    public function sign_in () {
        return $this->hasMany('App\Models\SignInModel');
    }

    public function lr_game () {
        return $this->hasMany('App\Models\LeftRightGameModel');
    }

}
