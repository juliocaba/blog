
@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
<a  class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}" >Nuevo Post</a>    
<h1>Listado de Post </h1>
    
@stop

@section('content')
{{-- alerta de eliminacion exitosa --}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
{{-- contenido de livewire para mostrar la vista post-index --}}
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop