<?php
    // NOTAS
    // Formas de mostrar datos PHP en la vista
    // <?php echo $post; !> // CAMBIAR ! POR ?
    // <?= $post!>

    $type = 1;
    $collection = ['array 1', 'array 2'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel tutorial | posts</title>
</head>
<body>

    <a href='{{route('posts.index')}}'>Regresar</a>

    <!-- Mostrar datos -->
    <h1>Título: {{ $post->title }}</h1>

    <p>
        <b>Categoría: {{ $post->category}}</b>
    </p>

    <p>
        <b>Contenido: {{ $post->content }}</b>
    </p>

    <a href='{{route('posts.edit', $post)}}'>Editar</a>

    <form action="{{route('posts.destroy', $post)}}" method='POST'>

        @csrf
        @method('DELETE')

        <button type='submit'>Eliminar</button>
    </form>
</body>
</html>