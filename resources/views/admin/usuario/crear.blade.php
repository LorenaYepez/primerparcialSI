
@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Crear Usuario</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
        
          
            <div class="card-body">
              <h4>Crear Nueva Usuario</h4>
              <form method="POST" class="needs-validation" novalidate="" action="/admin/usuario/crearUsuario">
                @csrf
               <!-- Nombre -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nombre</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="Nombre" class="form-control">
                </div>
              </div>
               <!-- Apellido -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Apellido</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="Apellido" class="form-control">
                </div>
              </div>
               <!-- Email -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="Email" class="form-control">
                </div>
              </div>
               <!-- Rol -->
               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rol</label>
                <div class="col-sm-12 col-md-7">
                  <select name="Role" class="form-control selectric">
                      <option value="admin" >Administrador</option>
                      <option value="profesor" >Profesor</option>
                      <option value="padre" >Padre</option>
                      <option value="user" >Estudiante</option>
                  </select>
                </div>
              </div>

               <!-- Estado -->
               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Estado</label>
                <div class="col-sm-12 col-md-7">
                  <select name="Estado" class="form-control selectric">
                      <option value="active" >Activo</option>
                      <option value="inactive" >Desactivo</option>
                  </select>
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