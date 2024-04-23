@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Editar Materia</h1>
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
              <form method="POST" class="needs-validation" novalidate="" action="/admin/materia/editar">
                @csrf
               <!-- Titulo -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="titulo" class="form-control" value="{{$materia->Nombre }}">
                </div>
              </div>
              <!-- Descripcion -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripcion</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="descripcion" class="summernote">{{$materia->Descripcion }}</textarea>
                  
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <input type="hidden" id="idMateria" name="idMateria" value="{{$materia->IdMateria }}">
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