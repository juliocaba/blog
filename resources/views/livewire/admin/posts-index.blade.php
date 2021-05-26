{{-- al usar livewire se debe poner todo dentro de una etiqueta div padre --}}
<div class="card">
    
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre del post">
        </div>
    
@if ($posts->count())       
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}" role="button">Editar</a>
                        </td>
                        <td width="10px">
                            <form method="post" action="{{route('admin.posts.destroy', $post)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
    {{-- para que muestre la paginacion --}}
    <div class="card-footer">
        {{$posts->links()}}
    </div>  
@else
    <div class="card-body">
        <strong>No hay ningun registro que coincida</strong>
    </div>
@endif

</div>

