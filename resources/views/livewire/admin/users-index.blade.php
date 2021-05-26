{{-- esta vista se crea al crear el archivo de livewire UsersIndex --}}
<div>
     <div class="card">
        {{-- el input para buscar usuarios --}}
        <div class="card-header">
            {{-- con wire:search sincronizo el input con la variable publica definida en UserIndex --}}
            <input wire:model="search" class="form-control" placeholder="ingrese el nombre o correo de un usuario">
        </div>
        {{-- si la coleccion users al menos tiene un registro entra al if --}}
            @if ($users->count())              
        <div class="card-body">
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>                      
                        <th>Nombre</th>                      
                        <th>Email</th>                      
                        <th></th>                      
                    </tr>
                </thead>
                <tbody>
                     @foreach ($users as $user)
                         <tr>
                             <td>{{$user->id}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td width="10px">
                                 <a  class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>         
         {{-- para que muestre los enlaces de navegacion --}}
             <div class="card-footer">
                 {{$users->links()}}
             </div>
         
         @else
             <div class="card-body">
                 <strong>No hay registros asociados a su busqueda</strong>
             </div>
         @endif
     </div>
</div>
