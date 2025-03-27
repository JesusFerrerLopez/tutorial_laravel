<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Relación uno a muchos
    public function comments()
    {
        // return $this->hasMany(Comment::class);
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Relación muchos a muchos
    public function tags()
    {
        // return $this->belongsToMany(Tag::class);
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
