@extends('backend.budget.base')

@section('title', 'Productos')

@section('content')
<div class="container">
  <div class="row row-cols-1 row-cols-2 row-cols-md-4 g-4">
    <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4>Nuevo producto</h4>
              <h3>-----</h3>
            </div>
            <img src="" alt="" style="height: 274px; max-width:100%">
            <p>
              Posición: --<br>
              Alto: -- cm<br>
              Ancho: -- cm<br>
              Profundo: -- cm<br>
              Peso: -- kg<br>
              Superficie reflectiva: -- cm2 <br>
              Resistencia: -- tn <br>
            </p>
            <div class="my-4"></div>
            <div class="row justify-content-between">
              <div class="col-sm-4">
                
              </div>
              <div class="col-sm-8">
                <a class="btn btn-primary" href="{{route('products.create')}}">Cargar producto</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @foreach ($products as $product)
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4>{{ $product->category->name }}</h4>
              <h3>{{$product->name}}</h3>
            </div>
            <img src={{ asset("storage/". $product->avatar. "")}} alt="" style="max-width: 100%">
            <p>
              Posición: {{ $product->rating +1 }}/{{ $products->where('category_id', $product->category->id)->count() }}<br>
              Alto: {{ format_number($product->height, 2) }} cm<br>
              Ancho: {{ format_number($product->width, 2) }} cm<br>
              Profundo: {{ format_number($product->depth,2) }} cm<br>
              Peso: {{ format_number($product->weight,3) }} kg<br>
              Superficie reflectiva: {{ format_number($product->reflex_s, 2) }} cm2 <br>
              Resistencia: {{ format_number($product->resistence, 2) }} tn <br>
            </p>
            <div class="my-4"></div>
            <div class="row justify-content-between">
              <div class="col-sm-6">
                <form class="" action={{ route('products.destroy', $product->id)}} method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" name="" value="borrar" class="btn btn-outline-danger">
                </form>
              </div>
              <div class="col-sm-6">
                <a class="btn btn-primary" href="{{route('products.show', $product->id)}}">Ver producto</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection