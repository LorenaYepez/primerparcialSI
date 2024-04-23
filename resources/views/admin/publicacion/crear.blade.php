@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-title"></div>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.profile')}}"><i class="fas fa-user"></i> Editar Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.publicacion')}}"><i class="fas fa-file"></i> Publicaciones</a>
          </li>
        </ul>
    </div>
    
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
        
          
            <div class="card-body">
              <h4>Crear Nueva Publicacion</h4>
              <form method="POST" class="needs-validation" novalidate="" action="/admin/publicacion/crear">
                @csrf
               <!-- Titulo -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="titulo" class="form-control">
                </div>
              </div>
              <!-- Usuario -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Usuario</label>
                <div class="col-sm-12 col-md-7">
                  <select name="idUsuario" class="form-control selectric">
                    @foreach ($usuarios as $usuario)
                      <option value="{{ $usuario->id }}" >{{ $usuario->name }}</option>
                    @endforeach
                    
                  </select>
                </div>
              </div>
              <!-- Fecha-->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fecha</label>
                <div class="col-sm-12 col-md-7">
                  <input name="fecha" type="date" class="form-control">
                </div>
              </div>
              <!-- Tipo -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipo</label>
                <div class="col-sm-12 col-md-7">
                  <select name="tipo" class="form-control selectric">
                      <option value="General" >General</option>
                      <option value="Individual" >Individual</option>
                  </select>
                </div>
              </div>
              <!-- Descripcion -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripcion</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="descripcion" class="summernote"></textarea>
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