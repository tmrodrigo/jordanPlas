@extends('layouts.app')

@section('title', 'Productos')

@section('content')
  <main>
    <div class="container">
      <section id="search-results">
        <div class="row mb-4">
          <div class="col-sm-12 mb-2 mt-2">
            <h1>Búsqueda de productos</h1>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-12">
            <h4>Resultado de tu búsqueda</h4>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          @forelse ($products as $product)
            <div class="col-sm-4">
              @include('components.productCard')
            </div>
          @empty
            <div class="col-sm-12">
              <h4>Disculpe, su busqueda no arrojó ningún resultado</h4>
            </div>  
          @endforelse
        </div>
        <div class="mb-4"></div>
      </section>
    </div>
  </main>
@endsection
