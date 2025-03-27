<x-app-layout>
    <h1>Formulario para crear un nuevo post</h1>

    {{ __('Client Closed Request') }}

    @if ($errors->any())
        <h2>Errores</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
    @endif

    <form action="/posts" method='POST'>

        @csrf

        <label>
            Título:
            <input type="text" name="title" value='{{ old('title') }}'>
        </label>

        @error('title')
            <p></p><strong>{{ $message }}</strong></p>
        @enderror

        <br>

        <label>
            Slug:
            <input type="text" name="slug" value='{{ old('slug') }}'>
        </label>

        @error('slug')
            <p></p><strong>{{ $message }}</strong></p>
        @enderror

        <br>

        <label>
            Categoría:
            <input type="text" name="category" value='{{ old('category') }}'>
        </label>

        @error('category')
            <p></p><strong>{{ $message }}</strong></p>
        @enderror

        <br>

        <label>
            Contenido:
            <textarea name="content" id="" cols="30" rows="10">{{ old('content')}}</textarea>
        </label>

        @error('content')
            <p></p><strong>{{ $message }}</strong></p>
        @enderror

        <br>

        <button type='submit'>Crear post</button>
    </form>
</x-app-layout>