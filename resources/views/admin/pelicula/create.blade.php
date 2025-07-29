@extends('admin.layouts.main')

@section('title', 'Nueva Pelicula')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Completar el formulario para añadir una pelicula</div>
        </div>
        <form action="{{ route('pelicula.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="titulo" class="form-label @error('titulo') is-invalid @enderror">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}"
                        placeholder="Ingrese el titulo de la pelicula" required />
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="genero_id" class="form-label @error('genero_id') is-invalid @enderror">Genero</label>
                    <select name="genero_id" class="form-select" id="genero_id" required>
                        <option value="" disabled selected hidden>Seleccione una opción</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}" @selected(old('genero_id') == $genero->id)>{{ $genero->genero }}</option>
                        @endforeach
                    </select>
                    @error('genero_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="costo" class="form-label @error('costo') is-invalid @enderror">Costo</label>
                    <input type="number" class="form-control" id="costo" name="costo" value="{{ old('costo') }}"
                        placeholder="Ingrese el costo de la pelicula" required />
                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="estreno" class="form-label @error('estreno') is-invalid @enderror">Estreno</label>
                    <input type="date" class="form-control" id="estreno" name="estreno" value="{{ old('estreno') }}"
                        placeholder="Ingrese el estreno de la pelicula" required />
                    @error('estreno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="resumen" class="form-label @error('resumen') is-invalid @enderror">Resumen</label>
                    <textarea class="form-control" id="resumen" name="resumen" placeholder="Ingrese el resumen de la pelicula" required>{{ old('resumen') }}</textarea>
                    @error('resumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="directores" class="form-label @error('directores') is-invalid @enderror">Directores</label>
                    <select name="directores[]" class="form-select" id="directores" multiple required>
                        <option value="" disabled selected hidden>Seleccione una opción</option>
                        @foreach ($directores as $director)
                            <option value="{{ $director->id }}" @selected(is_array(old('directores')) && in_array($director->id, old('directores')))>
                                {{ $director->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('directores')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label @error('imagen') is-invalid @enderror">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen') }}"
                        placeholder="Ingrese el imagen de la pelicula" accept="image/*" required />
                    <small class="text-muted">Formatos aceptados: JPG, PNG, JPEG. Tamaño máximo: 2MB</small>
                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
                <a href="{{ route('pelicula.index') }}" class="btn float-end">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

