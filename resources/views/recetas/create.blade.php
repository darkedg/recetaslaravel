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
  <h2 class="text-center mb-5">Crear nueva receta</h2>

  <div class="row justify-content-center mt-5">
    <div class="col-md-8">

      <form action="{{ route('recetas.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group">
          <label for="titulo">Titulo receta</label>
          <input
            type="text"
            name="titulo"
            class="form-control @error('titulo') is-invalid @enderror"
            id="titulo"
            placeholder="Titulo receta"
            value="{{ old('titulo') }}"
          >

          @error('titulo')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="categoria">Categoria</label>

          <select
            name="categoria"
            class="form-control @error('categoria') is-invalid @enderror"
            id="categoria"
          >
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
              <option
                value="{{ $categoria->id }}"
                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
              >{{ $categoria->nombre }}</option>                
            @endforeach
          </select>

          @error('categoria')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="preparacion">Preparación</label>
          <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
          <trix-editor
            class="form-control @error('preparacion') is-invalid @enderror"
            input="preparacion"
            value="{{ old('preparacion') }}"
          ></trix-editor>

          @error('preparacion')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="ingredientes">Ingredientes</label>
          <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
          <trix-editor
            class="form-control @error('ingredientes') is-invalid @enderror"
            input="ingredientes"
            value="{{ old('ingredientes') }}"
          ></trix-editor>

          @error('ingredientes')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="categoria">Elige la imagen</label>

          <input
            id="imagen"
            type="file"
            class="form-control @error('imagen') is-invalid @enderror"
            name="imagen"
          />

          @error('imagen')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group mt-3">
          <input type="submit" class="btn btn-primary" value="Agregar receta">
        </div>
      </form>

    </div>
  </div>
    
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js" integrity="sha512-8iE6dgykdask8wKpgxYbLCJMwoXudIVsYbzVk8qD7OUiaBzFLtfpmT5N6L5E1uT3j2Qjz2ynZCfDdrmAJzMkVg==" crossorigin="anonymous" defer></script>
@endsection