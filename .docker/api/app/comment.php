<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'content_id', 'text', 'date'
    ];


    // Relacionamentos
    public function user() {
      return $this->belongsTo('App\User');
    }

    public function content() {
      return $this->belongsTo('App\content');
    }

    public function getDateAttribute($value) {
        return date('H:i d/m/Y', strtotime($value));
    }