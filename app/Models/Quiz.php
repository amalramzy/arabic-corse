<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        
    ];

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
