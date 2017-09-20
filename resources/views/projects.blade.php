@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
  <main>
    <div class="container">
      <div class="">
        <section id="productos">
          <div class="row">
            <div class="col-sm-12">
              <div class="textoSeccion">
                <h1>Proyectos</h1>
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
            <div class="row">
              <div class="col-sm-12">
                <div class="imgProductos">
                  @foreach ($images as $image)
                    <div class="col-sm-6">
                      <img src={{ Storage::url( $image->url ) }} alt=""></a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
