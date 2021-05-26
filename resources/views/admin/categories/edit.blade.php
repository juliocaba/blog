@extends('adminlte::page')

@section('title', 'editar')

@section('content_header')
    <h1>Editar categoria</h1>
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
        {!! Form::model($category, ['route'=>['admin.categories.update', $category],'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre de la categoria']) !!}
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'slug') !!}
            {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'ingrese el slug de la categoria','readonly']) !!}
            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::submit('Actualizar categoria', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
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
@endsection

{{-- 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    @stop --}}