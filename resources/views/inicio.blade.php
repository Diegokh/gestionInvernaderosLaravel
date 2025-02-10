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
        <p class="fs-4">Bienvenido administrador</p>

        <button class="btn btn-danger mt-3">Cerrar Sesión</button>

        <div class="mt-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action"><a href="{{ route('alertas.index') }}" class="text-decoration-none text-dark">Consultar Alertas de Usuarios</a></li>
                <li class="list-group-item list-group-item-action"><a href="{{ route('usuarios.index') }}" class="text-decoration-none text-dark">Gestionar Usuarios</a></li>
                <li class="list-group-item list-group-item-action"><a href="{{ route('invernaderos.index') }}" class="text-decoration-none text-dark">Gestionar Invernaderos</a></li>
                <li class="list-group-item list-group-item-action"><a href="{{ route('historialControl.index') }}" class="text-decoration-none text-dark">Consultar Historial de Control</a></li>
                <li class="list-group-item list-group-item-action"><a href="{{ route('inicioSesion.index') }}" class="text-decoration-none text-dark">Consultar Historial de Control</a></li>

            </ul>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
