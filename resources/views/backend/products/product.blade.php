@extends('backend.budget.base')

@section('title', $product->name)

@section('content')
  <div class="container">
    <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      <input type="hidden" name="id" value="{{ $product->id }}">
      {{-- Bloque 01 --}}
      <div class="row">
        <div class="col-sm-2">
          <img src="{{ Storage::url($product->avatar) }}" alt="">
        </div>
        <div class="col-sm-4">
          <h2>{{ $product->category->name }}</h2>
          <h1>{{ $product->name }}</h1>
          <button type="button" id="delete-button" class="btn btn-danger">Eliminar producto</button>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Datos básicos</h3>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="first-name">Nombre <span class="required">*</span></label>
                  <input type="text" id="name" name="name" value="{{ $product->name }}" required="required" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last-name">Descripción <span class="required">*</span></label>
                  <input type="text" id="last-name" name="description"  value="{{ $product->description }} " required="required" class="form-control">
                </div>
              </div>
              <div class="my-3"></div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Categoría*</label>
                  <select class="form-control" name="category_id">
                    @forelse ($categories as $category)
                      <option value={{ $category->id }} {{ $product->category->id == $category->id ? 'selected' : '' }}> {{ $category->name }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
                <div class="col-sm-6">
                  <label>Sub Categoría*</label>
                  <select class="form-control" name="sub_category_id">
                    <option value="null">Ninguna</option>
                    @forelse ($sub_categories as $sub_category)
                      <option value={{ $sub_category->id }} {{ isset($product->sub_category) && $product->sub_category->id == $sub_category->id ? 'selected' : '' }}> {{ $sub_category->category->name . ' - ' . $sub_category->name }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- Fin bloque 01 --}}
      <div class="my-4"></div>
      {{-- Bloque 02 --}}
      <div class="row">
        {{-- Medidas --}}
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Medidas</h3>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label>Alto</label>
                  <input type="text" name="height" value="{{ $product->height }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Pisada</label>
                  <input type="text" name="width" value="{{ $product->width }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Ancho</label>
                  <input type="text" name="depth" value="{{ $product->depth }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Peso</label>
                  <input type="text" name="weight" value="{{ $product->weight }} " class="form-control">
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-4">
                  <label>Grosor pared</label>
                  <input type="text" name="thickness" value="{{ $product->thickness }} " class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Superficie Reflectiva</label>
                  <input type="text" name="reflex_s" value="{{ $product->reflex_s }} " class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Resistencia</label>
                  <input type="text" name="resistence" value="{{ $product->resistence }} " class="form-control">
                </div>
              </div>
              <div class="my-3"><hr></div>
              <div class="card-title">
                <h3>Sumar medida adicional</h3>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label>Alto</label>
                  <input type="text" name="height-new" value="" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Pisada</label>
                  <input type="text" name="width-new" value="" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Ancho</label>
                  <input type="text" name="depth-new" value="" class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Peso</label>
                  <input type="text" name="weight-new" value="" class="form-control">
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-4">
                  <label>Grosor pared</label>
                  <input type="text" name="thickness-new" value="" class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Superficie reflectiva</label>
                  <input type="text" name="reflex_s-new" value="" class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Resistencia</label>
                  <input type="text" name="resistence-new" value="" class="form-control">
                </div>
              </div>
              <div class="my-3"><hr></div>
              <div class="card-title">
                <h3>Medidas adicionales</h3>
              </div>
              @forelse ($product->meassures as $meassure)
                <div class="row">
                  <div class="col-sm-3">
                    <p> Alto: <br> <b> {{ $meassure->height }} cm</b> </p>
                  </div>
                  <div class="col-sm-3">
                    <p>Pisada: <br> <b> {{ $meassure->width }} cm</b></p>
                  </div>
                  <div class="col-sm-3">
                    <p>Ancho: <br> <b> {{ $meassure->depth }} cm</b></p>
                  </div>
                  <div class="col-sm-3">
                    <p>Peso: <br> <b> {{ $meassure->weight }} kg</b></p>
                  </div>
                </div>
                <div class="my-2"></div>
                <div class="row">
                  <div class="col-sm-3">
                    <p>Grosor pared: <br> <b> {{ $meassure->thickness }} cm</b></p>
                  </div>
                  <div class="col-sm-3">
                    <p>Superficie reflectiva: <br> <b> {{ $meassure->reflex_s }} cm2</b></p>
                  </div>
                  <div class="col-sm-3">
                    <p>Resistencia: <br> <b>{{ $meassure->resistence }} tn</b></p>
                  </div>
                  <div class="col-sm-3">
                    <button id="eliminar-{{ $meassure->id }}" type="button" class="btn btn-outline-danger">Eliminar medida</button>
                  </div>
                </div>
                @if ($product->meassures->count() > 1)
                <hr>                  
                @endif
              @empty
                <h5>Las medidas que agregues las verás acá</h5>
              @endforelse
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          {{-- Archivos --}}
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Archivos</h3>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Avatar</label>
                  <input class="form-control" type="file" name="avatar" value="{{ $product->avatar }} ">
                </div>
                <div class="col-sm-6">
                  <label>Ficha Producto</label>
                  <input class="form-control" type="file" name="info_file" value="{{ $product->info_file }}">
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Ficha izquierda</label>
                  <input class="form-control" type="file" name="left_img" value="{{ $product->left_img }} ">
                </div>
                <div class="col-sm-6">
                  <label>Ficha derecha</label>
                  <input class="form-control" type="file" name="right_img" value="{{ $product->right_img }} ">
                </div>
              </div>            
            </div>
          </div>
          <div class="my-4"></div>
          {{-- Caracteristicas --}}
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Características</h3>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  @if ($product->rating < 0)
                    <p>Solo hay un producto en la lista</p>
                    @else
                    <p>Producto # {{ $product->rating +1 }}</p>
                  @endif
                  <label>
                    @if (count($products) > 0)
                      @foreach ($products as $key => $value)
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="raiting-{{ $key }}" name="rating" value="{{ $key }}" {{ $key == $product->rating ? 'checked' : ''}}>
                          <label class="form-check-label" for="raiting-{{ $key }}">{{ $key +1 }}</label>
                        </div>
                      @endforeach
                    @endif
                  </label>
                </div>
                <div class="col-sm-6">
                  <p>Disponibilidad</p>
                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="available" value="1" {{ $product->available == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="disponible">Disponible</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input id="no_disponible" class="form-check-input" type="radio" name="available" value="0" {{ $product->available != 1 ? 'Checked' : '' }}>
                    <label class="form-check-label" for="no_disponible">No disponible</label>
                  </div>
                </div>
              </div>
              <div class="my-3"></div>
              <div class="row">
                <div class="col-sm-6">
                  <p>Unidad disponible</p>
                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="units" value="mt" {{ $product->units == 'mt' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disponible">Metros</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="units" value="un" {{ $product->units == 'un' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disponible">Unidad</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <label for="">Fijaciones</label>
                  <select name="fixation_id" class="form-control">
                    @forelse ($fixations as $f)
                      <option value="{{ $f->id }}"  {{ $product->fixation->first() != null && $product->fixation->first()->id == $f->id ? 'selected' : '' }} >{{ $f->tirafondo }}</option>
                      @empty
                    @endforelse
                  </select>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" name="fixation_amount" value="{{ $product->fixation->first() != null ? $product->fixation->first()->pivot->amount : '' }}" class="form-control">
                  </div>
                </div>
              </div>            
            </div>
          </div>
          <div class="my-4"></div>
          {{-- Botonera --}}
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href={{ route('products.index')}} class="btn btn-outline-dark btn-lg" type="a">Cancelar</a>              
            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
          </div>        
        </div>
      </div>
      {{-- Fin bloque 02 --}}
    </form>
    <div class="my-4"></div>
    {{-- Colores --}}
    <div class="row">
      <div class="col-sm-6">
        <form action="{{ route('update_body_color', ['product' => $product]) }}" method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Color cuerpo</h3>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  @foreach ($colors as $color)
                    <div class="col-auto form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="body_color_{{ $color->value }}" name="body_color_id[]" value="{{ $color->id }}" {{ $product->colors->where('pivot.body', true)->whereIn('name', [$color->name])->count() > 0 ? 'checked' : '' }}>
                      <label class="form-check-label" for="body_color_{{ $color->value }}">{{ $color->value }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-outline-info">Actualizar color cuerpo</button>
                </div>
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="col-sm-6">
        <form action="{{ route('update_reflex_color', ['product' => $product]) }}" method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Color reflectivo</h3>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  @foreach ($colors as $color)
                    <div class="col-auto form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="light_color_{{ $color->value }}" name="light_color_id[]" value="{{ $color->id }}" {{ $product->colors->where('pivot.reflective', true)->whereIn('name', [$color->name])->count() > 0 ? 'checked' : '' }}>
                      <label class="form-check-label" for="light_color_{{ $color->value }}">{{ $color->value }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-outline-info">Actualizar color reflectivo</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="my-4"></div>
  </div>

@endsection

@section('scripts')
  @forelse ($product->meassures as $m)
    <script>
      $(document).ready(function(){
        $('#eliminar-{{ $m->id }}').on('click', function(){
          $('#form-{{ $m->id }}').submit()
        })
      })
    </script>
    <form id="form-{{ $m->id }}" action="{{ route('meassure.delete') }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $m->id }}">
    </form>

  @empty
  
  @endforelse
  <form id="delete-product" action="{{ route('products.destroy', $product->id )}}" method="post" style="display: none">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
  </form>
  <script>
    $(document).ready(function(){
      $('#delete-button').on('click', function(){
        $('#delete-product').submit()
      })
    })
  </script>
@endsection