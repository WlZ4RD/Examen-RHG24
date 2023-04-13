<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    @include('../nav/nav', ['nav_name' => 'Personal'])
    <div class="container mt-5">
        <div class="d-flex  justify-content-between mt-3 mb-4">
            <div class="mr-3">
                <a class="btn btn-success" href="{{route('personal.index')}}">Cancelar</a>
            </div>
            <div>
                <form action="{{route('personal.eliminate', $personal)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-info text-white">{{$personal->Nombres}}</div>
                    <div class="card-body">
                        <img class="card-img-top" src="https://img.freepik.com/vector-premium/icono-perfil-avatar_188544-4755.jpg?w=2000" alt="">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 border border-info p-3 rounded">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <div class="bg-info text-white text-center">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <input class="form-control " type="text" id="nombre" name="Nombres" value="{{$personal->Nombres}}" disabled>
                        </div>

                        <div class="mb-3">
                            <div class="bg-info text-white text-center">
                                <label for="apellido">Apellido:</label>
                            </div>
                            <input class="form-control " type="text" id="apellido" name="Apellidos" value="{{$personal->Apellidos}}" disabled>
                        </div>
                        <div class="mb-3">
                            <div class="bg-info text-white text-center">
                                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                            </div>
                            <input class="form-control " type="date" id="fecha_nacimiento" name="fechaNacimiento" value="{{$personal->fechaNacimiento}}" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <div class="bg-info text-white text-center">
                                <label for="dni">DNI:</label>
                            </div>
                            <input class="form-control " type="text" id="dni" name="DNI" value="{{$personal->DNI}}" disabled>

                        </div>
                        <div class="mb-3">
                            <div class="bg-info text-white text-center">
                                <label for="correo">Correo electrónico:</label>
                            </div>
                            <input class="form-control " type="email" id="correo" name="Correo" value="{{$personal->Correo}}" disabled>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>


</body>

</html>