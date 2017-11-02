@extends('backend.backend')

@section('title', 'cargar producto')

@section('content')
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h1>Formulario alta de producto</h1>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <strong>{{ $error }}</strong>
              </div>
            @endforeach
          @endif
        </div>
        <div class="x_content">
          <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Datos básicos</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="first-name">Nombre <span class="required">*</span></label>
                      <input type="text" id="name" name="name" value="{{ old('name') }}" required="required" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <label for="last-name">Descripción <span class="required">*</span></label>
                      <input type="text" id="last-name" name="description"  value="{{ old('description') }} " required="required" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <label>Categoría*</label>
                      <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                          <option value={{ $category->id }}> {{ $category->name }}</option>
                        @endforeach
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
                    <div class="col-sm-3">
                      <label>Alto</label>
                      <input type="text" name="height" value="{{ old('height') }} " class="form-control">
                    </div>
                    <div class="col-sm-3">
                      <label>Ancho</label>
                      <input type="text" name="width" value="{{ old('width') }} " class="form-control">
                    </div>
                    <div class="col-sm-3">
                      <label>Profundo</label>
                      <input type="text" name="depth" value="{{ old('depth') }} " class="form-control">
                    </div>
                    <div class="col-sm-3">
                      <label>Peso</label>
                      <input type="text" name="weight" value="{{ old('weight') }} " class="form-control">
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
                      <input type="text" name="reflex_s" value="{{ old('reflex_s') }} " class="form-control">
                    </div>
                    <div class="col-sm-6">
                      <label>Resistencia</label>
                      <input type="text" name="resistence" value="{{ old('resistence') }} " class="form-control">
                    </div>
                  </div>
                  <div class="separador"></div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Color cuerpo</label>
                      <div class="row">
                        @foreach ($bColors as $color)
                          @if ((strlen($color->name) < 7) && ($color->name != "red"))
                            <div class="col-sm-3 checkbox">
                              <label>
                                <input type="checkbox" class="flat" name="body_color_id[]" value="{{ $color->name }}"><br> {{ $color->value }}
                              </label>
                            </div>
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label>Color reflectivo</label>
                      <div class="row">
                        <div class="row">
                          @foreach ($rColors as $color)
                            @if (($color->name != 'black') && $color->name != 'orange')
                              <div class="col-sm-3 checkbox">
                                <label>
                                  <input type="checkbox" class="flat" name="light_color_id[]" value="{{ $color->name }}"><br> {{ $color->value }}
                                </label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="separador"></div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Más vendido - <span>1 menos vendido 5 más vendido</span></label>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="rating" value="1"> 1
                          <input type="checkbox" class="flat" name="rating" value="2"> 2
                          <input type="checkbox" class="flat" name="rating" value="3"> 3
                          <input type="checkbox" class="flat" name="rating" value="4"> 4
                          <input type="checkbox" class="flat" name="rating" value="5"> 5
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label>Disponibilidad<small> activar si no está en stock</small></label>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="available" value="1"> No disponible
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
                          <input type="radio" class="flat" name="units" value="mt"> Metros
                          <input type="radio" class="flat" name="units" value="un"> Unidad
                        </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Certificados</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    @foreach ($certificates as $certificate)
                      <div class="col-sm-3">
                        <label>Nombre</label>
                        <br>
                        <label>
                          <input type="checkbox" class="flat" name="certificate_id[]" value="{{ $certificate->id }}"> {{ $certificate->name }}
                        </label>
                      </div>
                    @endforeach
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
                      <input type="file" name="info_file" value="{{ old('info_file') }}">
                    </div>
                    <div class="col-sm-6">
                      <label>Manual aplicación</label>
                      <input type="file" name="manual_file" value="{{ old('manual_file') }}">
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
                      <input type="file" name="avatar" value="{{ old('avatar') }} ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Ficha izquierda</label>
                      <input type="file" name="left_img" value="{{ old('left_img') }} ">
                    </div>
                    <div class="col-sm-6">
                      <label>Ficha derecha</label>
                      <input type="file" name="right_img" value="{{ old('right_img') }} ">
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
    </div>
  </div>

@endsection
