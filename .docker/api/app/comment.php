<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
     
    @var array
    
    protected $fillable = [
      'content_id', 'text', 'date'
    ];


    // Relacionamentos
    public function user() {
      return $this->belongsTo('App\User' );
    }

    public function content() {
      return $this->belongsTo('App\content');
    }
}