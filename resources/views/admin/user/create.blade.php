@extends('admin.layouts.main')

@section('title', 'Nuevo Usuario')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Completar el formulario para añadir un nuevo usuario</div>
        </div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label @error('name') is-invalid @enderror">Nombre de usuario</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Ingrese nombre completo" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Correo electónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="example@domain.com" required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label @error('role') is-invalid @enderror">Tipo de usuario</label>
                    <select name="role" class="form-select" id="role" required>
                        <option value="" disabled selected hidden>Seleccione una opción</option>
                        <option value="member" @selected(old('role') == 'member')>Miembro</option>
                        <option value="admin" @selected(old('role') == 'admin')>Administrador</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
                <a href="{{ route('user.index') }}" class="btn float-end">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
