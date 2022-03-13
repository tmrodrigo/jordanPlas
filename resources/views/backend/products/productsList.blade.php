@extends('backend.backend')

@section('title', "Productos")

@section('sectionTitle', "Productos en la base de datos")


@section('content')
  <div class="row">
    <div class="col-sm-12">
      @if (session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>{{ session('message') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="row">
            @if (count($categories) < 1)
              <div class="row">
                <div class="col-sm-12">
                  <div class="">
                    <h1>Debe cargar una categoría antes de cargar un producto</h1>
                    <a href="backendHome" class="btn btn-primary">Cargar categoría acá</a>
                  </div>
                </div>
              </div>
            @endif
            @if (count($categories) >= 1)
              <div class="row">
                <div class="col-sm-12">
                  <div class="btn btn-primary">
                    <a href="{{route('products.create')}}"  style="color:white">Cargar nuevo producto</a>
                  </div>
                </div>
              </div>
            @endif
            <div class="clearfix"></div>
            <div class="row">
            @foreach ($products as $product)
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>{{ $product->category->name }}</i></h4>
                    <div class="left col-xs-7">
                      <h2>{{$product->name}}</h2>
                      <p>Posición: {{ $product->rating +1 }}/{{ $products->where('category_id', $product->category->id)->count() }}</p>
                      <ul class="list-unstyled">
                        <li>Alto: {{ format_number($product->height, 2) }} cm</li>
                        <li>Ancho: {{ format_number($product->width, 2) }} cm</li>
                        <li>Profundo: {{ format_number($product->depth,2) }} cm</li>
                        <li>Peso: {{ format_number($product->weight,3) }} kg</li>
                        <li>Superficie reflectiva: {{ format_number($product->reflex_s, 2) }} cm2 </li>
                        <li>Resistencia: {{ format_number($product->resistence, 2) }} tn </li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src={{ asset("storage/". $product->avatar. "")}} alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="btn btn-default">
                            <a href="{{route('products.show', $product->id)}}">ver producto</a>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <form class="" action={{ route('products.destroy', $product->id)}} method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" name="" value="borrar" class="btn btn-danger">
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
