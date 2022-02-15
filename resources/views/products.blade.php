@extends('layouts.app')

@section('title', $category->name)

@section('content')
  <div class="container">    
    <section id="productos">
      <div class="row">
        <div class="col-sm-12">
          <div class="textoSeccion">
            <div>
             <a class="breadcrumb" href="/">< Volver a Home</a>
            </div>
            <h1 class="bold cap primary">{{ $category->name }}</h1>
            <div class="my-3"></div>
            <div class="row">
              <div class="col-sm-12">
                <p>{{ cut_str($category->description, 500) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-5"></div>
      <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-3 col-lg-2">
          <div class="my-5 my-md-0"></div>
          <h3 class="upper mb-2">Productos</h3>
          <ul class="side-menu">
            @forelse ($categories as $category)
              <li>
                <a class="cap {{ $id == $category->id ? 'bold' : '' }}" href="{{ route('category', ['id' => $category->id, 'category' => $category->name]) }}">{{ $category->name }}</a>
                @if ($category->sub_categories->count() > 0)
                  @forelse ($category->sub_categories as $sub_category)
                    <ul class="submenu">
                      <li><a class="{{ $sub_id == $sub_category->id ? 'bold' : '' }}" href="{{ route('subcategory', ['subcategory' => $sub_category]) }}">{{ $sub_category->name }}</a></li>
                    </ul>
                  @empty
                  
                @endforelse
              @endif
              </li>

            @empty
              
            @endforelse
          </ul>
        </div>
        <div class="col-md-9 col-lg-10">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($products as $product)
              <div class="col-sm-4">
                @include('components.productCard')
              </div>
            @empty
              
            @endforelse
          </div>
        </div>
      </div>
    </section>
    <div class="my-5"></div>
  </div>
  <script>

    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 

  </script>
@endsection
