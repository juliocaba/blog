<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name', NULL, ['class'=>'form-control','placeholder'=>'ingrese el nombre del post']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'slug') !!}
        {!! Form::text('slug', NULL, ['class'=>'form-control','readonly']) !!}
        @error('slug')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'categoria') !!}
        {!! Form::select('category_id', $categories, NULL, ['class'=>'form-control']) !!}
        @error('category_id')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, NULL) !!}
                            {{$tag->name}}
                        </label>
                    @endforeach
                    @error('tags')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>
                    <label>
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{-- para la imagen --}}
                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            {{-- con isset si la variable esta definida la muestra sino muestra la que esta por defecto, como un if pero mas backend --}}
                            @isset ($post->image)
                                <img id="picture" src="{{Storage::url($post->image->url)}}">                            
                            @else
                                <img  id="picture" src="https://cdn.pixabay.com/photo/2021/04/05/18/02/villa-balbiano-6154200_960_720.jpg">    
                            @endisset
                        </div>                        
                    </div>                    
                    {{-- segunda columna --}}
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen del Post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file','accept' => 'image/*']) !!}                            
                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('extract', 'extracto') !!}
                    {!! Form::textarea('extract', NULL, ['class'=>'form-control']) !!}
                    @error('extract')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'cuerpo') !!}
                    {!! Form::textarea('body', NULL, ['class'=>'form-control']) !!}
                    @error('body')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>