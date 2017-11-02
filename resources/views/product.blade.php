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
                <div class="col-sm-12">
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
                <div class="textFicha col-sm-8 col-md-11">
                  <div>
                    <h1>{{ $product->name }}</h1>
                  </div>
                  <p>{{ $product->description }}</p>
                  <p><span>Kit de instalación:</span><br>Todos nuestros productos incluyen el material necesario para su instalación, en este caso tornillo, tarugo y arandela</p>

                    <div class="certificados">
                      <ul>
                        @foreach ($product->certificates as $certificate)
                          <li>
                            <img src="{{ Storage::url($certificate->image) }}" alt="Jordan Plas, producto certificado por {{ $certificate->name }}">
                            <p>
                              <span>Certificado</span><br>{{ $certificate->name }} <br>
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
                          <div class="carac">
                            <img src="{{ Storage::url('assets/medidas.svg') }}" alt="">
                            @if ($product->depth <= 0)
                              <p>
                                <span>Alto: </span> {{ $product->height }} mm<br>
                                <span>Diámetro: </span> {{ $product->width }} mm<br>
                              </p>
                              @else
                                <p>
                                  <span>Alto: </span> {{ $product->height }} mm<br>
                                  <span>Ancho: </span> {{ $product->width }} mm<br>
                                  <span>Profundo: </span> {{ $product->depth }} mm<br>
                                </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="carac">
                            <img src="{{ Storage::url('assets/peso.svg') }}" alt="">
                            <p><span>Peso:</span><br> {{ $product->weight }} gr</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        @if ($product->reflex_s > 0)
                          <div class="col-sm-6">
                            <div class="carac">
                              <img src="{{ Storage::url('assets/luz.svg') }}" alt="">
                              <p><span>Sup. Reflectiva:</span><br> {{ $product->reflex_s }} cm2</p>
                            </div>
                          </div>
                        @endif
                        @if ($product->resistence > 0)
                          <div class="col-sm-6">
                            <div class="carac">
                              <img src="{{ Storage::url('assets/resistencia.svg') }}" alt="">
                              <p><span>Resistencia:</span><br> mayor a: {{ $product->resistence }} tn</p>
                            </div>
                          </div>
                        @endif
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <p><span>Color cuerpo </span></p>
                          <ul>
                            @foreach ($bColors->unique('value')->values()->all() as $bColor)
                              <li class="{{ $bColor->value }}"></li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="col-sm-6">
                          <p><span>Color reflectivo </span></p>
                          <ul>
                            @foreach ($rColors->unique('value')->values()->all() as $rColor)
                              <li class="{{ $rColor->value }}"></li>
                            @endforeach
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
              <img src={{ Storage::url($product->left_img) }} alt="{{ $product->category->name . ' ' . $product->name . ' ' . $product->description }}">
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
          <div class="row">
            <div class="col-sm-12">
              <div class="imgProductos">
                <div class="row">
                  @foreach ($product->images as $image)
                    <div class="col-sm-6">
                      <img src={{ Storage::url($image->url) }} alt="">
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @if ((count($products) > 1) || (count($product->images) > 0))
          <div class="boxProductos">
            @if (count($products) > 1)
              <div class="slider row">
                <div class="slider-inner">
                  <ul>
                    @foreach ($products as $product)
                      <li>
                        <div class="col-xs-6 col-sm-3">
                          <a href="{{ url($product->category->name, $product->id)}}">
                            <div class="itemCategoria">
                              <img src="{{ Storage::url($product->avatar)}}" alt="{{ $product->category->name . ' ' . $product->name . ' ' . $product->description }}">
                              <h3>{{ $product->name }}</h3>
                              <a href="{{ url($product->category->name, $product->id)}}">Ver más</a>
                            </div>
                          </a>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="linea"></div>
            @endif
            @if (count($product->images) > 0)
              <div class="row">
                <div class="col-sm-12">
                  <h2>{{ $product->category->name }} en uso</h2>
                </div>
              </div>
              <div class="row">
                @foreach ($product->category->images as $image)
                  <div class="col-sm-6">
                    <div class="imgProductos">
                      <img src="{{ Storage::url($image->url) }}" alt="{{ Storage::url($image->url) }}">
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        @endif
      </section>
      <div class="separador" style="margin: 32px 0"></div>
    </div>
  </div>
@endsection
