<div>

    {{-- <H1>REPORTE DE USUARIOS</H1> --}}
    {{-- <th>REPORTE DE USUARIOS</th> --}}
    <x-table-responsive>

     <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Contacto</th>
            <th scope="col">Carnet</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Adquisicion</th>
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
                <td>{{ $paquete->created_at }}</td>
                <td>{{ $paquete->total }} BS</td>
            </tr>
        @endforeach

      </tbody>

    </x-table-responsive>

</div>
