<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
@include('../nav/nav', ['nav_name' => 'Personal'])
    <div class="container mt-5 mb-5 border border-info rounded">
        <h4 class="text-secondary  m-3">Nuevo Personal</h4>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <hr/>
        <form class="mt-5 mb-3" action="{{route('personal.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" id="nombre" name="Nombres" required class="form-control " placeholder="Juan">
                </div>

            </div>

            <div class="form-group row">
                <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
                <div class="col-sm-10">
                    <input type="text" id="apellido" name="Apellidos" required class="form-control " placeholder="Martinez">
                </div>
            </div>

            <div class="form-group row">
                <label for="dni" class="col-sm-2 col-form-label">DNI:</label>
                <div class="col-sm-10">
                    <input type="text" id="dni" name="DNI" required class="form-control " placeholder="00000000">
                </div>
            </div>

            <div class="form-group row">
                <label for="correo" class="col-sm-2 col-form-label">Correo electrónico:</label>
                <div class="col-sm-10">
                    <input type="email" id="correo" name="Correo" required class="form-control " placeholder="abc@abc.com">
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>
                <div class="col-sm-10">
                    <input type="date" id="fecha_nacimiento" name="fechaNacimiento" required class="form-control ">
                </div>
            </div>

            <div class="d-flex justify-content-around  mt-5 mb-5">
                <a class="btn btn-outline-danger" href="{{route('personal.index')}}">Cancelar</a>
                <button class="btn btn-success pr-4 pl-4" type="submit">Enviar</button>
            </div>
            
    </div>


    </form>


</body>

</html>