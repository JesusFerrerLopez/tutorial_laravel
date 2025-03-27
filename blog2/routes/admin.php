<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\admin\TagController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Definición de rutas para el panel de administración
// Middleware aplica protección CSRF y verifica que el usuario esté autenticado
Route::middleware(['web', 'auth'])
    // prefijo de la ruta y nombre de las rutas para uso en la aplicación
    ->prefix('admin')
    ->name('admin.')
    // agrupar rutas para aplicar middleware a todas las rutas del grupo
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('tags', TagController::class);
    });
