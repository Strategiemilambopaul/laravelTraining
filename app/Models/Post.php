<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['tittle','content'];

    public function comments()
    {
        return $this->morphMany(comment::class, 'commentable');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function artistImage()
    {
        return $this->hasOneThrough(Artist::class,Image::class);
    }
    public function recentImage()
    {
        return $this->hasOne(Image::class)->latestOfMany();
    }
    public function previousImage()
    {
        return $this->hasOne(Image::class)->oldestOfMany();
    }
}
