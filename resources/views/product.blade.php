@extends('layouts.app')

@section('title', $product->name)

@section('content')
  <div class="container">
    <section id="product">
      <div class="row">
        <div class="col-sm-12">
          <a class="breadcrumb" href="{{ route('category', ['id' => $product->category->id, 'category' => $product->category->name]) }}"> < Volver a {{ $product->category->name }}</a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-fade" data-bs-touch="true" data-bs-interval="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="1" class="" aria-current="false" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="2" class="" aria-current="false" aria-label="Slide 2"></button>                                
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ Storage::url($product->avatar) }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
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
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <h3 class="cap">{{ $product->category->name }}</h3>
              <h1 class="bold primary upper">{{ $product->name }}</h1>
            </div>
            {{-- Botón desktop --}}
            <div class="col-md-12 col-lg-4 d-none d-md-block">
              <div class="my-md-2 my-lg-0"></div>
              <button class="btn btn-primary" type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
            </div>
          </div>
          <div class="my-4"></div>
          <div class="row">
            <div class="col-sm-12">
              <p>{{ $product->description }}</p>
            </div>
          </div>
          <div class="row my-md-5 my-3">
            <div class="col-sm-6">
              <h3>Medidas</h3>
              <div class="my-3"></div>
              <ul>
                <li>Alto: <b class="number">{{ format_number($product->height) }}</b> <b>mm</b></li>
                <li>{{ $product->depth > 0 ? 'Ancho:' : 'Diámetro:'  }} <b class="number">{{ format_number($product->width) }}</b> <b>mm</b></li>
                @if ($product->depth > 0)
                  <li>Pisada: <b class="number">{{ format_number($product->depth) }}</b> <b>mm</b></li>                                    
                @endif
              </ul>
              <ul>
                <li>Peso: <b class="number">{{ format_number($product->weight) }}</b> <b>grs</b></li>
              </ul>
              @if ($product->reflex_s > 0)
                <ul>
                  <li>Superficie reflectiva: <b class="number">{{ format_number($product->reflex_s, 2) }}</b> <b>cm2</b></li>
                </ul>                  
              @endif
              @if ($product->resistence > 0)
                <ul>
                  <li>Resistencia: mayor a: <b class="number">{{ format_number($product->resistence, 2) }}</b> <b>tn</b></li>
                </ul>                
              @endif                            
            </div>
            <div class="col-sm-6">
              <h3>Características</h3>
              <div class="my-3"></div>
              @if ($bColors->count() > 0)
                <p><span>Color cuerpo </span></p>
                <div class="row mb-4">
                  @foreach ($bColors as $k => $bColor)
                    <div class="col-auto color-dot {{ $bColor->value }}"></div>
                  @endforeach
                </div>
              @endif
              @if ($rColors->count() > 0)
                <p><span>Color reflectivo </span></p>
                <div class="row mb-4">
                  @foreach ($rColors as $k => $rColor)
                    <div class="col-auto color-dot {{ $rColor->value }}"></div>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row my-3 my-md-5">
        <div class="col-sm-4 d-md-none">
          <button class="btn btn-primary" type="button" name="button" onclick="window.open('{{ Storage::url($product->info_file) }}')">Descargar ficha</button>
        </div>
      </div>
      <div class="row">
        @if (isset($product->fijaciones))
          <div class="{{ $product->certificates->count() > 0 ? 'col-sm-6' : 'col-sm-12' }}">
            <h2>Fijaciones</h2>
            <div class="my-3 my-md-5"></div>
          </div>
        @endif
        <div class="my-3 my-sm-0"></div>
        @if ($product->certificates->count() > 0)
          <div class="{{ isset($product->fijaciones) ? 'col-sm-6' : 'col-sm-12' }}">
            <h2>Certificados</h2>
            <div class="my-3 my-md-5"></div>
            <div class="row justify-content-between">
              @forelse ($product->certificates as $certificate)
                  <div class="col-auto">
                    <img src="{{ Storage::url($certificate->image) }}" alt="Jordan Plas, producto certificado por {{ $certificate->name }}">
                    <p>
                      <span>Certificado</span><br>{{ $certificate->name }} <br>
                    </p>
                  </div>
              @empty
                  
              @endforelse
            </div>
          </div>
        @endif
      </div>
      <div class="my-5"></div>
      @if ($products->count() > 0)
        <div class="row">
          <div class="col-sm-12">
            <h3 class="upper">Productos relacionados</h3>
          </div>
          <div class="my-4"></div>
          <div class="row row-cols-1 row-cols-2 row-cols-md-4 g-4">
            @forelse ($products as $product)
              <div class="col-xs-6 col-sm-3">
                @include('components.productCard')
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
