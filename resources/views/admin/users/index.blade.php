@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
{{-- con esta directiva renderiza la vista creada por el comando de livewire --}}
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop