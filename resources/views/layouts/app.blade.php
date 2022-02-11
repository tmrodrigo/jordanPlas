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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body style="background-image: url({{ Storage::url('assets/bg.png') }});">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                  @forelse ($categories as $category)
                    <a class="cap dropdown-item  {{ isset($id) && $id == $category->id ? 'active' : ''  }} " href="{{ route('category', ['category' => $category->name, 'id' => $category->id]) }}">{{ $category->name }}</a>
                  @empty
                    
                  @endforelse
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link whatsapp" href="#">Contactanos por Whatsapp</a>
              </li>
            </ul>
            <form action="{{ route('search') }}" method="GET" class="d-flex my-2 my-lg-0">
              @csrf
              <div class="search-form">
                <input name="search" value="" type="text" placeholder="¿Qué estás buscando?">
                <button class="btn btn-tertiary" type="submit">Buscar</button>
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main>
      @yield('content')
    </main>
    <footer class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <img src="{{ asset('logos/logo-vert.svg') }}" alt="Logo Jordan-Plas">
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>©{{ date('Y') }} Jordan Plas. Todos los derechos reservados.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
  </body>
</html>
