<x-mail::message>
#Correo por aprobar

<x-mail::panel>
    Se ha creado un nuevo post que necesita ser aprobado
</x-mail::panel>

<x-mail::button :url="route('posts.show', $post)">
    Click para ver el post
</x-mail::button>

</x-mail::message>