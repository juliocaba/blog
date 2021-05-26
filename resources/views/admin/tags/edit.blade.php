
@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
{{-- alerta de actualizacion exitosa --}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route'=>['admin.tags.update',$tag],'method'=>'put']) !!}
            @include('admin.tags.partials.form')

            {!! Form::submit('Actualizar etiqueta', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- anduvo con el 1.3.0 nada mas --}}
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js')}}"></script>
{{-- este script toma la informacion del form.group donde esta name y la escribe en el que esta slug --}}
<script>
    $(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });
});
</script>
@stop