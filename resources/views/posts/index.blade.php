<x-app-layout>
    {{-- ml-auto y mr-auto es para centrarlo --}}
    <div class="container  py-8">
        {{-- grilla de 3,2,1 columnas dependiendo del tamaño de pantalla, con una separacion de 6=3em --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                {{-- con el if de blade dentro del class logro que se coloque la primera imagen en 2 espacios --}}
                    <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2021/04/05/18/02/villa-balbiano-6154200_960_720.jpg @endif)">
                        {{-- con los full le doy todo el ancho y alto posible --}}
                        <div class="w-full h-full py-8 flex-col justify-center">
                            <div class="">
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                                @endforeach
                            </div>
                            <h1 class="text-4xl text-white ladding-8 font-bold mt-2">
                                <a href="{{Route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                        </div>
                    </article>
                @endforeach
        </div>
        {{-- paginacion --}}
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>