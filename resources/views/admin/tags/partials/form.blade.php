<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name', NULL, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'slug') !!}
    {!! Form::text('slug', NULL, ['class'=>'form-control', 'placeholder'=>'Ingrese el slug de la etiqueta','readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('color', 'color') !!}
    {!! Form::select('color', $colors, null, ['class'=>'form-control']) !!}
        {{-- <label for="">Color</label>
        <select  class="form-control" name="color">
            <option value="red">Color rojo</option>
            <option value="green">Color verde</option>
            <option value="blue" selected>Color azul</option>
        </select> --}}
    @error('color')
        <small class="text-danger">{{$message}}</small>
    @enderror