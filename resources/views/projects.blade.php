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
                <div class="separador" style="margin: 32px 0"></div>
              </div>
            </div>
          </div>
          <div class="boxProductos">
            <div class="row">
              <div class="col-sm-12">
                <div class="imgProductos">
                  @foreach ($projects as $image)
                    <div class="col-sm-6">
                      @if (substr($image->url, -3, 3) == "mp4")
                        <video src="{{ Storage::url( $image->url ) }}" autoplay loop></video>
                        <figcaption>{{ $image->name }}</figcaption>
                        @else
                          <img src={{ Storage::url( $image->url ) }} alt="{{ $image->name }}"></a>
                          <figcaption>{{ $image->name }}</figcaption>
                      @endif
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
