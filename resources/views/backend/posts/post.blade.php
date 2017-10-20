@extends('backend.backend')

@section('title', $post->name)

@section('content')
<div class="row">
  <div class="col-sm-6">
    <h1>{{ $post->name }}</h1>
    <div class="clearfix"></div>
    <div class="col-sm-12">
      <img src="{{ Storage::url($post->image) }}" alt="" style="width:100%;">
    </div>
  </div>
  <div class="col-sm-6">
    <div class="x_title">
      <h2>Formulario de actualización</h2>
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
    <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Título </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="name" value="{{$post->name}}" class="form-control" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <textarea class="form-control" rows="3" name="description" value="{{$post->description}}" placeholder="descripción"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="file" name="image" value="{{$post->avatar}}">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
    @if (count($posts) > 1)
      <form class="" action={{ route('posts.destroy', $post->id)}} method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" name="" value="Eliminar novedad" class="btn btn-danger">
      </form>
    @endif
  </div>
</div>
@endsection
