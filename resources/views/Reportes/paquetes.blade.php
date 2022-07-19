<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte  de Paquetes comprados</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/estilospdfhorizontal.css') }}">
</head>
<body>
	<header>
        <br>
        <p><strong>Id del usuario que realizo el reporte: {{auth()->user()->id}} </strong></p>
        <p><strong>Nombre del usuario que realizo el reporte: {{auth()->user()->name}} </strong></p>
        <p><strong>Fecha del reporte: {{now()->format('Y-m-d')}} </strong></p>
        <p><strong>Hora del reporte: {{ now()->format('H:i')}} </strong></p>
    </header>
    <main>
        <h5 style="text-align: center"><strong>REPORTES DE PAQUETES COMPRADOS DE  {{$empresa->nombre}} </strong></h5>
        <table class="table table-striped text-center ">
            <thead class="bg-info">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Total Bs</th>
                </tr>
            </thead>
           <tbody>
            @foreach ($paquetes as $paquete)
            <tr>
                <td>{{ $paquete->id }}</td>
                <td>{{ $paquete->user->name }}</td>
                <td>{{ $paquete->contact }}</td>
                <td>{{ $paquete->carnet }}</td>
                <td>{{ $paquete->phone }}</td>
                <td>{{ $paquete->email }}</td>
                <td>{{ $paquete->total }} BS</td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        
    </footer>
</body>
</html>