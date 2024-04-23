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
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.actividad') }}"><i class="fas fa-file"></i>
                        Actividad</a> </li>
            </ul>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lista de Actividades</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-footer text-right">
                                    <a class="btn btn-primary" href="/admin/actividad/vistacrear">Crear</a>
                                </div>


                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Materia</th>
                                        <th>Estado</th>
                                    </tr>
                                    @foreach ($Actividades as $actividad)
                                        <tr>
                                            <td>{{ $actividad->IdActividad }}</td>
                                            <td>{{ $actividad->Titulo }}</td>
                                            <td>{{ $actividad->Descripcion }}</td>
                                            <td>{{ $actividad->FechaInicio }}</td>
                                            <td>{{ $actividad->FechaFin }}</td>
                                            <td>{{ $actividad->nombremateria }}</td>
                                            <td>
                                                @switch($actividad->Estado)
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
                                            <td><a href="/admin/actividad/vistaeditar/{{ $actividad->IdActividad }}"
                                                    class="btn btn-icon icon-left btn-warning"><i
                                                        class="far fa-edit"></i>Editar</a></td>
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
