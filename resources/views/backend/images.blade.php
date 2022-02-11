}@extends('backend.backend')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Carga masiva de imágenes relacionadas a productos</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_title">
          <div class="row">
            <div class="col-sm-12">
              <div id="exito" class="alert alert-success alert-dismissible fade in" role="alert" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <p>Carga realizada con éxito</p>
              </div>
              @if (session('ImgMessage'))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <p>{{ session('ImgMessage') }}</p>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="x_content">
          <p>Suelte acá las imágenes a cargar en el servidor <strong>Asegúrese de seleccionar la categoría y producto correspondiente</strong></p>
          <br>
          <p><strong>Seleccione "logo de cliente" si la carga será de logos de clientes</strong></p>
          <p><strong>Seleccione "empresa" para imágenes que van en la sección de empresa</strong></p>
          <form action="{{ route('storeImages') }}" class="dropzone" method="post" enctype="multipart/form-data" id="my-dropzone">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-1">
                <input type="radio" name="client" value="client"> Logo de cliente
                <input type="radio" name="client" value="company"> Empresa
              </div>
              <div class="col-sm-3">
                <select class="select2_group form-control" name="category_id">
                  <option value="">Categoría</option>
                  @foreach ($categories as $category)
                    @if (count($category->product) > 0)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="col-sm-3">
                <select class="select2_group form-control" name="product_id">
                  <option value="">Varios</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-3">
                <button class="btn btn-success" type="submit" name="button" id="submit">Subir</button>
              </div>
            </div>
          </form>
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @if (isset($images))
      @foreach ($images as $image)
        <div class="col-sm-3" style="margin-bottom:48px;">
          <img src="{{ Storage::url($image->url) }}" alt="" style="max-width:100%">
          <figcaption>{{ $image->product != null && $image->category != null ? $image->product->name .' - ' . $image->category->name : '' }}</figcaption>
          <div class="" style="margin-top:24px">
            <form class="" action="{{ route('image.delete', $image->id) }}" method="post">
              {{ method_field('DELETE')}}
              {{ csrf_field() }}
              <input type="text" name="id" value="{{ $image->id }}" style="display:none;">
              <input type="submit" name="" value="Eliminar" class="btn btn-danger">
            </form>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  <script type="text/javascript">

      Dropzone.options.myDropzone = {
          autoProcessQueue: false,
          uploadMultiple: true,
          maxFilezise: 10,
          maxFiles: 6,

          init: function() {
              var submitBtn = document.querySelector("#submit");
              myDropzone = this;

              submitBtn.addEventListener("click", function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  myDropzone.processQueue();
              });
              this.on("addedfile", function(file) {
                  $('#exito').css('display', 'block')
              });

              this.on("complete", function(file) {
                  myDropzone.removeFile(file);
              });

              this.on("success",
                  myDropzone.processQueue.bind(myDropzone)
              );
          }
      };


  </script>
@endsection
