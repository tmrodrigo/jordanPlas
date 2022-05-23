@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
  {{-- @if ($images->count() > 0)
    <div id="carouselHome" class="carousel slide carousel-fade" data-bs-touch="true" data-bs-interval="false">
      <div class="carousel-indicators">
        @for ($i = 0; $i < $images->count(); $i++)
          <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : ''}}" aria-current="true" aria-label="Slide {{ $i }}"></button>
        @endfor
      </div>
      <div class="carousel-inner">
        @forelse ($images as $k => $image)
          <div class="carousel-item {{ $k == 0 ? 'active' : ''}}">
            <img src="{{  Storage::url($image->url) }}" class="d-block w-100" alt="{{ $image->category_id }}">
          </div>
        @empty
          
        @endforelse
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  @endif --}}
  <div class="my-5"></div>
  <div class="d-sm-none">
    <div class="my-3"></div>
    <div class="d-flex float-button">
      <img src="{{ asset('QR-catalogo.png') }}" alt="QR-Catálogo">
      <p>
        <b>Escaneá este QR para descargar el</b>
        Catálogo Digital de Productos
      </p>
    </div>
    <div class="my-3"></div>
  </div>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse ($categories as $category)
        <div class="col-sm-4">
          <div class="card">
            <img src="{{ Storage::url($category->avatar) }}" class="card-img-top" alt="{{ $category->name }}">
            <div class="card-body">
              <h3 class="card-title bold cap text-center">{{ $category->name }}</h3>
              <a href="{{ route('category', ['id' => $category->id, 'category' => $category->name]) }}" class="btn btn-secondary">Ver más</a>
            </div>
          </div>
        </div>
      @empty
        
      @endforelse
    </div>
  </div>
  <div class="my-5"></div>
  <div class="d-none d-sm-flex">
    <div class="d-flex float-button fixed">
      <img src="{{ asset('QR-catalogo.png') }}" alt="QR-Catálogo">
      <p>
        <b>Escaneá este QR para descargar el</b>
        Catálogo Digital de Productos
      </p>
    </div>
  </div>
@endsection
