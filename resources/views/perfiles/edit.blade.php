@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('botones')
  <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" /></svg>
    Volver
  </a>
@endsection

@section('content')
  {{-- {{ $perfil->usuario }} --}}
  <h1 class="text-center">Editar mi Perfil</h1>

  <div class="row justify-content-center mt-5">
    <div class="col-md-10 bg-white p-3">
      <form
        action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input
            type="text"
            name="nombre"
            class="form-control @error('nombre') is-invalid @enderror"
            id="nombre"
            placeholder="Tu nombre"
            value="{{ $perfil->usuario->name }}"
          >

          @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="url">Sitio web</label>
          <input
            type="text"
            name="url"
            class="form-control @error('url') is-invalid @enderror"
            id="url"
            placeholder="Tu sitio web"
            value="{{ $perfil->usuario->url }}"
          >

          @error('url')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="biografia">Biografia</label>
          <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">
          <trix-editor
            class="form-control @error('biografia') is-invalid @enderror"
            input="biografia"            
          ></trix-editor>

          @error('biografia')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="imagen">Tu imagen</label>

          <input
            id="imagen"
            type="file"
            class="form-control @error('imagen') is-invalid @enderror"
            name="imagen"
          />

          @if( $perfil->imagen )
            <div class="mt-4">
              <p>Imagen Actual</p>
              <img src="/storage/{{ $perfil->imagen }}" alt="imagen" style="width: 300px">
            </div>

            @error('imagen')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          @endif

          <div class="form-group mt-3">
            <input type="submit" class="btn btn-primary" value="Actualizar perfil">
          </div>
        </div>

      </form>
    </div>
  </div>

  
    
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js" integrity="sha512-8iE6dgykdask8wKpgxYbLCJMwoXudIVsYbzVk8qD7OUiaBzFLtfpmT5N6L5E1uT3j2Qjz2ynZCfDdrmAJzMkVg==" crossorigin="anonymous" defer></script>
@endsection