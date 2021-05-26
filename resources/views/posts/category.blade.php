{{-- no se si lo aclare pero esta directiva muestra la plantilla principal --}}
<x-app-layout>
<div class=" container py-8">
    <h1 class="uppercase text-center text-3xl font-bold  mt-4">
        categoria: {{$category->name}}    
    </h1>
    @foreach ($posts as $post)
    {{-- llama a la variable anonima y le pasa el post del foreach --}}
        <x-card-post :post="$post"/>
    @endforeach
    {{-- links de navegacion --}}
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>
</x-app-layout>