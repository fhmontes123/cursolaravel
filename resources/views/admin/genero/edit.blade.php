@extends('admin.layouts.main')

@section('title', 'Editar Genero')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Completar el formulario para editar genero</div>
        </div>
        <form action="{{ route('genero.update', $genero->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="genero" class="form-label @error('genero') is-invalid @enderror">Nombre de genero</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero', $genero->genero) }}"
                        placeholder="Ingrese nombre del genero" required />
                    @error('genero')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
                <a href="{{ route('genero.index') }}" class="btn float-end">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
