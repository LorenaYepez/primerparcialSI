@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Usuario</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lista de Usuario</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-footer text-right">
                                    <a class="btn btn-primary" href="/admin/usuario/vistacrearusuario">Crear Usuario </a>
                                </div>

                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->apellido }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @switch($usuario->role)
                                                    @case('admin')
                                                        <span class="badge badge-warning">ADMINISTRATIVO</span>
                                                    @break

                                                    @case('profesor')
                                                        <span class="badge badge-secondary">PROFESOR</span>
                                                    @break

                                                    @case('padre')
                                                        <span class="badge badge-success">PADRE</span>
                                                    @break

                                                    @default
                                                        <span class="badge badge-light">ESTUDIANTE</span>
                                                @endswitch
                                            </td>
                                            <td><a href="/admin/usuario/vistaeditar/{{ $usuario->id}}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>Editar</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
