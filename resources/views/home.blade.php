@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
  <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-fade" data-bs-touch="true" data-bs-interval="false">
    <div class="carousel-indicators">
      @for ($i = 0; $i < 10; $i++)
        <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : ''}}" aria-current="true" aria-label="Slide {{ $i }}"></button>
      @endfor
    </div>
    <div class="carousel-inner">
      @for ($i = 0; $i < 10; $i++)
        <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
          <img src="{{ asset('storage/novedades/placeholder-02.png') }}" class="d-block w-100" alt="...">
        </div>
      @endfor
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
  <div class="my-5"></div>
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
@endsection
