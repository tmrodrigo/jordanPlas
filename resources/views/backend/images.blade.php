@extends('backend.budget.base')

@section('title', 'Imagenes')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Carga masiva de imágenes relacionadas a productos</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">

          </div>

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
          <p>Suelte acá las imágenes a cargar en el servidor <strong>Asegúrese de seleccionar la categoría y producto correspondiente</strong></p>
          <br>
          <form action="{{ route('storeImages') }}" class="dropzone row g-3" method="post" enctype="multipart/form-data" id="my-dropzone">
            {{ csrf_field() }}
            <div class="col-auto">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="client" value="company" checked>
                <label class="form-check-label" for="inlineRadio1">Empresa</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="client" value="client">
                <label class="form-check-label" for="inlineRadio1">Logo de cliente</label>
              </div>
            </div>
            <div class="col-auto form-group">
              <select class="form-control" name="category_id">
                <option value="">Categoría</option>
                @foreach ($categories as $category)
                  @if (count($category->product) > 0)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-auto form-group">
              <select class="select2_group form-control" name="product_id">
                <option value="">Varios</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
              </select>
            </div>
            <button class="col-auto btn btn-success" type="submit" name="button" id="submit">Subir</button>
          </form>
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
    </div>
  </div>
  <div class="my-4"></div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h3>Imágenes seleccionadas</h3>
          </div>
          <div class="row">
          @forelse ($images as $image)
                <div class="col-sm-3" style="margin-bottom:48px;">
                  <img src="{{ Storage::url($image->url) }}" alt="" style="max-width:100%">
                  <figcaption>{{ $image->product != null && $image->category != null ? $image->product->name .' - ' . $image->category->name : '' }}</figcaption>
                  <div class="mt-3">
                    <form class="" action="{{ route('image.delete', $image->id) }}" method="post">
                      {{ method_field('DELETE')}}
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $image->id }}">
                      <input type="submit" name="" value="Eliminar" class="btn btn-outline-danger">
                    </form>
                  </div>
                </div>
              @empty
            
          @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- Dropzone.js -->
<script src="{{ url('dropzone/dist/min/dropzone.min.js') }}"></script>
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