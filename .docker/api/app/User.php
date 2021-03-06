<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
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

    // Relacionamentos
    public function comments() {
      return $this->hasMany('App\comment');
    }

    public function contents() {
      return $this->hasMany('App\content');
    }

    public function likes() {
      return $this->belongsToMany('App\content', 'likes', 'user_id', 'content_id');
    }

    public function friends() {
      return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function getAvatarAttribute($value) {
      return asset($value);
    }
}
