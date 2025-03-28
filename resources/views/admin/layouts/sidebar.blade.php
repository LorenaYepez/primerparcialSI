<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Bienvenido</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span> Gestión Administración</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('admin.usuario') }}">Gestionar Usuarios y Roles</a></li>
                            <li><a class="nav-link" href="{{ route('admin.materia') }}">Gestionar Materia</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span> Gestión Académica</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="{{ route('admin.publicacion') }}"> Gestionar Publicaciones</a></li>
                          <li><a class="nav-link" href="{{ route('admin.calendario') }}"> Gestionar Calendario</a></li>
                      </ul>
                  </li>
                   
                @elseif (Auth::user()->role === 'profesor')
                    <li class="dropdown active">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Gestión Académica</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('admin.publicacion') }}"> Gestionar Publicaciones</a></li>
                            <li><a class="nav-link" href="{{ route('admin.tarea') }}"> Gestionar Tareas</a></li>
                            <li><a class="nav-link" href="{{ route('admin.calendario') }}"> Gestionar Calendario</a></li>
                            <li><a class="nav-link" href="{{ route('admin.actividad') }}"> Gestionar Actividades</a></li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role === 'padre')
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Gestión Académica</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.publicacion') }}"> Gestionar Publicaciones</a></li>
                        <li><a class="nav-link" href="{{ route('admin.tarea') }}"> Gestionar Tareas</a></li>
                        <li><a class="nav-link" href="{{ route('admin.calendario') }}"> Gestionar Calendario</a></li>
                        <li><a class="nav-link" href="{{ route('admin.actividad') }}"> Gestionar Actividades</a></li>
                    </ul>
                </li>
                @elseif (Auth::user()->role === 'user')
                <li class="dropdown active">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Gestión Académica</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.publicacion') }}"> Gestionar Publicaciones</a></li>
                        <li><a class="nav-link" href="{{ route('admin.tarea') }}"> Gestionar Tareas</a></li>
                        <li><a class="nav-link" href="{{ route('admin.calendario') }}"> Gestionar Calendario</a></li>
                        <li><a class="nav-link" href="{{ route('admin.actividad') }}"> Gestionar Actividades</a></li>
                    </ul>
                </li>
                @endif
            @endauth

    </aside>
</div>


{{-- 
      <li class="dropdown active">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Gestión Académica</span></a>
          <ul class="dropdown-menu">
            <li class=active><a class="nav-link" href="{{route('admin.tarea')}}">Tareas</a></li>
            <li><a class="nav-link" href="{{route('admin.actividad')}}">Actividades</a></li>
            <li><a class="nav-link" href="{{route('admin.publicacion')}}">Publicaciones</a></li>
            <li><a class="nav-link" href="{{route('admin.actividad')}}">Comentarios y Consultas</a></li>
            <li><a class="nav-link" href="{{route('admin.calendario')}}">Calendario Escolar</a></li>
            <li><a class="nav-link" href="{{route('admin.actividad')}}">Comunicados y Avisos</a></li>
          </ul>
        </li> 
        --}}
