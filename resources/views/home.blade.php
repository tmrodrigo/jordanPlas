@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="container-fluid">
  <div class="row">
    <section id="home">
      <div id="carousel-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          @foreach ($posts as $key => $post)
            <li data-target="#carousel-generic" data-slide-to="{{ $key }}" class="{{ $key == 0 ? ' active' : '' }}"></li>
          @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          @foreach ($posts as $key => $post)
            <div class="item fondoImg{{ $key == 0 ? ' active' : '' }}" data-img="{{ Storage::url($post->image) }}">
              <div class="carousel-caption">
                <h1>{{ $post->name }}</h1>
                <p>{{ $post->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
      <div class="">
        <div class="botoneraBox">
          <ul class="botonera">
            <li id="e" onclick="showEmpresas()">Empresa</li>
            <li id="p" onclick="showProductos()">Productos</li>
            <li id="pr" onclick="showProyectos()">Proyectos</li>
          </ul>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="container">
  <div class="row">
    <section id="secciones">
      <article  id="1" class="" data-target="1">
        <div class="row">
          <div class="col-sm-4">
            <div class="textoSeccion">
              @if ($data)
                <h2>Jordan Plas</h2>
                <p>{{ $data->description }}</p>
                <h4>Contactanos</h4>
                <div class="telMail">
                  <p><span>Tel: </span>{{ $data->phone }} | <span>Fax: </span> {{ $data->fax }}</p>
                  <p><span>Email: </span><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></p>
                  <div class="direccion">
                    <p><span>Dirección: </span>{{ $data->address }}</p>
                  </div>
                </div>
              @endif
            </div>
            <!-- <a class="presupuesto" href="" onclick="event.preventDefault()">Solicitá presupuesto</a> -->
            <!-- <h3>Certificado por:</h3> -->
            <div class="certificados">
              <ul>
                <li><img src="storage/assets/certf/inti.png" alt=""></li>
                <li><img src="storage/assets/certf/iram.png" alt=""></li>
                <li><img src="storage/assets/certf/astm.png" alt=""></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-8">
            <img src="storage/home/empresa.jpg" alt="">
          </div>
        </div>
        <h3>Productos destacados</h3>
        <div class="row">
          <div class="col-sm-12">
            <div class="destacados">
              <ul class="bxslider">
                @foreach ($products as $product)
                  <li>
                    <a href="{{ url('product', $product->id)}}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($product->avatar)}}" alt="">
                        <h3>{{ $product->name }}</h3>
                        <a href="{{ url('product', $product->id)}}">Ver más</a>
                      </div>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </article>
      <article id="2" class="productos" data-target="2">
        <div class="row">
          <div class="col-sm-offset-2 col-sm-8">
            <div class="textoSeccion">
              <h2>Productos</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($categories as $category)
            <div class="col-xs-6 col-sm-3">
              <a href="{{ url('category', $category->id) }}">
                <div class="itemCategoria">
                  <img src="storage/productos/tachas-redon.png" alt="">
                  <h3>{{ $category->name }}</h3>
                  <a href="productos.php">Ver más</a>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </article>
      <article id="3" class="productos" data-target="2">
        <div class="row">
          <div class="col-sm-offset-2 col-sm-8">
            <div class="textoSeccion">
              <h2>Proyectos</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($projects as $project)
            <div class="col-sm-4">
              <img src="storage/proyectos" alt="">
            </div>
          @endforeach
        </div>
      </article>
    </section>
  </div>
</div>

@endsection
