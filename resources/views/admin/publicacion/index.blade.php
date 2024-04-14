@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-title"></div>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.publicacion') }}"><i class="fas fa-file"></i>
                        Publicaciones</a>
                </li>
            </ul>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Publicaciones</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="card-footer text-right">
                                    <a class="btn btn-primary" href="/admin/publicacion/vistacrear">Crear Publicacion </a>
                                </div>

                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                    @foreach ($Notificaciones as $notificacion)
                                        <tr>
                                            <td>{{ $notificacion->IdNotificacion }}</td>
                                            <td>{{ $notificacion->Titulo }}</td>
                                            <td>{{ $notificacion->Descripcion }}</td>
                                            <td>{{ $notificacion->Tipo }}</td>
                                            <td>{{ $notificacion->Fecha }}</td>
                                            <td>{{ $notificacion->nombreusuario }}</td>
                                            <td>
                                                @switch($notificacion->Estado)
                                                    @case(0)
                                                        <span class="badge badge-danger">Inhabilitado</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-warning">Pendiente</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-success">Aceptado</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge badge-secondary">Anulado</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge badge-danger">Expirado</span>
                                                    @break

                                                    @default
                                                        <span class="badge badge-light">Desconocido</span>
                                                @endswitch
                                            </td>
                                            <td><a href="/admin/publicacion/vistaeditar/{{ $notificacion->IdNotificacion}}" class="btn btn-secondary">Editar</a></td>
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
