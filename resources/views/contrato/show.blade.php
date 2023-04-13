<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('../nav/nav', ['nav_name' => 'Contrato'])
    <div class="container mt-5 mb-5 border border-info rounded">
        <h4 class="text-secondary  m-3">Contrato</h4>
        <hr />

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">DNI:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="{{$contrato->personal->DNI}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="Area" class="col-sm-2 col-form-label">Área:</label>
            <div class="col-sm-10">
                <input type="text" id="Area" name="Area" disabled class="form-control " value="{{$contrato->Area}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Cargo" class="col-sm-2 col-form-label">Cargo:</label>
            <div class="col-sm-10">
                <input type="text" id="Cargo" name="Cargo" disabled class="form-control " value="{{$contrato->Cargo}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Local" class="col-sm-2 col-form-label">Local:</label>
            <div class="col-sm-10">
                <input type="text" id="Local" name="Local" disabled class="form-control " value="{{$contrato->Local}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Inicio" class="col-sm-2 col-form-label">Fecha de Inicio:</label>
            <div class="col-sm-10">
                <input type="date" id="Inicio" name="Inicio" disabled class="form-control " value="{{$contrato->Inicio}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Fin" class="col-sm-2 col-form-label">Fecha de Fin:</label>
            <div class="col-sm-10">
                <input type="date" id="Fin" name="Fin" disabled class="form-control " value="{{$contrato->Fin}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Tipo" class="col-sm-2 col-form-label">Tipo de Contrato:</label>
            <div class="col-sm-10">
                <select class="form-control" id="Tipo" name="Tipo" disabled>
                    <option value="">Seleccione una opción</option>
                    <option value="1" <?php echo ($contrato->Tipo == '1' ? 'selected' : '') ?>>Tipo 1</option>
                    <option value="2" <?php echo ($contrato->Tipo == '2' ? 'selected' : '') ?>>Tipo 2</option>
                    <option value="3" <?php echo ($contrato->Tipo == '3' ? 'selected' : '') ?>>Tipo 3</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-around  mt-5 mb-5">
            <a class="btn btn-outline-danger" href="{{route('contrato.index')}}">Cancelar</a>
        </div>
    </div>
</body>

</html>