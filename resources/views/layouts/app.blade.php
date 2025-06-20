<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Legal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px;">
            <h4 class="text-center">Notaría Legal</h4>
            <hr>
            <p><strong>Usuario:</strong><br>{{ auth()->user()->name }}</p>
            <p><strong>Rol:</strong><br>{{ ucfirst(auth()->user()->role->name) }}</p>
            <hr>
            <ul class="nav flex-column">
    <li class="nav-item">
        <a href="{{ url('/dashboard') }}" class="nav-link text-white">Inicio</a>
    </li>

{{-- Menú para Superadmin --}}
@if(auth()->user()->role->name === 'superadmin')
    <li class="nav-item">
        <a href="{{ url('/usuarios') }}" class="nav-link text-white">Gestionar Usuarios</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/roles') }}" class="nav-link text-white">Roles y Permisos</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/auditoria') }}" class="nav-link text-white">Auditoría del Sistema</a>
    </li>
@endif

{{-- Menú para Notario --}}
@if(auth()->user()->role->name === 'notario')
    <li class="nav-item">
        <a href="{{ url('/casos') }}" class="nav-link text-white">Mis Casos</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/citas') }}" class="nav-link text-white">Agendar Citas</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/opiniones') }}" class="nav-link text-white">Opiniones Legales</a>
    </li>
@endif

{{-- Menú para Ayudante --}}
@if(auth()->user()->role->name === 'ayudante')
    <li class="nav-item">
        <a href="{{ url('/tareas') }}" class="nav-link text-white">Tareas Asignadas</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/documentos') }}" class="nav-link text-white">Subir Documentos</a>
    </li>
@endif


    <li class="nav-item mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Cerrar sesión</button>
        </form>
    </li>
</ul>

        </div>

        <!-- Main content -->
        <div class="flex-fill p-4">
            @yield('content')
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
