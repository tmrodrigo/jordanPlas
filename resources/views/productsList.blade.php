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
                  <div class="" style="margin: 32px 0"></div>
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
                @if (count($productList) <= 0)
                  <div class="col-sm-12">
                    <h4>Disculpe, su busqueda no arrojó ningún resultado. Intente con palabras más cercanas</h4>
                  </div>
                  @else
                    @foreach ($productList as $product)
                      <div class="col-xs-6 col-sm-3">
                        <a href="{{ url($product->category->name, $product->id) }}">
                          <div class="itemCategoria">
                            <img src="{{ Storage::url($product->avatar) }}" alt="{{ $product->name . ', ' . $product->description }}">
                            <h3>{{ $product->name }}</h3>
                            <a href="{{ url($product->category->name, $product->id) }}">Ver más</a>
                          </div>
                        </a>
                      </div>
                    @endforeach
                @endif
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h2>Productos más vendidos</h2>
                </div>
              </div>
              <div class="row">
                @foreach ($topProducts as $topProduct)
                  {{-- {{ dd($topProduct->id) }} --}}
                  <div class="col-xs-6 col-sm-3">
                    <a href="{{ url($product->category->name, $topProduct->id) }}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($product->avatar) }}" alt="">
                        <h3>{{ $topProduct->name }}</h3>
                        <a href="{{ url($product->category->name, $topProduct->id) }}">Ver más</a>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
            @endif
            <div class="row">
              @foreach ($categories as $category)
                @if (count($category->product) > 0)
                  <div class="col-xs-6 col-sm-3">
                    <a href="{{ url($product->category->name, $category->id) }}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($category->avatar) }}" alt="{{ $category->name . ', ' . $category->description }}">
                        <h3>{{ $category->name }}</h3>
                        <a href="{{ url($product->category->name, $category->id) }}">Ver más</a>
                      </div>
                    </a>
                  </div>
                @endif
              @endforeach
            </div>
          </div>

        </section>
      </div>
    </div>
  </main>
@endsection
