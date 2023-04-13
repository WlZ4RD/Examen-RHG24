<div>
    <nav class="navbar navbar-expand-lg navbar-light   bg-info">
        <a class="navbar-brand text-white" href="#">Gestión de {{ $nav_name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link text-white  btn btn-info" href="{{route('personal.index')}}">Personal<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white btn btn-info" href="{{route('contrato.index')}}">Contratos<span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>
</div> 
