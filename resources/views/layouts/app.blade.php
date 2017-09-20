<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Raleway:400,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
    function showEmpresas(){
      $('#e').addClass('selected');
      $('#p, #pr').removeClass('selected');
      $('#1').removeClass('articuloOculto');
      $('#2, #3').addClass('articuloOculto');
      $('#home').css('height', '50vh');
      $('.carousel-inner').css('height', '50vh');
    }

    function showProductos(){
      $('#p').addClass('selected');
      $('#e, #pr').removeClass('selected');
      $('#2').removeClass('articuloOculto');
      $('#1').addClass('articuloOculto');
      $('#3').addClass('articuloOculto');
      $('#home').css('height', '50vh');
      $('.carousel-inner').css('height', '50vh');
    }

    function showProyectos(){
      $('#pr').addClass('selected');
      $('#p, #e').removeClass('selected');
      $('#3').removeClass('articuloOculto');
      $('#1').addClass('articuloOculto');
      $('#2').addClass('articuloOculto');
      $('#home').css('height', '50vh');
      $('.carousel-inner').css('height', '50vh');
    }
    </script>
  </head>

  <body style="background-image: url({{ Storage::url('assets/bg.png') }});">
    <header>
      <nav class="navegacion" id="nav">
        <div class="nav-container">
          <div class="nav-logo">
            <a href="/"><img src={{ Storage::url('assets/logo.svg') }} alt=""></a>
          </div>
          <div class="burguer" id="burguer">
            <i class="fa fa-bars"></i>
          </div>
          <ul class="nav-items">
            <li><a href="/">Empresa</a></li>
            <li id="subMenuItem"><a href="{{ url('productsList')}}">Productos</a>
              <ul id="subMenu">
                @foreach ($categories as $category)
                  <li><a href="{{ url('category', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="{{ url('projects')}}">Proyectos</a></li>
            <li><a href="{{ url('services')}}">Servicios</a></li>
            <li><a href="{{ url('contacto')}}">Contactanos</a></li>
            {{-- <li class="presupuesto"><a href="#contacto">Contactanos</a></li> --}}
          </ul>
          <div class="nav-right">
            <button type="button" name="button" id="sButton"><i class="fa fa-search"></i></button>
            <form class="buscador" action="{{ url('search/') }}" method="get" id="searcher">
              {{ csrf_field() }}
              <input type="text" name="s" value="" placeholder="ingresá nombre de producto">
              <button type="submit" name=""><i class="fa fa-search"></i></button>
            </form>
            <div class="certificados">
              <ul>
                <li><img src="{{ Storage::url('assets/certf/inti.png') }}" alt=""></li>
                <li><img src="{{ Storage::url('assets/certf/iram.png') }}" alt=""></li>
                <li><img src="{{ Storage::url('assets/certf/astm.png') }}" alt=""></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="redesMenu" id="redes">
          <ul>
            <li><a href="https://www.instagram.com/jordanplas_/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      @yield('content')
      <div class="container-fluid">
        <div class="row">
          <section id="clientes">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="bxslider">
                    <li><img src={{ Storage::url('clientes/clientes-01.jpg') }} alt=""></li>
                    <li><img src={{ Storage::url('clientes/clientes-02.png') }} alt=""></li>
                    <li><img src="images/clientes/clientes-03.jpg" alt=""></li>
                    <li><img src="images/clientes/clientes-04.png" alt=""></li>
                    <li><img src="images/clientes/clientes-05.png" alt=""></li>
                    <li><img src="images/clientes/clientes-06.png" alt=""></li>
                    <li><img src="images/clientes/clientes-07.png" alt=""></li>
                    <li><img src="images/clientes/clientes-08.png" alt=""></li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <footer>
            <section id="mapaSitio">
              <div class="container">
                <nav>
                  <div class="row">
                    <div class="col-sm-10">
                      <ul>
                        <li><a href="{{ url('productsList') }}">Productos</a></li>
                        <li><a href="{{ url('projects') }}">Proyectos</a></li>
                        <li><a href="{{ url('contacto') }}">Contacto</a></li>
                        <li><a href="{{ url('services') }}">Servicios</a></li>
                        <li><a href="/">Empresa</a></li>
                        {{-- <li><a href="">Normativa Vial</a></li> --}}
                      </ul>
                    </div>
                    <div class="col-sm-2">
                      <div class="redes">
                        <ul>
                          <li><a href=""><i class="fa fa-facebook"></i></a></li>
                          <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
            </section>
            <section id="creditos">
              <p>© 2017 copyright - Jordan Plas S.A - Todos los derecho reservados. Diseño y desarrollo <a href="http://www.loveinbrands.com">loveinbrands</a></p>
            </section>
          </footer>
        </div>
      </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
  </body>
</html>
