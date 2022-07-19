<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte  de Usuarios</title>
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
        <h5 style="text-align: center"><strong>REPORTES DE USUARIOS DE {{$empresa->nombre}} </strong></h5>
        <table class="table table-striped text-center ">
            <thead class="bg-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">USUARIO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CARNET DE IDENTIDAD</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">FECHA DE CREACION</th>
                    <th scope="col">TIPO DE USUARIO</th>
                </tr>
            </thead>
           <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->carnetIdentidad }}</td>
                <td>{{ $user->telefono }}</td>
                <td>{{ $user->edad }}</td>
                <td>{{ $user->created_at }}</td>
                @if (count($user->roles))
                <td>Administrador</td>   
                   @else
                   <td>Cliente</td>
               @endif
            </tr>
        @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        
    </footer>
</body>
</html>