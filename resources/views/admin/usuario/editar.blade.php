@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Editar Usuario</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">


                            <div class="card-body">
                                <h4>Editar Usuario</h4>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form method="POST" class="needs-validation" novalidate="" action="/admin/usuario/editar">
                                    @csrf
                                    <!-- Nombre -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="Nombre" class="form-control" value="{{ $usuario->name }}">
                                        </div>
                                    </div>
                                    <!-- Apellido -->
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Apellido</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="Apellido" class="form-control" value="{{ $usuario->apellido }}">
                                        </div>
                                    </div>
                                   
                                    <!-- Email -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="Email" class="form-control" value="{{ $usuario->email }}">
                                        </div>
                                    </div>
                                    <!-- Contraseña -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contraseña</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="password" class="form-control" >
                                        </div>
                                    </div>

                                    <!-- Rol -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rol</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="Role" class="form-control selectric">
                                                <option value="admin">Administrador</option>
                                                <option value="profesor">Profesor</option>
                                                <option value="padre">Padre</option>
                                                <option value="user">Estudiante</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="hidden" id="idUsuario" name="idUsuario"
                                                value="{{ $usuario->id }}">
                                            <button class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
