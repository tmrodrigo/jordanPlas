@extends('layouts.app')

@section('title', 'Productos')

@section('content')
  <main>
    <div class="container">
      <div class="">
        <section id="productos">
          <div class="row">
            <div class="col-sm-12">
              <div class="textoSeccion">
                <h1>Productos</h1>
                <div class="row">
                  <div class="col-xs-3 col-sm-1">
                    <div class="lineaRoja"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="boxProductos">
            @if (isset($productList))
              <div class="row">
                <div class="col-sm-12">
                  <h2>Resultado de tu búsqueda</h2>
                </div>
              </div>
              <div class="row">
                @foreach ($productList as $product)
                  <div class="col-xs-6 col-sm-3">
                    <a href="{{ url('category', $product->id) }}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($product->avatar) }}" alt="">
                        <h3>{{ $product->name }}</h3>
                        <a href="productos.php">Ver más</a>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h2>Productos más vendidos</h2>
                </div>
              </div>
              <div class="row">
                @foreach ($topProducts as $topProduct)
                  <div class="col-xs-6 col-sm-3">
                    <a href="{{ url('category', $topProduct->id) }}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($product->avatar) }}" alt="">
                        <h3>{{ $topProduct->name }}</h3>
                        <a href="productos.php">Ver más</a>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
            @endif
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
          </div>

        </section>
      </div>
    </div>
  </main>
@endsection
