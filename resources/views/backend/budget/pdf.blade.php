<html>
<head>
  <style>
      @page {
        margin: 0;
        width: 21cm;
        height: 29.7cm;
      }

      body {
        margin: 0;
        background: top no-repeat url("{{ asset('logos/hoja_presupuesto.png') }}");
        background-size: contain;
      }

      h1, h2, h3, h4, h5, h6, p, b, span, table, tr, td, th, {
        margin: 0;
        padding: 0;
        color: black;
        text-align: :left;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif !important
      }

      td {
        vertical-align: top;
        text-align: left;
        box-sizing: border-box;
      }

      th {
        background-color: black;
        padding: 6px;
      }

      th b {
        color: white;
      }

      .products td {
        border-bottom: 1px solid gray;
        padding-top: 12px;
      }

      table {
        width: 100%;
        padding: 0 24px;
      }

      .client-info {
        position: fixed;
        margin: 0;
        margin-top: 90px;
      }

      .client-info td {
        border: 2px solid black;
        padding: 8px;
        padding-bottom: 16px;
      }

      .client-info .td-left {
        border-right: 0 !important;
      }

      .client-info .td-right {
        border-left: 0 !important;
      }

      .product-info {
        width: 140px;
        padding-left: 6px;
        padding-bottom: 6px;
      }

      .product-description {
        width: 220px;
        padding-left: 6px;
        padding-bottom: 6px;
      }

      .product-unit-price {
        width: 77px;
        padding-left: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        text-align: right !important;
      }

      .product-sub-total {
        width: 77px;
        padding-left: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        text-align: right !important;
      }

      .product-amount {
        width: 76px;
        padding-left: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        text-align: right !important;
      }

      img {
        width: 100px;
        padding-left: 6px;
      }

      .products {
        margin-top: 180px;
        left: 0;
        right: 0;
        border: 1px solid black;
      }

      .total-price {
        /* position: fixed; */
        bottom: 200px;
        left: 0;
        right: 0;
        border: 1px solid black;
      }

      h1, h2 {
        font-size: 18px;
        line-height: 22px;
      }

      h3, h4 {
        font-size: 12px;
        line-height: 1.5;
      }

      h2, h3, h4 {
        text-align: right !important;
        padding: 6px;
      }

      h5, h6 {
        text-transform: uppercase;
      }

      h5 {
        font-size: 18px !important;
        margin-bottom: 6px;
      }

      h6 {
        margin-bottom: 6px;
      }

      p, b {
        font-size: 12px;
        line-height: 16px;
      }

      .product-description p {
        font-size: 10px;
        line-height: 12px;
        text-align: justify;
      }

      .total {
        background: #cccccc;
        vertical-align: middle;
        border: 1px solid black;
      }

      .total h2 {
        margin-top: 3px;
        padding-top: 3px;
        vertical-align: middle;
        line-height: 1.2
      }

      .total-price tr th:last-child {
        text-align: right;
      }

      .product-info p {
        margin: 3px 0;
      }

      .circle {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: inline-block;
        vertical-align: middle;
        margin-top: 3px;
        margin-left: 3px;
      }

      .bi-color {
        height: 0px;
        width: 0px;
        border: 8px solid;
        border-radius: 50%;
        border-color: gold gold black black; 
        transform: rotate(45deg);
      }

      .page-break {
        page-break-after: always;
      }

      .blanc tr, .blanc td {
        border: 0;
        height: 20px;
      }

      .paginator {
        position: absolute;
        bottom: 90px;
      }

  </style>
