<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>

<body>
    @include('../nav/nav', ['nav_name' => 'Personal'])
    <div class="container border border-info mt-5 rounded">
        <div class="m-3 d-flex flex-row-reverse">
            <a class="btn btn-success" href="{{route('personal.create')}}">Nuevo Personal</a>
        </div>
    </div>
    <div class="container border border-info mt-5 rounded">
        <hr />
        <div class="mt-3 mb-5">
            <h4 class="text-secondary  mb-3">Lista de personales</h4>

            <table class="table table-striped mt-4 mb-5" id="tablePersonales">
                <thead class="bg-info text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Correo electrónico</th>
                        <th>Fecha de nacimiento</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse($personales as $personal)
                    <tr>
                        <th scope="row">{{$personal->id}}</th>
                        <td>{{$personal->Nombres}}</td>
                        <td>{{$personal->Apellidos}}</td>
                        <td>{{$personal->DNI}}</td>
                        <td>{{$personal->Correo}}</td>
                        <td>{{$personal->fechaNacimiento}}</td>
                        <td>{{$personal->Estado == 1 ? 'Activo':'Inactivo'}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('personal.show',$personal)}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('personal.edit',$personal)}}" class="btn btn-warning">Editar</a>
                                <a href="{{route('personal.delete',$personal)}}" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p>No hay usuarios.</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#tablePersonales').DataTable();
        });
    </script>
</body>

</html>