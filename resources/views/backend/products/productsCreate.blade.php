@extends('backend.budget.base')

@section('title', 'Nuevo producto')

@section('content')
  <div class="container">
    <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      {{-- Bloque 01 --}}
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Datos básicos</h3>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="first-name">Nombre <span class="required">*</span></label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" required="required" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last-name">Descripción <span class="required">*</span></label>
                  <input type="text" id="last-name" name="description"  value="{{ old('description') }} " required="required" class="form-control">
                </div>
              </div>
              <div class="my-3"></div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Categoría*</label>
                  <select class="form-control" name="category_id">
                    @forelse ($categories as $category)
                      <option value={{ $category->id }} {{ old('category_id') == $category->id ? 'selected' : '' }}> {{ $category->name }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                  <input type="text" name="height" value="{{ old('height') }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Pisada</label>
                  <input type="text" name="width" value="{{ old('width') }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Ancho</label>
                  <input type="text" name="depth" value="{{ old('depth') }} " class="form-control">
                </div>
                <div class="col-sm-3">
                  <label>Peso</label>
                  <input type="text" name="weight" value="{{ old('weight') }} " class="form-control">
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-4">
                  <label>Grosor pared</label>
                  <input type="text" name="thickness" value="{{ old('thickness') }} " class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Superficie Reflectiva</label>
                  <input type="text" name="reflex_s" value="{{ old('reflex_s') }} " class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Resistencia</label>
                  <input type="text" name="resistence" value="{{ old('resistence') }} " class="form-control">
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
                  <input class="form-control" type="file" name="avatar" value="{{ old('avatar') }} ">
                </div>
                <div class="col-sm-6">
                  <label>Ficha Producto</label>
                  <input class="form-control" type="file" name="info_file" value="{{ old('info_file') }}">
                </div>
              </div>
              <div class="my-2"></div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Ficha izquierda</label>
                  <input class="form-control" type="file" name="left_img" value="{{ old('left_img') }} ">
                </div>
                <div class="col-sm-6">
                  <label>Ficha derecha</label>
                  <input class="form-control" type="file" name="right_img" value="{{ old('right_img') }} ">
                </div>
              </div>            
            </div>
          </div>
          <div class="my-4"></div>   
        </div>
        <div class="col-sm-6">
          {{-- Caracteristicas --}}
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h3>Características</h3>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <p>Disponibilidad</p>
                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="available" value="1" {{ old('available') == 1 ? 'checked' : '' }} checked>
                    <label class="form-check-label" for="disponible">Disponible</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input id="no_disponible" class="form-check-input" type="radio" name="available" value="0" {{ old('available') != 1 ? 'Checked' : '' }}>
                    <label class="form-check-label" for="no_disponible">No disponible</label>
                  </div>
                </div>
              </div>
              <div class="my-3"></div>
              <div class="row">
                <div class="col-sm-6">
                  <p>Unidad disponible</p>
                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="units" value="mt" {{ old('units') == 'mt' ? 'checked' : '' }} checked>
                    <label class="form-check-label" for="disponible">Metros</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input id="disponible" class="form-check-input" type="radio" name="units" value="un" {{ old('units') == 'un' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disponible">Unidad</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <label for="">Fijaciones</label>
                  <select name="fixation_id" class="form-control">
                    @foreach ($fixations as $f)
                      <option value="{{ $f->id }}"  {{ old('fixation_id') == $f->id ? 'selected' : '' }} >{{ $f->tirafondo }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" name="fixation_amount" value="{{ old('fixation_amount') }}" class="form-control">
                  </div>
                </div>
              </div>            
            </div>
          </div>
          <div class="my-4"></div>
        </div>
      </div>
      {{-- Fin bloque 02 --}}
    {{-- Colores --}}
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Color cuerpo</h3>
            </div>
            <div class="row">
              <div class="col-sm-12">
                @foreach ($colors as $color)
                  <div class="col-auto form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="body_color_{{ $color->value }}" name="body_color_id[]" value="{{ $color->id }}">
                    <label class="form-check-label" for="body_color_{{ $color->value }}">{{ $color->value }}</label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Color reflectivo</h3>
            </div>
            <div class="row">
              <div class="col-sm-12">
                @foreach ($colors as $color)
                  <div class="col-auto form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="light_color_{{ $color->value }}" name="light_color_id[]" value="{{ $color->id }}">
                    <label class="form-check-label" for="light_color_{{ $color->value }}">{{ $color->value }}</label>
                  </div>
                @endforeach
              </div>
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
    </form>
    <div class="my-4"></div>
  </div>

@endsection
