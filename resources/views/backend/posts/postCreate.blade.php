@extends('backend.backend')

@section('title', 'cargar novedad')

@section('content')
  <div class="clearfix"></div>
  <div class="row">
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Cargar una novedad</h2>
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
          <br />
          <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Título <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="name" name="name" value="{{ old('name') }}" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="description" name="description"  value="{{ old('description') }}" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Imagen <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="image" name="image"  value="{{ old('image') }}" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
