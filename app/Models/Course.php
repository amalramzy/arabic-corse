<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
        'link',
        'track_id'
        
    ];

    public function photo(){
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function quizzes(){
        return $this->hasMany('App\Models\Quiz');
    }

    public function track(){
        return $this->belongsTo('App\Models\Track');
    }

    public function videos(){
        return $this->hasMany('App\Models\Video');
    }
}
