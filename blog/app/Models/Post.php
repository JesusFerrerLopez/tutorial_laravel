<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // En el caso de que en el modelo no se especifique la tabla, Laravel buscará una tabla con el nombre del modelo en minúsculas y en plural
    // Tener en cuenta que la convención es en ingles, category -> categories, person -> people, etc.
    protected $table = 'posts';

    // Determina las propiedades que se pueden rellenar en la base de datos a través de un formulario
    protected $fillable = ['title', 'content', 'slug', 'category'];

    // Determina las propiedades que no se pueden rellenar en la base de datos a través de un formulario
    protected $guarded = ['is_active'];

    protected function casts() : array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean'
        ];
    }

    protected function title(): Attribute 
    {
        return Attribute::make(
            set: function ($value) {
                return strtolower($value);
            },  
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
