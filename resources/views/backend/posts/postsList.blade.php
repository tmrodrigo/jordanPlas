@extends('backend.backend')

@section('title', "Productos")

@section('sectionTitle', "Productos en la base de datos")


@section('content')
  <div class="row">
    <div class="col-sm-12">
      @if (session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>{{ session('message') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              {{-- <ul class="pagination pagination-split">
                <li>{{ $posts->links() }}</li>
              </ul> --}}
            </div>

            <div class="clearfix"></div>
            @foreach ($posts as $post)
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    {{-- <h4 class="brief"><i>{{ $post->category_id }}</i></h4> --}}
                    <div class="left col-xs-7">
                      <h2>{{$post->name}}</h2>
                      <p><strong>Descripción: </strong> {{$post->description}}</p>
                      <ul class="list-unstyled">
                        {{-- <li><i class="fa fa-building"></i> Address: </li>
                        <li><i class="fa fa-phone"></i> Phone #: </li> --}}
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="{{ Storage::url($post->image)}}" alt="" class="img-responsive">
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                      {{-- <p class="ratings">
                        <a>4.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star-o"></span></a>
                      </p> --}}
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <div class="btn btn-default">
                        <a href="{{route('posts.show', $post->id)}}">ver</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="btn btn-primary">
                <a href="{{route('posts.create')}}"  style="color:white">Cargar Novedad</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
