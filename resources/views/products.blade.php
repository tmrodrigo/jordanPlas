@extends('layouts.app')

@section('title', $category->name)

@section('content')
  <div class="container">    
    <section id="productos">
      <div class="row">
        <div class="col-sm-12">
          <div class="textoSeccion">
            <div>
             <a class="breadcrumb" href="/">< Volver a Home</a>
            </div>
            <h1 class="bold cap primary">{{ $category->name }}</h1>
            <div class="my-3"></div>
            <div class="row">
              <div class="col-sm-12">
                <p>{{ cut_str($category->description, 500) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-5"></div>
      <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-3 col-lg-2">
          <div class="my-5 my-md-0"></div>
          <h3 class="upper mb-2">Productos</h3>
          <ul class="side-menu">
            @forelse ($categories as $category)
              <li><a class="cap {{ $id == $category->id ? 'bold' : '' }}" href="{{ route('category', ['id' => $category->id, 'category' => $category->name]) }}">{{ $category->name }}</a></li>
            @empty
              
            @endforelse
          </ul>
        </div>
        <div class="col-md-9 col-lg-10">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($products as $product)
              <div class="col-sm-4">
                @include('components.productCard')
              </div>
            @empty
              
            @endforelse
          </div>
        </div>
      </div>
    </section>
    <div class="my-5"></div>
  </div>
@endsection
