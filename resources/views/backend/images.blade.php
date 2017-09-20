@extends('backend.backend')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Dropzone multiple file uploader</h2>
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
        <div class="x_content">
          <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>
          <form action="{{ route('storeImages') }}" class="dropzone" method="post" enctype="multipart/form-data" id="my-dropzone">
            {{ csrf_field() }}
            <select class="" name="category_id">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <select class="" name="product_id">
              <option value="">Varios</option>
              @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
              @endforeach
            </select>
            <button class="btn btn-success" type="submit" name="button" id="submit">Subir</button>
          </form>
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
    </div>
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
              // this.on("addedfile", function(file) {
              //     alert("file uploaded");
              // });

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
