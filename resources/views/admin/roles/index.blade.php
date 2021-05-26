
@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <a  class="btn btn-secondary btn-sm float-right" href="{{route('admin.roles.create')}}" >Crear un Rol</a>        
    <h1>Lista de roles</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body">            
          <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colespan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                    </td>                    
                    <td width="10px">
                        <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop