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
            @foreach ($products as $product)
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>{{ $product->category->name }}</i></h4>
                    <div class="left col-xs-7">
                      <h2>{{$product->name}}</h2>
                      <p><strong>Descripción: </strong> {{ cut_str($product->description) }}</p>
                      <h4>Datos</h4>
                      <ul class="list-unstyled">
                        <li>Alto: {{ $product->height }} mm</li>
                        <li>Ancho: {{ $product->width }} mm</li>
                        <li>Profundo: {{ $product->depth }} mm</li>
                        <li>Peso: {{ $product->weight }} gr</li>
                        <li>Superficie reflectiva: {{ $product->reflex_s }} cm2 </li>
                        <li>Resistencia: {{ $product->resistence }} </li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src={{ asset("storage/". $product->avatar. "")}} alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                      @if ($product->rating > 0)
                        <p>{{ $product->rating +1 }}</p>
                        <p class="ratings">
                          @for ($i=0; $i < $product->rating +1; $i++)
                          <a href="#"><span class="fa fa-star"></span></a>
                          @endfor
                        </p>
                      @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
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
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
