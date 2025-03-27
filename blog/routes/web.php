<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

// En el caso de que de que no especifiquemos un método en el controlador, Laravel buscará un método llamado __invoke
Route::get('/', [HomeController::class, '__invoke']);

Route::resource('posts', PostController::class);

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// // Ruta para mostrar un post en concreto
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// // Ruta para editar un post
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// // Ruta para eliminar un post
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::get('/posts/{post}/{category?}', function($post, $category = null) {
//     if ($category) {
//         return 'Devuelvo el post ' . $post . ' de la categoría ' . $category;
//     }

//     return 'Devuelvo el post ' . $post;
// });

Route::get('prueba', function() {
    /* Creación de nuevo registro post
        $post = new Post;

        $post->title = 'Mi segundo post';
        $post->content = 'Contenido de mi segundo post';
        $post->categoria = 'general 2';

        $post->save();
    */

    /* Recuperación y modificación de un registro
        $post = Post::find(1);
        $post = Post::where('title', 'Mi segundo post')->first();
        $post->categoria = 'Desarrollo web';

        $post->save();

        return $post;
    */

    /* Recuperación de registros
        $post = Post::all();
        $post = Post::where('id', '>=', 2)->get();
        $post = Post::orderBy('id', 'desc')->get();
        $post = Post::orderBy('id', 'desc')->select('id', 'title')->take(1)->get();
    */

    /* Eliminación de registros
        $post = Post::find(1);
        $post->delete();
    */

    $post = Post::find(1);

    // return $post->published_at->format('d/m/Y');
    dd($post->is_active);
});