<div class="card product-card">
  <img src="{{ Storage::url($product->avatar) }}" class="card-img-top" alt="{{ $product->name }}">
  <div class="card-body d-flex justify-content-between flex-column">
    <h3 class="card-title upper bold">{{ $product->name }}</h3>
    <ul>
      @if ($product->height > 1)
        <li>Alto: <b class="number">{{ format_number($product->height) }}</b> <b>mm</b></li>                        
      @endif
      @if ($product->width > 1)
        <li>{{ $product->depth > 1 ? 'Ancho:' : 'Diámetro:'  }} <b class="number">{{ format_number($product->width) }}</b> <b>mm</b></li>                        
      @endif
      @if ($product->depth > 1)
        <li>Pisada: <b class="number">{{ format_number($product->depth) }}</b> <b>mm</b></li>                                    
      @endif
      <div class="mt-3 mt-md-0"></div>
    </ul>
    <a href="{{ route('product', ['id' => $product->id, 'product' => $product->category->name]) }}" class="btn btn-secondary">Ver más</a>
  </div>
</div>