<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>

<body>
    @include('../nav/nav', ['nav_name' => 'Contrato'])

    <div class="container border border-info mt-5 rounded">
        <div class="m-3 d-flex flex-row-reverse">
            <a class="btn btn-success" href="{{route('contrato.create')}}">Nuevo Contrato</a>
        </div>
    </div>
    <div class="container border border-info mt-5 rounded">
        <hr />
        <div class="mt-3 mb-5">
            <h4 class="text-secondary  mb-3">Lista de contratos</h4>

            <table class="table table-striped mt-4 mb-5" id="tableContratos">
                <thead class="bg-info text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th>DNI</th>
                        <th>Área</th>
                        <th>Cargo</th>
                        <th>Local</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse($contratos as $contrato)
                    <tr>
                        <th scope="row">{{$contrato->id}}</th>
                        <td>{{$contrato->personal->DNI}}</td>
                        <td>{{$contrato->Area}}</td>
                        <td>{{$contrato->Cargo}}</td>
                        <td>{{$contrato->Local}}</td>
                        <td>{{$contrato->Inicio}}</td>
                        <td>{{$contrato->Fin}}</td>
                        <td>{{$contrato->Tipo}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('contrato.show',$contrato)}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('contrato.edit',$contrato)}}" class="btn btn-warning">Editar</a>
                                <a href="{{route('contrato.delete',$contrato)}}" class="btn btn-danger">Dar de Baja</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p>No hay contratos.</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    <script>
        $(document).ready(function() {
                console.log('hola');
            $('#tableContratos').DataTable();
        });
    </script>
</body>

</html>