@extends('backend.budget.base')

@section('title', 'Inicio')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Rubros</h3>
            </div>
            <h4>Nuevo rubro</h4>
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row row-cols-1 row-cols-2 g-4">
                <div class="col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
                  </div>
                <div class="col-sm-6">
                  <label>Descripción</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Descripción">
                </div>
                <div class="col-sm-6">
                  <label>Avatar</label>
                  <input type="file" name="avatar" value="" class="form-control" id="" placeholder="">
                </div>
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
              </div>
            </form>
            <hr>
            <h4>Rubros</h4>
            @forelse ($categories as $category)
              <div class="row mb-2">
                <div class="col-sm-8">
                  <p>{{ $category->name }}</p>
                </div>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}">Editar</button>
                </div>
              </div>
              <div class="modal fade" id="edit-category-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar {{ $category->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('category.update', $category ) }}" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="row">
                          @csrf
                          {{ method_field('PUT')}}
                          <input type="hidden" name="id" value="{{ $category->id }}">
                          <div class="col-auto form-group">
                            <label >Nuevo nombre</label>
                            <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                          </div>
                          <div class="col-auto form-group">
                            <label >Nueva descripción:</label>
                            <input type="text" class="form-control" value="{{ $category->description }}" name="description">
                          </div>
                          <div class="my-3"></div>
                          <div class="col-auto">
                            <img src="{{ Storage::url($category->avatar) }}" alt="{{ $category->name }}" style="width:150px;">
                            <div class="my-2"></div>
                            <div class="form-group">
                              <label >Nuevo avatar</label>
                              <input type="file" name="avatar" value="" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>                    
                    </form>
                  </div>
                </div>
              </div>
            @empty
              
            @endforelse
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Sub rubros</h3>
            </div>
            <h4>Nuevo rubro</h4>
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row row-cols-1 row-cols-2 g-4">
                <div class="col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
                  </div>
                <div class="col-sm-6">
                  <label>Descripción</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Descripción">
                </div>
                <div class="col-sm-6">
                  <label>Avatar</label>
                  <input type="file" name="avatar" value="" class="form-control" id="" placeholder="">
                </div>
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
              </div>
            </form>
            <hr>
            <h4>Sub rubros</h4>
            @forelse ($sub_categories as $sub_category)
              <div class="row mb-2">
                <div class="col-sm-4">
                  <p>{{ $sub_category->name }}</p>
                </div>
                <div class="col-sm-4">
                  <p>{{ $sub_category->category->name }}</p>
                </div>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit-sub-category-{{ $sub_category->id }}">Editar</button>
                </div>
              </div>
              <div class="modal fade" id="edit-sub-category-{{ $sub_category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar {{ $sub_category->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('sub_category_update', ['sub_category' => $sub_category]) }}" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="row">
                          @csrf
                          <input type="hidden" name="id" value="{{ $sub_category->id }}">
                          <div class="col-auto form-group">
                            <label >Nuevo nombre</label>
                            <input type="text" class="form-control" value="{{ $sub_category->name }}" name="name">
                          </div>
                          <div class="col-auto form-group">
                            <label >Nuevo rubro:</label>
                            <div class="form-group">
                              <select class="form-control col-md-10" name="category_id" id="category_id">
                                @forelse ($categories as $category)
                                  <option value="{{ $category->id }}" {{ $sub_category->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                            
                                @endforelse
                              </select>
                            </div>
                          </div>
                          <div class="my-3"></div>
                          <div class="col-auto">
                            <img src="{{ Storage::url($sub_category->avatar) }}" alt="{{ $sub_category->name }}" style="width:150px;">
                            <div class="my-2"></div>
                            <div class="form-group">
                              <label >Nuevo avatar</label>
                              <input type="file" name="avatar" value="" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>                    
                    </form>
                  </div>
                </div>
              </div>
            @empty
              
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <div class="my-4"></div>
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h3>
            Productos
          </h3>
        </div>
        <div class="row">
          @forelse ($products as $product)
            <div class="col-sm-2 mb-2 d-flex justify-content-between " style="min-height: 250px; flex-flow:column">
              <img style="width: 100%; display: block;" src="{{ Storage::url( $product->avatar ) }}" alt="" />
              <p>
                <small>{{ $product->category->name }}</small><br>
                {{ $product->name }}
              </p>
              <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-dark">Ver producto</a>
            </div>
          @empty
          
          @endforelse
        </div>
      </div>
    </div>


  </div>
@endsection