</head>
<body>  
  @for ($i=0; $i < $products->count(); $i++)

    @if ($i === 0)
      <table cellspacing="0" class="client-info">
        <tr>
          <td class="td-left">
            <p>Cliente: <b>{{ $client->name }}</b></p>
            <p>CUIT: <b>{{ cuit($client->cuit) }}</b></p>
            <p>Teléfono: <b>{{ $client->phone }}</b></p>
          </td>
          <td class="td-right">
            <p>Dirección: <b>{{ $client->address }}</b></p>
            <p>Provincia: <b>{{ $client->state }}</b></p>
            <p>Código postal: <b>{{ $client->post_code }}</b></p>
            <p>Email: <b>{{ $client->email }}</b></p>
          </td>
          <td>
            <h1 style="text-align: center">Presupuesto Nº {{ str_pad($budget->id, 7, '0', STR_PAD_LEFT) }} <br> Fecha {{ format_date($budget->budget_date) }} </h1>
          </td>
        </tr>
      </table>
      @else
      <table cellspacing="0" class="client-info blanc">
        <tr>
          <td></td>
        </tr>
      </table>
    @endif
  <table class="paginator">
    <tr>
      <td>
        <p>Presupuesto Nº {{ str_pad($budget->id, 7, '0', STR_PAD_LEFT) }} - Fecha {{ format_date($budget->budget_date) }}</p>
      </td>
      <td>
      </td>
      <td>
        <p style="text-align: right">Página: {{ $i +1 . '/' .  $products->count() }}</p>
      </td>
    </tr>
  </table>
    <table cellspacing="0" class="products">
      <tr>
        <th style="text-align: center"><b>Producto</b></th>
        <th><b>Datos</b></th>
        <th><b>Descripción</b></th>
        <th><b>Cantidad</b></th>
        <th style="text-align: center"><b>Precio Unitario</b></th>
        <th><b>Sub-Total</b></th>
      </tr>

      @foreach ($products[$i] as $product)
        <tr>
          <td>
            <img src="{{ asset("storage/". $product->avatar. "")}}" alt="">
          </td>
          <td class="product-info">
            <h6><b>{{ $product->category->name }} {!! $product->sub_category != null ? '<br><small>'. $product->sub_category->name . '</small>' : '' !!}</b></h6>
            <h5><b>{{ $product->name }} {{ $product->pivot->height > 0 ? ' - ' .$product->pivot->height . ' cm' : '' }}</b></h5>
            <p>Color: <span class="circle {{ $product->pivot->color }}" style="background-color: {{ $product->pivot->color_hexa }} " ></span></p>
            <p>Soporte: <b>{{ $product->pivot->support }}</b></p>
          </td>
          <td class="product-description">
            <p>{{ cut_str(str_replace('º', ' grados', $product->description), 140) }}</p>
            <br>
            <p><b>Medidas:</b><br>
              @if ($product->pivot->height == 0)
                Alto: <b>{{ format_number($product->height, 2) }} cm</b> <br>
                {{ $product->depth > 0 ? 'Pisada:' : 'Diámetro:'  }} <b>{{ format_number($product->width, 2) }} cm</b>
                @if ($product->units == 'un')
                  <br> Ancho: <b>{{ format_number($product->depth, 2) }} cm</b>
                @endif
                @if ($product->resistence > 0)
                  <br>Resistencia Certificado INTI: <b>{{ format_number($product->resistence, 2) }} tn</b>                                    
                @endif
                @else
                @php
                  $m = $product->meassures->where('height', $product->pivot->height)->first();
                  if ($m == null) {
                    $m = $product;
                  }
                @endphp
                Alto: <b>{{ format_number($m->height, 2) }} cm</b> <br>
                {{ $m->depth > 0 ? 'Pisada:' : 'Diámetro:'  }} <b>{{ format_number($m->width, 2) }} cm</b>
                @if ($m->resistence > 0)
                  <br>Resistencia Certificado INTI: <b>{{ format_number($m->resistence, 2) }} tn</b>                                    
                @endif
              @endif
            </p>
          </td>
          <td class="product-amount"><b>{{ format_number($product->pivot->amount) }} {{ $product->pivot->unit }}</b></p></td>
          <td class="product-unit-price"><p>${{ format_number($product->pivot->unit_price, 2) }}</p></td>
          <td class="product-sub-total"><p><b>${{ format_number($product->pivot->amount * $product->pivot->unit_price, 2) }}</p></b></td>
        </tr>
      @endforeach
    </table>
    @if ($i < $products->count() -1)
      <div class="page-break"></div>
    @endif

  @endfor

  <table cellspacing="0" class="total-price">
    <tr>
      <td style="padding: 6px">
        {!! $budget->has_delivery == true ? '<p>Forma de envío: <br><b>Flete incluido</b></p>' : '<p>Forma de envío: <br><b>Con retiro en nuestro depósito (No incluye flete)</b></p>' !!}
      </td>
      <td style="padding: 6px">
        <p>Plazo de entrega: <br><b> {{ $budget->delivery_date }} </b></p>
      </td>
      <td style="padding: 6px">
        <p>Condición de pago: <br><b> {{ $budget->payment }} </b></p>
      </td>
      <td style="padding: 6px" class="total">
        <h4>
          {!! $budget->has_tax == true ? 'I.V.A (21%): <br> $' . format_number($budget->tax, 2) : 'I.V.A incluido' !!}
        </h4>
        <h3>
          {!! $budget->has_tax == true ? 'Sub-total: <br>$' . format_number($budget->total - $budget->tax, 2) : '' !!}
        </h3>
      </td>
    </tr>
    <tr>
      <td style="padding:6px; border-right: 1px solid black" colspan="3">
        <b>Observaciones:</b>
        <p>{{ !is_null($budget->observation) ? $budget->observation : '' }}</p>
      </td>
      <td class="total" colspan="1">
        <h2>
          Total: ${{ format_number($budget->total, 2) }}
        </h2>
      </td>
    </tr>
  </table>
</body>
</html>