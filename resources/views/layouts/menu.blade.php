<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    @can('ver-citas')
    <a class="nav-link" href="/citas/calendar">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    @endcan
    @can('ver-citas')
    <a class="nav-link" href="/citas/calendar">
        <i class=" fas fa-building"></i><span>Ver citas</span>
    </a>
    @endcan
  
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>

    @can('ver-medico')
    <a class="nav-link" href="/medicos">
        <i class=" fas fa-users"></i><span>Medicos</span>
    </a>
    @endcan
    @can('ver-propietarios')
    <a class="nav-link" href="/propietarios">
        <i class=" fas fa-users"></i><span>Propietarios</span>
    </a>
    @endcan
    @can('ver-pacientes')
    <a class="nav-link" href="/especie">
        <i class=" fas fa-users"></i><span>Especies</span>
    </a>
    @endcan
    @can('ver-pacientes')
    <a class="nav-link" href="/raza">
        <i class=" fas fa-users"></i><span>Razas</span>
    </a>
    @endcan
    @can('ver-pacientes')
    <a class="nav-link" href="/pacientes">
        <i class=" fas fa-users"></i><span>Pacientes</span>
    </a>
    @endcan
    @can('ver-historial')
    <a class="nav-link" href="/historial">
        <i class=" fas fa-users"></i><span>Historial clinico</span>
    </a>
    @endcan
   
    @can('ver-citas')
    <a class="nav-link" href="/citas">
        <i class=" fas fa-users"></i><span>Mis citas</span>
    </a>
    @endcan

    <a class="nav-link" href="/roles">
        <i class=" fas fa-users"></i><span>Roles</span>
    </a>
 
    @can('ver-medico')
    <a class="nav-link" href="/especialidad">
        <i class=" fas fa-users"></i><span>Especialidades</span>
    </a>
    @endcan
   
</li>
