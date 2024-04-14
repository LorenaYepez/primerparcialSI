@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Editar Perfil</h1>
     
    </div>
    <div class="section-body">

      <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}">
                @csrf
              <div class="card-header">
                <h4>Datos del Usuario</h4>
              </div>
              <div class="card-body">
                  <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required="">
                      <div class="invalid-feedback">
                        Complete el campo
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Correo Electronico</label>
                      <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required="">
                      <div class="invalid-feedback">
                        Complete el campo
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>

           <!--  -->
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <span class="alert alert-danger"></span>
              @endforeach
            @endif
            <form method="post" class="needs-validation" novalidate="" action="{{route('admin.password.update')}}">
                @csrf
      
              <div class="card-body">
                  <div class="row">        

                    <div class="form-group col-md-6 col-12">
                      <label>Contraseña Actual</label>
                      <input type="text" class="form-control" name="current_password" >
                  </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nueva Contraseña</label>
                      <input type="text" class="form-control" name="password" >
                  </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Confirmar Contraseña</label>
                      <input type="text" class="form-control" name="password_confirmation" >
                  </div>

              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Cambiar Contraseña</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection