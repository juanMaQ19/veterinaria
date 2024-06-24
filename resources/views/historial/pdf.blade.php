<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Veterinaria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Historial de Veterinaria</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Paciente</th>
                <th>Medico</th>
                <th>Temperatura</th>
                <th>Peso</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $historial)
                <tr>
                    <td>{{ $historial->fechaR }}</td>
                    <td>{{ $historial->paciente->nombre }}</td>
                    <td>{{ $historial->medico->nombre }}</td>
                    <td>{{ $historial->temperatura }}</td>
                    <td>{{ $historial->peso }}</td>
                    <td>{{ $historial->diagnostico }}</td>
                    <td>{{ $historial->tratamiento }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
