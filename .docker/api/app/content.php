<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    @var array
    
    protected $fillable = [
      'title', 'text', 'image', 'link', 'date '
    ];


    // Relacionamentos
    public function comments() {
      return $this->hasMany('App\comment');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
