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
          padding: 24px;
        }

        .client-info {
          position: fixed;
          top: 70px;
          left: 0;
          right: 0;
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
          width: 154px;
          padding-left: 6px;
        }

        .product-description {
          width: 264px;
          padding-left: 6px;
        }

        .product-unit-price {
          width: 74px;
          padding-left: 6px;
          padding-right: 6px;
          text-align: right !important;
        }

        .product-sub-total {
          width: 84px;
          padding-left: 6px;
          padding-right: 6px;
          text-align: right !important;
        }

        img {
          width: 114px;
          padding-left: 6px;
        }

        .products {
          position: fixed;
          top: 160px;
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
          line-height: 0.5;
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
        }

        .total h2 {
          margin-top: 3px;
          padding-top: 3px;
          vertical-align: middle;
          line-height: 1.2
        }

        .products tr th:last-child {
          text-align: right;
        }

        .product-info p {
          margin: 6px 0;
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

          /* background: linear-gradient( 90deg, gold, gold 49%, white 49%, white 51%, black 51% );  */

        .yellow {
          background: gold;
        }

        .black {
          background: black;
        }

        .orange {
          background: orange;
        }

        .white {
          background: white;
          border-color: 1px solid black;
        }

    </style>
</head>
<body>
  </div>
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
        <h1 style="text-align: center">Presupuesto Nº {{ $budget->id }} <br> Fecha {{ format_date($budget->budget_date) }} </h1>
        {{-- Campo modificable --}}
        {{-- Agregar ceros --}}
      </td>
    </tr>
  </table>

  <table cellspacing="0" class="products">
    <tr>
      <th style="text-align: center"><b>Producto</b></th>
      <th><b>Datos</b></th>
      <th><b>Descripción</b></th>
      <th style="text-align: center"><b>Precio Unitario</b></th>
      <th><b>Sub-Total</b></th>
    </tr>
    @foreach ($products as $product)
      <tr>
        <td>
          <img src="{{ asset("storage/". $product->avatar. "")}}" alt="">
        </td>
        <td class="product-info">
          <h6><b>{{ $product->category->name }} {!! $product->sub_category != null ? '<br><small>'. $product->sub_category->name . '</small>' : '' !!}</b></h6>
          <h5><b>{{ $product->name }}</b></h5>
          <p>Cantidad: <b>{{ format_number($product->pivot->amount) }} {{ $product->pivot->unit }}</b></p>
          <p>Color: <span class="circle {{ $product->pivot->color }}"></span></p>
          <p>Soporte: <b>{{ $product->pivot->support }}</b></p>
        </td>
        <td class="product-description"><p>{{ cut_str($product->description, 500) }}</p></td>
        <td class="product-unit-price"><p>${{ format_number($product->pivot->unit_price) }}</p></td>
        <td class="product-sub-total"><p><b>${{ format_number($product->pivot->amount * $product->pivot->unit_price) }}</p></b></td>
      </tr>
    @endforeach
    <tr>
      <td style="padding: 6px">
        {!! $budget->has_delivery == true ? '<p>Forma de envío: <br><b>Flete incluido</b></p>' : '<p>Forma de envío: <br><b>Con retiro en nuestro depósito (No incluye flete)</b></p>' !!}
      </td>
      <td style="padding: 6px">
        {!! !is_null($budget->delivery_date) ? '<p>Plazo de entrega: <br><b>' . $budget->delivery_date . '</b></p>' : '' !!}
      </td>
      <td style="padding: 6px">
        {!! !is_null($budget->payment) ? '<p>Condición de pago: <br><b>' . $budget->payment . '</b></p>' : '' !!}
      </td>
      <td colspan="2">
        <h4>
          {{ $budget->has_tax == true ? 'I.V.A (21%): $' . format_number($budget->tax, 2) : 'I.V.A incluido' }}
        </h4>
        <h3>
          {{ $budget->has_tax == true ? 'Sub-total: $' . format_number($budget->total - $budget->tax, 2) : '' }}
        </h3>
      </td>
    </tr>
    <tr>
      <td style="padding:6px; border-right: 1px solid black" colspan="2">
        <b>Observaciones:</b>
        <p>{{ !is_null($budget->observation) ? $budget->observation : '' }}</p>
      </td>
      <td class="total" colspan="3">
        <h2>
          Total: ${{ format_number($budget->total, 2) }}
        </h2>
      </td>
    </tr>
  </table>

<main>

</main>


</body>
</html>