@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Editar Actividad</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
               
          
            <div class="card-body">
              <h4>Editar Actividad</h4>
              @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
              <form method="POST" class="needs-validation" novalidate="" action="/admin/actividad/editar">
                @csrf
               <!-- Titulo -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="titulo" class="form-control" value="{{$actividad->Titulo }}">
                </div>
              </div>
              <!-- Materia -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Materia</label>
                <div class="col-sm-12 col-md-7">
                  <select name="idMateria" class="form-control selectric">
                    @foreach ($materias as $materia)
                      <option value="{{ $materia->IdMateria }}"  {{ $materia->IdMateria === $actividad->IdMateria ? 'selected' : '' }}  >{{ $materia->Nombre }}</option>
                    @endforeach
                    
                  </select>
                </div>
              </div>
              <!-- Fecha Inicio-->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fecha Inicio</label>
                <div class="col-sm-12 col-md-7">
                  <input name="fechainicio" type="date" class="form-control"  value="{{$actividad->FechaInicio }}">
                </div>
              </div>
              <!-- Fecha Fin -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fecha Fin</label>
                <div class="col-sm-12 col-md-7">
                  <input name="fechafin" type="date" class="form-control"  value="{{$actividad->FechaFin }}">
                </div>
              </div>
              <!-- Fecha de Descripcion -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripcion</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="descripcion" class="summernote-simple">{{$actividad->Descripcion }}</textarea>
                  
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <input type="hidden" id="idActividad" name="idActividad" value="{{$actividad->IdActividad }}">
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