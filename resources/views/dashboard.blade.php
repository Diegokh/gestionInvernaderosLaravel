<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nominas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <canvas id="dashboard"></canvas>
    </div>

    <script>
        const grafica = document.getElementById('dashboard');

        var datos = {!! json_encode($datos) !!}

        new Chart(grafica, {
            type: 'bar',
            data: {
                    labels: datos.map(row => row.dueños),
                    datasets: [{
                    label: 'Dueños / Nº de Invernaderos',
                    data: datos.map(row => row.cantidad),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var datos = @json($datos);
    </script>
</body>
</html>