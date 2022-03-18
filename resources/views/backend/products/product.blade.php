@extends('backend.backend')

@section('title', $product->name)

@section('content')
<div class="row">
  <div class="x_content">
    <div class="x_title">
      <div class="avatar">
        <img src="{{ Storage::url($product->avatar) }}" alt="">
      </div>
      <h1>{{ $product->name }}</h1>
      <h2>{{ $product->category->name }}</h2>
      <div class="clearfix"></div>
      <div class="separador">
        <form class="" action="{{ route('products.destroy', $product->id )}}" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="submit" name="" value="Eliminar producto" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
  <div class="x_content">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <strong>{{ $error }}</strong>
        </div>
      @endforeach
    @endif
    @if (session('message'))
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong>{{ session('message') }}</strong>
      </div>
    @endif
  </div>
  <div class="x_content">
    <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <input type="text" name="id" value="{{ $product->id }}" style="display:none">
      <div class="row">
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>Datos básicos</h3>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label for="first-name">Nombre <span class="required">*</span></label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required="required" class="form-control">
              </div>
              <div class="col-sm-6">
                <label for="last-name">Descripción <span class="required">*</span></label>
                <input type="text" id="last-name" name="description"  value="{{ $product->description }} " required="required" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mb-4">
                <label>Categoría*</label>
                <select class="form-control" name="category_id">
                  @forelse ($categories as $category)
                    <option value={{ $category->id }} {{ $product->category->id == $category->id ? 'selected' : '' }}> {{ $category->name }}</option>
                  @empty
                    
                  @endforelse
                </select>
              </div>
              <div class="col-sm-4">
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
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>Medidas</h3>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Alto</label>
                <input type="text" name="height" value="{{ $product->height }} " class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Pisada</label>
                <input type="text" name="width" value="{{ $product->width }} " class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Ancho</label>
                <input type="text" name="depth" value="{{ $product->depth }} " class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Peso</label>
                <input type="text" name="weight" value="{{ $product->weight }} " class="form-control">
              </div>
              <div class="col-sm-6">
                <label>Grosor pared</label>
                <input type="text" name="thickness" value="{{ $product->thickness }} " class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>Características</h3>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Superficie Reflectiva</label>
                <input type="text" name="reflex_s" value="{{ $product->reflex_s }} " class="form-control">
              </div>
              <div class="col-sm-6">
                <label>Resistencia</label>
                <input type="text" name="resistence" value="{{ $product->resistence }} " class="form-control">
              </div>
            </div>
            <div class="separador"></div>
            <div class="row">
              <div class="col-sm-6">
                <label>Color cuerpo</label>
                <div class="row">
                  @foreach ($colors as $color)
                    <div class="col-sm-3 checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="body_color_id[]" value="{{ $color->id }}" {{ $product->colors->where('pivot.body', true)->whereIn('name', [$color->name])->count() > 0 ? 'checked' : '' }}><br> {{ $color->value }}
                      </label>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="col-sm-6">
                <label>Color reflectivo</label>
                <div class="row">
                  @foreach ($colors as $color)
                    <div class="col-sm-3 checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="light_color_id[]" value="{{ $color->id }}" {{ $product->colors->where('pivot.reflective', true)->whereIn('name', [$color->name])->count() > 0 ? 'checked' : '' }}><br> {{ $color->value }}
                        </label>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="separador"></div>
            <div class="row">
              <div class="col-sm-6">
                <label>Posición en la lista<span></span></label>
                @if ($product->rating < 0)
                  <p><strong>Solo hay un producto en la lista</strong></p>
                  @else
                    <p><strong>Producto #</strong> {{ $product->rating +1 }}</p>
                @endif
                <div class="checkbox">
                  <label>
                    @if (count($products) > 0)
                      @foreach ($products as $key => $value)
                        <input type="radio" class="flat" name="rating" value="{{ $key }}" {{ $key == $product->rating ? 'checked' : ''}}> {{ $key +1 }}<span style="margin-right:16px !important"></span>
                      @endforeach
                    @endif
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <label>Disponibilidad<small> activar si no está en stock</small></label>
                <div class="checkbox">
                  <label>
                    <input type="radio" class="flat" name="available" value="1" {{ $product->available == 1 ? 'Checked' : '' }}> Disponible
                    <input type="radio" class="flat" name="available" value="0" {{ $product->available != 1 ? 'Checked' : '' }}> No disponible
                  </label>
                </div>
              </div>
            </div>
            <div class="separador"></div>
            <div class="row">
              <div class="col-sm-6">
                <label>Unidad disponible</label>
                <div class="ratiobutton">
                  <label>
                    <input type="radio" class="flat" name="units" value="mt" {{ $product->units == 'mt' ? 'checked' : '' }}> Metros
                    <input type="radio" class="flat" name="units" value="un" {{ $product->units == 'un' ? 'checked' : '' }}> Unidad
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                <div class="col-sm-6">
                  <label for="">Fijaciones</label>
                <select name="fixation_id">
                  @foreach ($fixations as $f)
                    <option value="{{ $f->id }}"  {{ $product->fixation->first()->id == $f->id ? 'selected' : '' }} >{{ $f->tirafondo }}</option>
                  @endforeach
                </select>
                </div>
                <div class="col-sm-6">
                  <label for="">Cantidad</label>
                  <input type="text" name="fixation_amount" value="{{ $product->fixation->first()->pivot->amount }}">
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>Medidas adicionales</h3>
              <div class="clearfix"></div>
            </div>
            @forelse ($product->meassures as $meassure)
              <div class="row">
              <div class="col-sm-4">
                <label>Alto</label>
                <input type="text" name="height-{{ $meassure->id }}" value="{{ $meassure->height }}" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Pisada</label>
                <input type="text" name="width-{{ $meassure->id }}" value="{{ $meassure->width }}" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Ancho</label>
                <input type="text" name="depth-{{ $meassure->id }}" value="{{ $meassure->depth }}" class="form-control">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">
                <label>Peso</label>
                <input type="text" name="weight-{{ $meassure->id }}" value="{{ $meassure->weight }}" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Grosor pared</label>
                <input type="text" name="thickness-{{ $meassure->id }}" value="{{ $meassure->thickness }}" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Superficie reflectiva</label>
                <input type="text" name="reflex_s-{{ $meassure->id }}" value="{{ $meassure->reflex_s }}" class="form-control">
              </div>
            </div>
            <br>
            <button id="eliminar-{{ $meassure->id }}" type="button" class="btn btn-danger">Eliminar</button>
            @empty
              
            @endforelse
            <br>
            <br>
            <div class="row">
              <div class="col-sm-4">
                <label>Alto</label>
                <input type="text" name="height-new" value="" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Pisada</label>
                <input type="text" name="width-new" value="" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Ancho</label>
                <input type="text" name="depth-new" value="" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Peso</label>
                <input type="text" name="weight-new" value="" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Grosor pared</label>
                <input type="text" name="thickness-new" value="" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Superficie reflectiva</label>
                <input type="text" name="reflex_s-new" value="" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>PDF</h3>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Ficha Producto</label>
                <input type="file" name="info_file" value="{{ $product->info_file }}">
              </div>
              <div class="col-sm-6">
                <label>Manual aplicación</label>
                <input type="file" name="manual_file" value="{{ $product->manual_file }}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="x_panel">
            <div class="x_title">
              <h3>Imágenes</h3>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label>Avatar</label>
                <input type="file" name="avatar" value="{{ $product->avatar }} ">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Ficha izquierda</label>
                <input type="file" name="left_img" value="{{ $product->left_img }} ">
              </div>
              <div class="col-sm-6">
                <label>Ficha derecha</label>
                <input type="file" name="right_img" value="{{ $product->right_img }} ">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="ln_solid"></div>
      <div class="row">
        <div class="col-md-2 col-md-offset-10">
          <button type="submit" class="btn btn-success">Guardar</button>
          <a href={{ route('products.index')}} class="btn btn-primary" type="a">Cancelar</a>
        </div>
      </div>
      <div class="form-group">
      </div>

    </form>
  </div>
</div>
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

@endsection
