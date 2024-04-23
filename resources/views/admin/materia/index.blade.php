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
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.materia') }}"><i class="fas fa-file"></i> Materia</a> </li>
            </ul>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lista de Materias</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-footer text-right">
                                    <a class="btn btn-primary" href="/admin/materia/vistacrear">Crear nueva materia</a>
                                </div>

                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                    </tr>
                                    @foreach ($Materias as $materia)
                                        <tr>
                                            <td>{{ $materia->IdMateria }}</td>
                                            <td>{{ $materia->Nombre }}</td>
                                            <td>{{ $materia->Descripcion }}</td>
                             
                                            <td><a href="/admin/materia/vistaeditar/{{ $materia->IdMateria }}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>Editar</a></td>
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
