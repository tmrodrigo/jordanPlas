@extends('backend.backend')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Productos <small> productos más vendidos </small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
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
          @if (session('message'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>{{ session('message') }}</strong>
            </div>
          @endif
        </div>
        <div class="x_content">

          <div class="row">
            <div class="col-sm-12">
              <p>Listado de productos ordenados por número de ventas</p>
            </div>
            @foreach ($products as $product)
              <div class="col-md-55">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="{{ Storage::url( $product->avatar ) }}" alt="{{ strtolower( str_replace(' ', '-', $product->name)) . '-' . strtolower( str_replace(' ', '-', $product->category->name))}}" />
                    <div class="mask">
                      <p>{{ $product->name }}</p>
                      <div class="tools tools-bottom">
                        <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="caption">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->category->name }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-default">Ver producto</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  @if (isset($clients))
    <div class="row">
      <div class="col-md-6 col-sm-5 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-envelope-o"></i> Mensajes más recientes <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="panel-group" id="accordion">
                @foreach ($clients as $key => $client)
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h2>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $client->id }}"> {{ '#'.$client->id . ' - ' . strtoupper($client->name) }} - </a>
                        <span>{{ date('d-m-Y | g:i a', strtotime($client->created_at))}}</span>
                      </h2>
                    </div>
                    <div id="collapse{{ $client->id }}" class="panel-collapse collapse{{ $key == 0 ? ' in' : '' }}">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="panel-body">
                            <h4><strong>Teléfono: </strong>{{ $client->phone }}</h4>
                            <h4><strong>Email: </strong>{{ $client->email }}</h4>
                            <h4><strong>Mensaje: </strong>{{ $client->message }}</h4>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          @if (isset($client->budget_id))
                            {{ 'Presupuesto: '. $client->budget_id }}
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <button type="button" name="button" class="btn btn-success" onclick="window.location='{{url('messages')}}'">Ver más mensajes</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Ingresar / Editar nueva categoría</h2><br><br>
              <p>Al cambiar el nombre de una categoría cambiará la categoría de todos los productos asociados a esta</p>
              <p>Solo podrá eliminar categorías que aún no tengan ningún producto asociado</p>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <form class="form-horizontal form-label-left" action="{{ route('category.store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="control-label col-md-2">Categoria Nueva</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2">Descripción</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Descripción">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-2">
                      <button type="submit" class="btn btn-success pull-right">Guardar</button>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="ln_solid"></div>
                </form>
              </div>
                @foreach ($categories as $category)
                  <div class="row">
                    <div class="col-sm-12">
                      <form class="" action="{{ route('category.update', $category ) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('PUT')}}
                          <div class="form-group">
                            <label class="control-label col-md-2">Reemplazar el nombre acá:</label>
                            <div class="col-md-10">
                              <input type="text" name="id" value="{{ $category->id }}" style="display:none;">
                              <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-group">
                            <label class="control-label col-md-2">Reemplazar la descripción acá:</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="{{ $category->description }}" name="description">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-group">
                            <div class="col-sm-offset-10">
                              <input type="submit" name="" value="Editar" class="btn btn-success pull-right">
                            </div>
                          </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-offset-10 col-sm-2">
                      @foreach ($products as $prodcut)
                        @if ($product->category->id !== $category->id)
                          <form class="" action="{{ route('category.destroy', $category) }}" method="post">
                            {{ method_field('DELETE')}}
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{ $category->id }}" style="display:none;">
                            <input type="submit" name="" value="Eliminar" class="btn btn-danger">
                          </form>
                        @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="separador"></div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    <div class="clearfix"></div>
  @endif
  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Ingresar / Editar nuevo certificado</h2><br><br>
          <p>Al ingresar un certificado estará disponible en el panel de carga de producto</p>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div class="row">
            <form class="form-horizontal form-label-left" action="{{ route('certificate.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-md-2">Nuevo certificado</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2">Descripción</label>
                <div class="col-md-10">
                  <input type="file" class="form-control" name="image" value="{{ old('description') }}" placeholder="Logo certificado">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                  <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
            </form>
          </div>
            @foreach ($certificates as $certificate)
              <div class="row">
                <div class="col-sm-12">
                  <form class="" action="{{ route('certificate.update', $certificate ) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT')}}
                      <div class="form-group">
                        <label class="control-label col-md-2">Reemplazar el nombre acá:</label>
                        <div class="col-md-10">
                          <input type="text" name="id" value="{{ $certificate->id }}" style="display:none;">
                          <input type="text" class="form-control" value="{{ $certificate->name }}" name="name">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="">
                        <img src="{{ Storage::url($certificate->img) }}" alt="">
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Reemplazar el logo acá:</label>
                        <div class="col-md-10">
                          <input type="file" class="form-control" value="" name="image">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <div class="col-sm-offset-10">
                          <input type="submit" name="" value="Editar" class="btn btn-success pull-right">
                        </div>
                      </div>
                  </form>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-2">
                    <form class="" action="{{ route('certificate.destroy', $certificate) }}" method="post">
                      {{ method_field('DELETE')}}
                      {{ csrf_field() }}
                      <input type="text" name="id" value="{{ $certificate->id }}" style="display:none;">
                      <input type="submit" name="" value="Eliminar" class="btn btn-danger pull-right separador">
                    </form>
                  </div>
                </div>
              </div>
              <div class="separador"></div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
