@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Tarea</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Lista de Tarea</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               
                  <div class="card-footer text-right">
                    <a class="btn btn-primary"  href="/admin/tarea/vistacrear">Crear Tarea </a>
                  </div>
               

                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha de Entrega</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($Tareas as $tarea)
                  <tr>
                    <td>{{ $tarea->IdTarea }}</td>  
                    <td>{{ $tarea->Titulo }}</td>  
                    <td>{{ $tarea->Descripcion }}</td>
                    <td>{{ $tarea->FechaEntrega }}</td>
                    <td>{{ $tarea->nombremateria}}</td>
                    <td>
                      @switch($tarea->Estado)
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
                    
                    <td><a href="/admin/tarea/vistaeditar/{{ $tarea->IdTarea}}" class="btn btn-secondary">Editar</a></td>
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