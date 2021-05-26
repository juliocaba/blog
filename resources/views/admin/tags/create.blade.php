
@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- esta herramienta es de laravel colective, no hace falta poner el csrf y autoamticamente se envia con post --}}
            {!! Form::open(['route'=>'admin.tags.store']) !!}
            @include('admin.tags.partials.form')
            {!! Form::submit('crear etiqueta', ['class'=>'btn btn-primary']) !!}
                
            </div>
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
@endsection
