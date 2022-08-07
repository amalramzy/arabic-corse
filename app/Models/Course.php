<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;
class Course extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $appends = ['image'];
    protected $fillable = [
        'title',
        'description',
        'status',
        'link',
        'track_id',
        'slug'
        
        
    ];
     //without save in database
    // public function getSlugAttribute(){
    //     $slugName = strtolower(str_replace(' ', '-', $this->title));
    //     $slug  = $this->$slugName;
    //     return $slug;
    // }


    public function getImageAttribute(){
        $url = $this->getFirstMediaUrl('image');
        return $url == "" ? null : $url;
    }

    public function photo(){
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function users(){
        return $this->belongsToMany(User::class);
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
