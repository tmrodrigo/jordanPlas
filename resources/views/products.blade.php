@extends('layouts.app')

@section('title', $category->name)

@section('content')
  <div class="container">
    <section id="productos">
      <div class="row">
        <div class="col-sm-12">
          <div class="textoSeccion">
            <h1>{{ $category->name }}</h1>
            <div class="row">
              <div class="col-xs-3 col-sm-1">
                <div class="lineaRoja"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <p>{{ $category->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="boxProductos">
        <div class="slider row">
          <div class="slider-inner">
            <ul>
              @foreach ($products as $product)
                @if ($product->available)
                  <li>
                    <div class="col-xs-6 col-sm-3">
                      <a href="" onclick="event.preventDefault()">
                        <div class="prox">
                          <p>próximamente</p>
                        </div>
                        <div class="itemCategoria soon">
                          <img src="{{ Storage::url($product->avatar)}}" alt="">
                          <h3>{{ $product->name }}</h3>
                          <a href="" onclick="event.preventDefault()">proximamente</a>
                        </div>
                      </a>
                    </div>
                  </li>
                  @else
                    <li>
                      <div class="col-xs-6 col-sm-3">
                        <a href="{{ url($product->category->name, $product)}}">
                          <div class="itemCategoria">
                            <img src="{{ Storage::url($product->avatar)}}" alt="">
                            <h3>{{ $product->name }}</h3>
                            <a href="{{ url($product->category->name, $product)}}">Ver más</a>
                          </div>
                        </a>
                      </div>
                    </li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
        @if (count($category->images) > 0)
          <div class="linea"></div>
          <div class="row">
            <div class="col-sm-12">
              <h2>Muestras del producto en uso</h2>
            </div>
          </div>
          <div class="row">
            @foreach ($category->images as $image)
              <div class="col-sm-6">
                <div class="imgProductos">
                  <img src="{{ Storage::url($image->url) }}" alt="{{ $category->name . ', ' . $category->description }}">
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>

    </section>
  </div>
@endsection
