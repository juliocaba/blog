<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', NULL, ['class' => 'form-control', 'placeholder' => 'Ingrese un nombre de rol']) !!}                
    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>            
<h2 class="h3 mt-3">Lista de permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, NULL, ['class' => 'mr-1']) !!}
            {{$permission->description}}
        </label>
    </div>
@endforeach