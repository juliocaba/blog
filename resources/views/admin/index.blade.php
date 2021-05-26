{{-- para integrar adminLTE instalo los siguiente comandos: 
    
    composer require jeroennoten/laravel-adminlte
    
    php artisan adminlte:install

    y luego copio las clases de abajo para que complete el dashboard
    --}}

@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <h1>Blog con Laravel</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop