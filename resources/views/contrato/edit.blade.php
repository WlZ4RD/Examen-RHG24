<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
@include('../nav/nav', ['nav_name' => 'Contrato'])
    <div class="container mt-5 mb-5 border border-info rounded">
        <h4 class="text-secondary  m-3">Editar Contrato</h4>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <hr />
        <form class="mt-5 mb-3" action="{{route('contrato.update', $contrato)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="personal_id" id="personal" value="{{$contrato->personal_id}}">
            <div class="form-group row">
                <label for="DNI" class="col-sm-2 col-form-label">DNI:</label>
                <div class="row col-sm-10">
                    <div class="col"> <input class="form-control mr-sm-2 " type="search" id="search" placeholder="Ingrese DNI para buscar..." aria-label="Search"></div>
                    <div class="col">
                        <select class="form-control" id="DNI" name="DNI">
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DNI Registrado:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " value="{{$contrato->personal->DNI}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="Area" class="col-sm-2 col-form-label">Área:</label>
                <div class="col-sm-10">
                    <input type="text" id="Area" name="Area" required class="form-control " value="{{$contrato->Area}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Cargo" class="col-sm-2 col-form-label">Cargo:</label>
                <div class="col-sm-10">
                    <input type="text" id="Cargo" name="Cargo" required class="form-control " value="{{$contrato->Cargo}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Local" class="col-sm-2 col-form-label">Local:</label>
                <div class="col-sm-10">
                    <input type="text" id="Local" name="Local" required class="form-control " value="{{$contrato->Local}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Inicio" class="col-sm-2 col-form-label">Fecha de Inicio:</label>
                <div class="col-sm-10">
                    <input type="date" id="Inicio" name="Inicio" required class="form-control " value="{{$contrato->Inicio}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Fin" class="col-sm-2 col-form-label">Fecha de Fin:</label>
                <div class="col-sm-10">
                    <input type="date" id="Fin" name="Fin" required class="form-control " value="{{$contrato->Fin}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Tipo" class="col-sm-2 col-form-label">Tipo de Contrato:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="Tipo" name="Tipo" required>
                        <option value="">Seleccione una opción</option>
                        <option value="1" <?php echo($contrato->Tipo == '1' ? 'selected' : '') ?>>Tipo 1</option>
                        <option value="2" <?php echo($contrato->Tipo == '2' ? 'selected' : '') ?>>Tipo 2</option>
                        <option value="3" <?php echo($contrato->Tipo == '3' ? 'selected' : '') ?>>Tipo 3</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-around  mt-5 mb-5">
                <a class="btn btn-outline-danger" href="{{route('contrato.index')}}">Cancelar</a>
                <button class="btn btn-success pr-4 pl-4" type="submit">Enviar</button>
            </div>
    </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("#search").keyup(function(e) {
            var search = $("#search").val();
            if (search.length > 3) { //Enviar valor si su longitud es mayor que 3
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '{{route("contrato.search")}}',
                    data: {
                        'search': search
                    },
                    success: function(Response) {
                        $('#DNI').empty();
                        $('#personal').val('');
                        $('#DNI').append(new Option('Seleccione una opción', ''));
                        Response.data.forEach(element => {
                            $('#DNI').append(new Option(element.DNI, element.id));
                        });

                    },
                    statusCode: {
                        404: function() {
                            alert('web not found');
                        }
                    },
                    error: function(x, xs, xt) {
                        alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
                    }
                });
            }
        });


        $('#DNI').change(function() {
            $('#personal').val(this.value);
        });
    </script>
</body>

</html>