@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
  <main>
    <div class="container">
      <div class="">
        <section id="productos">
          <div class="row">
            <div class="col-sm-12">
              <div class="textoSeccion">
                <h1>Servicios</h1>
                <div class="row">
                  <div class="col-xs-3 col-sm-1">
                    <div class="lineaRoja"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="boxProductos">
            <div class="row">
              <div class="col-sm-12">
                <div class="servicio">
                  <div class="row">
                    @foreach ($services as $service)
                      <div class="col-sm-6">
                        <div class="itemServicio">
                          <h4>{{ $service->name }}</h4>
                          <p>{{ $service->description }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </main>
@endsection
