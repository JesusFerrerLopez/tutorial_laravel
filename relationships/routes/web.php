<?php

use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {
    
    $post = Post::find(1);

    $post->comments()->create([
        'content' => 'Este es un comentario de prueba'
    ]);
});
