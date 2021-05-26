
@extends('adminlte::page')

@section('title', 'Blog de Julio')

@section('content_header')
    <h1>Crear un nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off', 'files' => true]) !!}
            
                   {{-- modularizacion del form --}} 
                 @include('admin.posts.partials.form')               

                {!! Form::submit('Crear Post', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%; 
        }
    </style>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- anduvo con el 1.3.0 nada mas --}}
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js')}}"></script>
{{-- este script toma la informacion del form.group donde esta name y la escribe en el que esta slug --}}

{{-- para darle estilos de word al textarea --}}
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    $(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });
});

/*  para asignarle el ckeditor, estilo de word a cada textarea   */
ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

/* cambiar imagen */
document.getElementById("file").addEventListener('change', cambiarImagen);
        
        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
</script>

@endsection