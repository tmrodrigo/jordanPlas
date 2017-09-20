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
              <div class="col-sm-8">
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
                <li>
                  <div class="col-xs-6 col-sm-3">
                    <a href="{{ url('product', $product->id)}}">
                      <div class="itemCategoria">
                        <img src="{{ Storage::url($product->avatar)}}" alt="">
                        <h3>{{ $product->name }}</h3>
                        <a href="{{ url('product', $product->id)}}">Ver más</a>
                      </div>
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="linea"></div>
        <div class="row">
          <div class="col-sm-12">
            <h2>Muestras del producto en uso</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="imgProductos">
              @foreach ($category->images as $image)
                <img src="{{ Storage::url($image->url) }}" alt="">
                {{ Storage::url($image->url) }}
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
@endsection
