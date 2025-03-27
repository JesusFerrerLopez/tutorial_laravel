<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.posts.index')">
            Posts
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class='card'>

        <form action="{{route('admin.posts.store')}}" method="POST" class="space-y-4">

            @csrf

            <flux:input label="Título" name="title" value="{{old('title')}}" placeholder="Título del post" oninput="string_to_slug(this.value, '#slug')" class="mb-4"/>

            <flux:input label="Slug" id="slug" name="slug" value="{{old('slug')}}" placeholder="Slug del post" class="mb-4"/>

            <flux:select label="Categoría" name="category_id" class="mb-4">
                @foreach ($categories as $category)
                    <flux:select.option value="{{ $category->id }} :selected="$category->id === old('category_id')"">
                        {{ $category->name }}
                    </flux:select.option>
                @endforeach
                
            </flux:select>

            <flux:button variant="primary" type="submit">
                Enviar
            </flux:button>

        </form>

    </div>

</x-layouts.app>