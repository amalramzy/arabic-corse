<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Passport\HasApiTokens;
class Admin extends Authenticatable implements HasMedia
{
    use HasFactory,InteractsWithMedia, HasApiTokens;
    protected $guard = 'admin';
    protected $appends = ['image'];
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function getImageAttribute(){
        $url = $this->getFirstMediaUrl('image');
        return $url == "" ? null : $url;
    }
}
