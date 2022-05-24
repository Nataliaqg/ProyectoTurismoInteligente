<div>
    <x-table-responsive>

     <thead>
        <tr>

            <th>ID</th>
            <th>USUARIO</th>
            <th>EMAIL</th>
            <th>FECHA DE CREACION</th>
            <th>FECHA DE EDICION</th>
        </tr>

     </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
        @endforeach

      </tbody>

    </x-table-responsive>

</div>
