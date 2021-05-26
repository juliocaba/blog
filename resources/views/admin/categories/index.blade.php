@extends('adminlte::page')

@section('title', 'Blog de Julio - Categorias   ')

@section('content_header')
@can('admin.categories.create')
    <a href="{{route('admin.categories.create')}}" class="btn btn-secondary btn-sm float-right">Agregar Categoria</a> 
@endcan
<h1>Categorias</h1>    
@stop

@section('content')
    <p>Lista de categorias</p>
    {{-- alerta de actualizacion exitosa --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    {{-- para crear una tarjeta uso dos divs anidados, uno con card y el hijo con card-body --}}
    <div class="card">
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID:</th>
                    <th>Name:</th>
                    <th colspan="2"></th>                
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name   }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a>                                                              
                                @endcan                                
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>                    
                                @endcan
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}