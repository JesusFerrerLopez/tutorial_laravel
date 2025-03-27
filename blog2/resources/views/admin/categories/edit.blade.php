<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.categories.index')">
            Categorias
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class='card'>

        <form action="{{route('admin.categories.update', $category)}}" method="POST">

            @csrf
            @method('PUT')

            <flux:input name="name" value="{{old('name', $category->name)}}" placeholder="Nombre de la categoria" class="mb-4"/>

            <flux:button variant="primary" type="submit">
                Enviar
            </flux:button>

        </form>

    </div>

</x-layouts.app>