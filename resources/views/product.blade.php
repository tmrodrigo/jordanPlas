@extends('layouts.app')

@section('title', $product->name)

@section('content')
  <div class="container">
    <section id="product">
      <div class="row">
        @if ($product->certificates->count() > 0)
          <div class="col-sm-5 mt-3">
            <div class="row justify-content-between">
              <div class="certificate">
                <img src="{{ asset('logos/certificados/logo-INTI.png') }}" alt="">
                <img src="{{ asset('logos/certificados/logo-ASTM.png') }}" alt="">
                <img src="{{ asset('logos/certificados/logo-IRAM.png') }}" alt="">
                <img src="{{ asset('logos/certificados/logo-ISO-9001.png') }}" alt="">
                <img src="{{ asset('logos/certificados/logo-OHSAS.png') }}" alt="">
                <img src="{{ asset('logos/certificados/logo-ISO.png') }}" alt="">
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a class="breadcrumb" href="{{ route('category', ['id' => $product->category->id, 'category' => $product->category->name]) }}"> < Volver a <span class="cap"> {{ $product->category->name }} </span></a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 position-relative">
          <img src="{{ asset('logos/logo-vert.svg') }}" class="card-img-logo carousel-logo" alt="">
          <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-fade" data-bs-touch="true" data-bs-interval="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="0" class="" aria-current="false" aria-label="Slide 0"></button>
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="2" class="" aria-current="false" aria-label="Slide 2"></button>                                
            </div>
            <div class="carousel-inner">
              <div class="carousel-item">
                <img src="{{ Storage::url($product->avatar) }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item active">
                <img src="{{ Storage::url($product->left_img) }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ Storage::url($product->right_img) }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="my-sm-4"></div>
          {{-- Colores --}}
          <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-6">
                  <p>Color cuerpo</p>
                    <ul class="color-list">
                      @forelse ($product->colors->where('pivot.body', true) as $bColor)
                        <li class="col-auto color-dot" style="background-color: {{ $bColor->hexa }}"></li>
                        @empty
                        <li class="col-auto color-dot" style="background-color: #FBD347"></li>
                        <li class="col-auto color-dot" style="background-color: #1E1E1E"></li>
                      @endforelse
                    </ul>
                </div>
                <div class="col-6">
                  <p>Color reflectivo</p>
                    <ul class="color-list">
                      @forelse ($product->colors->where('pivot.reflective', true) as $rColor)
                        <li class="col-auto color-dot" style="background-color: {{ $rColor->hexa }}"></li>
                        @empty
                        <li class="col-auto color-dot" style="background-color: #FBD347"></li>
                        <li class="col-auto color-dot" style="background-color: #ffffff"></li>                        
                      @endforelse
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 my-3 my-sm-0">
          {{-- Boton descargar ficha --}}
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <h3 class="cap">{{ $product->category->name }} {!! isset($product->sub_category) ? '<small> | '. $product->sub_category->name . '</small>' : '' !!} </h3>
              <div class="my-2 my-sm-0"></div>
              <h1 class="bold primary upper">{{ $product->name }}</h1>
            </div>
            {{-- Botón desktop --}}
            <div class="col-md-12 col-lg-4 d-none d-md-block">
              <div class="my-md-2 my-lg-0"></div>
              <button class="btn btn-primary" type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
              <div class="mt-2"></div>
              {{-- Boton puntera --}}
              <div class="row">
                <div class="col-sm-12">
                  {{-- <p class="text-justify">{{ $product->description }}</p> --}}
                  @if ($puntera != null)
                    <a class="btn btn-secondary"  href="{{ route('product', ['product' => $puntera->category_id, 'id' => $puntera->id]) }}">Ver Puntera</a>
                  @endif
                  @if ($modulo != null)
                    <a class="btn btn-secondary"  href="{{ route('product', ['product' => $modulo->category_id, 'id' => $modulo->id]) }}">Ver Módulo</a>
                  @endif
                </div>
              </div>
            </div>
            
          </div>
          
          <div class="my-4"></div>
          {{-- Medidas --}}
          <div class="row">
            <h3>Medidas</h3>
            <div class="my-3"></div>
            <div class="col-sm-12">
              <div class="meassures-box {{ $product->resistence > 0 || $product->reflex_s > 0 ? '' : 'justify-content-start' }}">
                <div class="product-measures">
                  <img src="{{ asset('logos/medidas/medidas.svg') }}" alt="">
                  <ul>
                    <li>Alto: <b class="number">{{ format_number($product->height, 2) }}</b> <b>cm</b></li>
                    <li>{{ $product->depth >= 0 ? 'Pisada:' : 'Diámetro:'  }} <b class="number">{{ format_number($product->width, 2) }}</b> <b>cm</b></li>
                    @if ($product->depth > 0)
                      <li>Ancho: <b class="number">{{ format_number($product->depth, 2) }}</b> <b>cm</b></li>                                    
                    @endif
                  </ul>
                </div>
                @if ($product->resistence > 0)
                  <div class="product-measures">
                    <img src="{{ asset('logos/medidas/resistencia.svg') }}" alt="">
                    <ul>
                      <li>Resistencia <br> Certificado INTI</li>
                      <li><b class="number">{{ format_number($product->resistence, 2) }}</b> <b>tn</b></li>
                      @if ($lineal_mt != null)
                        <li><b class="number">{{ format_number($product->resistence  * $lineal_mt, 2) }}</b> <b>tn mt lineal</b></li>                      
                      @endif
                    </ul>
                  </div>         
                @endif
                <div class="product-measures">
                  <img src="{{ asset('logos/medidas/peso.svg') }}" alt="">
                  <ul>
                    <li>Peso: <b class="number">{{ format_number($product->weight, 2) }}</b> <b>kg</b></li>
                    @if ($lineal_mt != null)
                      <li>Peso mt lineal: <br><b class="number">{{ format_number($product->weight * $lineal_mt, 2) }}</b> <b>kg</b></li>
                    @endif
                  </ul>
                </div>
                @if ($product->reflex_s > 0)
                  <div class="product-measures">
                    <img src="{{ asset('logos/medidas/superficie_reflectiva.svg') }}" alt="">
                    <ul>
                      <li>Superficie <br> reflectiva<br> <b class="number">{{ format_number($product->reflex_s, 2) }}</b> <b>cm2</b></li>
                    </ul>
                  </div>            
                @endif
              </div>
              @if ($product->meassures->count() > 0)
              <div class="border"></div>
              @endif
              @forelse ($product->meassures->sortBy('height') as $meassure)
                <div class="meassures-box {{ $meassure->resistence > 0 || $meassure->reflex_s > 0 ? '' : 'justify-content-start' }}">
                  <div class="product-measures">
                    <img src="{{ asset('logos/medidas/medidas.svg') }}" alt="">
                    <ul>
                      <li>Alto: <b class="number">{{ format_number($meassure->height, 2) }}</b> <b>cm</b></li>
                      <li>{{ $meassure->depth >= 0 ? 'Pisada:' : 'Diámetro:'  }} <b class="number">{{ format_number($meassure->width, 2) }}</b> <b>cm</b></li>
                      @if ($meassure->depth > 0)
                        <li>Ancho: <b class="number">{{ format_number($meassure->depth, 2) }}</b> <b>cm</b></li>                                    
                      @endif
                    </ul>
                  </div>
                  @if ($meassure->resistence > 0)
                    <div class="product-measures">
                      <img src="{{ asset('logos/medidas/resistencia.svg') }}" alt="">
                      <ul>
                        <li>Resistencia <br> Certificado INTI</li>
                        <li><b class="number">{{ format_number($product->resistence, 2) }}</b> <b>tn</b></li>
                        @if ($lineal_mt != null)
                          <li><b class="number">{{ format_number($product->resistence  * $lineal_mt, 2) }}</b> <b>tn mt lineal</b></li>                      
                        @endif
                      </ul>
                    </div>         
                  @endif
                  <div class="product-measures">
                    <img src="{{ asset('logos/medidas/peso.svg') }}" alt="">
                    <ul>
                      <li>Peso: <b class="number">{{ format_number($meassure->weight, 2) }}</b> <b>kg</b></li>
                      @if ($lineal_mt != null)
                        <li>Peso mt lineal: <br><b class="number">{{ format_number($meassure->weight * $lineal_mt, 2) }}</b> <b>kg</b></li>
                      @endif
                    </ul>
                  </div>
                  @if ($meassure->reflex_s > 0)
                    <div class="product-measures">
                      <img src="{{ asset('logos/medidas/superficie_reflectiva.svg') }}" alt="">
                      <ul>
                        <li>Superficie <br> reflectiva<br> <b class="number">{{ format_number($meassure->reflex_s, 2) }}</b> <b>cm2</b></li>
                      </ul>
                    </div>            
                  @endif
                </div>
                @if ($product->meassures->count() > 1)
                  <div class="border"></div>
                @endif
              @empty
                
              @endforelse
            </div>
            <div class="col-sm-12">
              <div class="meassures-box">
                @if ($product->thickness > 0)
                  <div class="product-measures">
                    <img src="{{ asset('logos/medidas/espesor.svg') }}" alt="">
                    <ul>
                      <li>Grosor de pared<br> <b class="number">{{ format_number($product->thickness, 2) }}</b> <b>mm</b></li>
                    </ul>
                  </div>            
                @endif
              </div>
            </div>                           
          </div>
        </div>
      </div>
      {{-- Botón mobile --}}
      <div class="row my-0 my-md-5 d-md-none">
        {{-- Boton puntera --}}
        <div class="col-sm-12">
          @if ($puntera != null)
            <a class="btn btn-secondary"  href="{{ route('product', ['product' => $puntera->category_id, 'id' => $puntera->id]) }}">Ver Puntera</a>
          @endif
          @if ($modulo != null)
            <a class="btn btn-secondary"  href="{{ route('product', ['product' => $modulo->category_id, 'id' => $modulo->id]) }}">Ver Módulo</a>
          @endif
        </div>
        <div class="col-sm-4  my-4">
          <button class="btn btn-primary" type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
        </div>
      </div>
      <div class="my-3 my-sm-4"></div>
      <div class="row">
        <div class="col-sm-12">
          <p class="text-justify">{{ $product->description }}</p>
        </div>
      </div>
      @if ($fixations != null )
      <div class="my-2"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="fixtations-box">
              @if ($fixations->img_url != null)
                  <img src="{{ asset($fixations->img_url) }}" alt="">
                @else
                  <img src="{{ asset('logos/placeholder.png') }}" alt="">
              @endif
              <div class="fixation-text">
              <h2>Fijaciones</h2>
              <ul>
                <li>
                  {{ $fixations->pivot->amount != null ? $fixations->pivot->amount : '4' }} Tirafondos de {{ $fixations->tirafondo != null ? $fixations->tirafondo : '3/8 x 4"' }}.
                </li>
                <li>
                  {{ $fixations->pivot->amount != null ? $fixations->pivot->amount : '4' }} Arandelas de {{ $fixations->arandela != null ? $fixations->arandela : '25 mm' }}.
                </li>
                <li>
                  {{ $fixations->pivot->amount != null ? $fixations->pivot->amount : '4' }} Tarugos de {{ $fixations->tarugo != null ? $fixations->tarugo : '14 mm' }}.
                </li>                                
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="my-5"></div>
      @if ($products->count() > 0)
        <div class="row">
          <div class="col-sm-12">
            <h3 class="upper">Productos relacionados</h3>
          </div>
          <div class="my-0"></div>
          <div class="row row-cols-1 row-cols-2 row-cols-md-4 g-4">
            @forelse ($products as $product)
              <div class="col-xs-6 col-sm-3">
                @include('components.productBox')
              </div>
            @empty
                
            @endforelse
          </div>
        </div>
      @endif
      <div class="my-5"></div>
      @if (count($product->images) > 0)
      <div class="row">
        <div class="col-sm-12 mb-3">
          <h3 class="upper">{{ $product->category->name }} en uso</h3>
        </div>
      </div>
      <div class="row">
        @foreach ($product->category->images as $image)
          <div class="col-sm-6 col-md-6 mb-3">
              <img src="{{ Storage::url($image->url) }}" alt="{{ Storage::url($image->url) }}">
          </div>
        @endforeach
      </div>
      @endif
    </section>
  </div>
@endsection
