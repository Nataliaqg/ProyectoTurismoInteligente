<div>

    {{-- <H1>REPORTE DE USUARIOS</H1> --}}
    {{-- <th>REPORTE DE USUARIOS</th> --}}
    <x-table-responsive>

     <thead>
        <tr>

            <th>ID</th>
            <th>capacidad_mesa</th>
            <th>cantidad_mesa</th>   
            <th>restaurante</th>         
        </tr>

     </thead>
      <tbody>
        @foreach ($mesas as $mesa)
            <tr>
                <td>{{$mesa->id}}</td>
                <td>{{$mesa->capacidad_mesa}}</td>
                <td>{{$mesa->cantidad_mesas}}</td>    
                <td>{{$mesa->restaurante->nombre}}</td>      
                
               
            </tr>
        @endforeach

      </tbody>

    </x-table-responsive>

</div>
