<div>

    {{-- <H1>REPORTE DE USUARIOS</H1> --}}
    {{-- <th>REPORTE DE USUARIOS</th> --}}
    <x-table-responsive>

     <thead>
        <tr>

            <th>ID</th>
            <th>USUARIO</th>
            <th>EMAIL</th>
            <th>CARNET DE IDENTIDAD</th>
            <th>TELEFONO</th>
            <th>EDAD</th>
            <th>FECHA DE CREACION</th>
            <th>FECHA DE EDICION</th>
            <th>TIPO DE USUARIO</th>
        </tr>

     </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->carnetIdentidad}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->edad}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                @if (count($user->roles))
                 <td>Administrador</td>   
                    @else
                    <td>Cliente</td>
                @endif
            </tr>
        @endforeach

      </tbody>

    </x-table-responsive>

</div>
