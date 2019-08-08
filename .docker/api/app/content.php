<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'title', 'text', 'image', 'link', 'date'
    ];


    // Relacionamentos
    public function comments() {
      return $this->hasMany('App\comment');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function likes() {
      return $this->belongsToMany('App\User', 'likes', 'content_id', 'user_id');
    }
}
