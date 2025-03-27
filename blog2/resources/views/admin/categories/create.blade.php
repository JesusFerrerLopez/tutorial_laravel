<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.categories.index')">
            Categorias
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class='card'>

        <form action="{{route('admin.categories.store')}}" method="POST">

            @csrf

            <flux:input name="name" value="{{old('name')}}" placeholder="Nombre de la categoria" class="mb-4"/>

            <flux:button variant="primary" type="submit">
                Enviar
            </flux:button>

        </form>

    </div>

</x-layouts.app>