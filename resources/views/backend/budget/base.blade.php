<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jordan-Plas | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.gif" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto+Mono&display=swap" rel="stylesheet">
    <style>
      body {
        background-color: #f4f4f4;
      }

      label, legend {
        font-size: 1rem;
      }

      p {
        margin: 0
      }

      h4 {
        font-size: 1rem
      }

      h2 {
        font-size: 1.5rem
      }

      img {
        max-width: 100%;
      }

      .card {
        border-radius: 8px;
        border: none;
        box-shadow: 0px 0px 25px -10px rgba(0,0,0,0.4);;
      }
    </style>
    @yield('styles')
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top|fixed-bottom|sticky-top">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{ asset('logos/logo-vert.svg') }}" alt="Logo Jordan Plas">
          </a>
          <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/backend/backendHome') }}"> Inicio </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('/backend/products') }}">Productos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/backend/images') }}">Imágenes </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('budget') }}">Crear un presupuesto</a>                
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('list') }}">Presupuestos</a>
              </li>
            </ul>
            <form action="{{ route('search-budget') }}" method="GET" class="d-flex my-2 my-lg-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" name="search" value="" type="text" placeholder="Buscar presupuesto">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Buscar</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="container">
        <div class="row mt-4">
          <div class="col-sm-12">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ $error }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endforeach
            @endif

            @if (session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>
        </div>
      </div>
      @yield('content')
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js')}}"></script>
    @yield('scripts')
  </body>
</html>
