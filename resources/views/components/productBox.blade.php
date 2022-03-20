<div class="card product-box">
  <div class="image-container">
    <img src="{{ asset('logos/logo-vert.svg') }}" class="card-img-logo" alt="">
    <img src="{{ Storage::url($product->avatar) }}" class="card-img-top" alt="{{ $product->name }}">
  </div>
  <div class="card-body d-flex justify-content-between flex-column">
    <h3 class="card-title upper bold">{{ $product->name }}</h3>
    <a href="{{ route('product', ['id' => $product->id, 'product' => $product->category->name]) }}" class="btn btn-secondary">Ver más</a>
  </div>
</div>