<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Course;
use App\Models\Track;
class User extends Authenticatable implements HasMedia 
{
    use HasFactory,InteractsWithMedia, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $appends = ['avatar'];
    protected $fillable = [
        'name', 'email', 'password','score'
    ];

    public function getAvatarAttribute(){
        $url = $this->getFirstMediaUrl('avatar');
        return $url == "" ? null : $url;
    }

    public function photo(){
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function tracks(){
        return $this->belongsToMany(Track::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function quizzes(){
        return $this->belongsToMany(Quiz::class);
    }

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
}
