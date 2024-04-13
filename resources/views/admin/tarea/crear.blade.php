@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Crear Tarea</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
        
          
            <div class="card-body">
              <h4>Crear Nueva Tarea</h4>
              <form method="POST" class="needs-validation" novalidate="" action="/admin/tarea/crear">
                @csrf
               <!-- Titulo -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="titulo" class="form-control">
                </div>
              </div>
              <!-- Materia -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Materia</label>
                <div class="col-sm-12 col-md-7">
                  <select name="idMateria" class="form-control selectric">
                    @foreach ($materias as $materia)
                      <option value="{{ $materia->IdMateria }}" >{{ $materia->Nombre }}</option>
                    @endforeach
                    
                  </select>
                </div>
              </div>
              <!-- Fecha de Entrega -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fecha de Entrega</label>
                <div class="col-sm-12 col-md-7">
                  <input name="fechaentrega" type="date" class="form-control">
                </div>
              </div>
              <!-- Descripcion -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripcion</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="descripcion" class="summernote-simple"></textarea>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
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