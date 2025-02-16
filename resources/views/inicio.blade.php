<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroSmart - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-4 rounded shadow w-50">
        <h1 class="text-primary">AgroSmart</h1>
        <h3>Bienvenido {{ Auth::user()->nombreUsuario }}</h3>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Cerrar Sesión</button>
        </form>

        <div class="mt-4">
            <ul class="list-group">
                @if(Auth::user()->rolUsuario == 'Administrador')
                    <li class="list-group-item list-group-item-action"><a href="{{ route('alertas.index') }}" class="text-decoration-none text-dark">Consultar Alertas de Usuarios</a></li>
                    <li class="list-group-item list-group-item-action"><a href="{{ route('usuarios.index') }}" class="text-decoration-none text-dark">Gestionar Usuarios</a></li>
                    <li class="list-group-item list-group-item-action"><a href="{{ route('invernaderos.index') }}" class="text-decoration-none text-dark">Gestionar Invernaderos</a></li>
                    <li class="list-group-item list-group-item-action"><a href="{{ route('historialControl.index') }}" class="text-decoration-none text-dark">Consultar Historial de Control</a></li>
                    <li class="list-group-item list-group-item-action"><a href="{{ url('/usuariosInvernaderosJSON') }}" class="text-decoration-none text-dark">Consulta JSON</a></li>


                @endif
                @if(Auth::user()->rolUsuario == 'Estandar')
                        <li class="list-group-item list-group-item-action"><a href="{{ route('alertas.index') }}" class="text-decoration-none text-dark">Consultar Alertas de Usuarios</a></li>
                        <li class="list-group-item list-group-item-action"><a href="{{ route('historialControl.index') }}" class="text-decoration-none text-dark">Consultar Historial de Control</a></li>
                    @endif


            </ul>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
