@extends('layouts.app')

@section('title', $product->name)

@section('content')
  <div class="container">
    <div class="">
      <section id="productos">
        <div class="row">
          <div class="col-sm-12">
            <div class="textoSeccion">
              <h1>{{ $product->category->name }}</h1>
              <div class="row">
                <div class="col-xs-3 col-sm-1">
                  <div class="lineaRoja"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p>{{ $product->category->description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="fichaProducto">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="row">
                <!-- <div class="col-sm-5">
                  <img src="images/productos/lt-40.png" alt="">
                </div> -->
                <div class="textFicha col-sm-8 col-md-11">
                  <div>
                    <h4>Tacha redonda reflectiva</h4>
                    <h1>{{ $product->name }}</h1>
                  </div>
                  <p>{{ $product->description }}</p>
                  <p><span>Kit de instalación:</span><br>Todos nuestros productos incluyen el material necesario para su instalación, en este caso tornillo, tarugo y arandela</p>

                    <div class="certificados">
                      <ul>
                        @foreach ($product->certificates as $certificate)
                          <li>
                            <img src="{{ $certificate->name }}" alt="">
                            <p>
                              <span>Certificado: </span>{{ $certificate->name }} <br>
                            </p>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  <div class="consulta">
                    <button type="button" onClick="window.location='{{ url('/contacto')}}'">Consultar</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 textFicha">
              <div class="row" id="botonesDesktop">
                @if (is_null($product->manual_file) == true)
                  <div class="col-sm-4 col-md-4 col-lg-4 pull-right">
                    <button type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
                  </div>
                  @else
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <button type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
                    </div>
                @endif
                @if (is_null($product->manual_file) == false)
                  <div class="col-sm-4 col-md-8 col-lg-5">
                    <button type="button" name="button" onclick="window.open('{{ Storage::url($product->manual_file) }}')">Descargar manual de aplicación</button>
                  </div>
                @endif
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-12">
                  <div class="datos">
                    <h3><span>Ficha técnica</span></h3>
                    <div class="datosList">
                      <div class="row">
                        <div class="col-sm-6">
                          <img src="{{ Storage::url('assets/medidas.svg') }}" alt="">
                          <p>
                            <span>Alto: </span> {{ $product->height }} mm<br>
                            <span>Ancho: </span> {{ $product->width }} mm<br>
                            <span>Profundo: </span> {{ $product->depth }} mm<br>
                          </p>
                        </div>
                        <div class="col-sm-6">
                          <img src="{{ Storage::url('assets/peso.svg') }}" alt="">
                          <p><span>Peso:</span><br> {{ $product->weight }} gr</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <img src="{{ Storage::url('assets/luz.svg') }}" alt="">
                          <p><span>Sup. Reflectiva:</span><br> {{ $product->reflex_s }} cm2</p>
                        </div>
                        <div class="col-sm-6">
                          <img src="{{ Storage::url('assets/resistencia.svg') }}" alt="">
                          <p><span>Resistencia:</span><br> {{ $product->resistence }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <p><span>Color<br>cuerpo </span></p>
                          <ul>
                            @if ($product->atributes)
                              @foreach ($product->atributes as $color)
                                @if ($color->atribute == "body_color")
                                  <li class="{{ $color->value }}"></li>
                                @endif
                              @endforeach
                            @endif
                          </ul>
                        </div>
                        <div class="col-sm-6">
                          <p><span>Color<br>reflectivo </span></p>
                          <ul>
                            @if ($product->atributes)
                              @foreach ($product->atributes as $color)
                                @if ($color->atribute == "reflex_color")
                                  <li class="{{ $color->value }}"></li>
                                @endif
                              @endforeach
                            @endif
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row imgFicha">
            <div class="col-sm-6">
              <img src={{ Storage::url($product->left_img) }} alt="">
            </div>
            <div class="col-sm-6">
              <img src={{ Storage::url($product->right_img) }} alt="">
            </div>
          </div>
          <div class="row" id="botonesMobile">
            @if (is_null($product->manual_file) == true)
              <div class="col-xs-5 col-sm-6 col-md-12 col-lg-4 pull-right">
                <button type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
              </div>
              @else
                <div class="col-xs-5 col-sm-6 col-md-12 col-lg-4">
                  <button type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
                </div>
            @endif
            @if (is_null($product->manual_file) == false)
              <div class="col-xs-7 col-sm-6 col-md-12 col-lg-8">
                <button type="button" name="button" onclick="window.open('{{ Storage::url($product->manual_file) }}')">Descargar manual de aplicación</button>
              </div>
            @endif
            {{-- <div class="col-xs-5 col-sm-6 col-md-12 col-lg-4">
              <button type="button" name="button">Descargar ficha</button>
            </div>
            <div class="col-xs-7 col-sm-6 col-md-12 col-lg-8">
              <button type="button" name="button">Descargar manual de aplicación</button>
            </div> --}}
          </div>
          {{-- <div class="row">
            <div class="col-sm-12">
              <div class="imgProductos">
                <div class="row">
                  @foreach ($product->images as $image)
                    <div class="col-sm-4">
                      <img src={{ Storage::url($image->url) }} alt="">
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div> --}}
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
                @foreach ($product->images as $image)
                  <img src="{{ Storage::url($image->url) }}" alt="{{ Storage::url($image->url) }}">
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>
  </div>
@endsection
