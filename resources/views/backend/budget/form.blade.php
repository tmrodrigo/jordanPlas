<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jordan-Plas | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.gif" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto+Mono&display=swap" rel="stylesheet">
    <style>
      body {
        background-color: #f4f4f4;
      }

      label, legend {
        font-size: 1rem;
      }

      p {
        margin: 0
      }

      h4 {
        font-size: 1.2rem
      }

      h2 {
        font-size: 1.5rem
      }

      .card {
        border-radius: 8px;
        border: none;
        box-shadow: 0px 0px 25px -10px rgba(0,0,0,0.4);;
      }

      .circle {
          width: 16px;
          height: 16px;
          border-radius: 50%;
          display: inline-block;
          vertical-align: middle;
        }

        .bi-color {
          background: linear-gradient( 90deg, gold, gold 49%, white 49%, white 51%, black 51% ); 
        }

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
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top|fixed-bottom|sticky-top">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{ asset('logos/logo-vert.svg') }}" alt="Logo Jordan Plas">
          </a>
          <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="m-2"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2>Nuevo presupuesto</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  <strong>{{ $error }}</strong>
                </div>
              @endforeach
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Datos del presupuesto</h3>
            </div>
            <form class="mb-4" role="form" method="POST" action="{{ route('add_client_info') }}">
              @csrf
              <div class="row">
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="client_input">Cliente *</label>
                  <input id="client_input" class="form-control" type="text" name="name" value="{{ isset($client_data['name']) ?  $client_data['name'] : '' }}" required>
                </div>
                <div class="form-group col-12 col-sm-2 mb-2">
                  <label for="cuit_input">CUIT</label>
                  <input id="cuit_input" class="form-control" type="text" name="cuit" value="{{ isset($client_data['cuit']) ? cuit($client_data['cuit']) : '' }}">
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="address_input">Domicilio</label>
                  <input id="address_input" class="form-control" type="text" name="address" value="{{ isset($client_data['address']) ?  $client_data['address'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-2 mb-2">
                  <label for="post_code_input">Código Postal</label>
                  <input id="post_code_input" class="form-control" type="text" name="post_code" value="{{ isset($client_data['post_code']) ?  $client_data['post_code'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-2 mb-2">
                  <label for="state_input">Provincia</label>
                  <input id="state_input" class="form-control" type="text" name="state" value="{{ isset($client_data['state']) ?  $client_data['state'] : '' }}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="phone_input">Teléfono</label>
                  <input id="phone_input" class="form-control" type="text" name="phone" value="{{ isset($client_data['phone']) ?  $client_data['phone'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="email_input">Email</label>
                  <input id="email_input" class="form-control" type="email" name="email" value="{{ isset($client_data['email']) ?  $client_data['email'] : '' }}">
                </div>

                <div class="form-group col-12 col-sm-3 mb-2">
                  <legend>Condición impositiva</legend>
                  <div class="form-check form-check-inline">
                    <input id="iva_radio" class="form-check-input" type="radio" value="1" name="tax" {{ isset($client_data['tax']) && $client_data['tax'] == true ?  'checked' : 'checked' }}> 
                    <label for="iva_radio" class="form-check-label">Más IVA</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="final_radio" class="form-check-input" type="radio" value="0" name="tax" {{ isset($client_data['tax']) && $client_data['tax'] == false ?  'checked' : '' }}> 
                    <label for="final_radio" class="form-check-label">Final (IVA incluido)</label>
                  </div>
                </div>

                <div class="form-group col-12 col-sm-3 mb-2">
                  <legend>¿Incluye flete?</legend> 
                  <div class="form-check form-check-inline">
                    <input id="delivery_true" class="form-check-input" type="radio" value="1" name="delivery" {{ isset($client_data['delivery']) && $client_data['delivery'] == true ?  'checked' : 'checked' }}> 
                    <label for="delivery_true" class="form-check-label">No</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="delivery_false" class="form-check-input" type="radio" value="0" name="delivery" {{ isset($client_data['delivery']) && $client_data['delivery'] == false ?  'checked' : '' }}> 
                    <label for="delivery_false" class="form-check-label">Si</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="observations_input">Observaciones</label>
                  <input id="observations_input" class="form-control" type="text" name="observations" value="{{ isset($client_data['observations']) ?  $client_data['observations'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="delivery_date_input">Plazo de entrega</label>
                  <input id="delivery_date_input" class="form-control" type="text" name="delivery_date" value="{{ isset($client_data['delivery_date']) ?  $client_data['delivery_date'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="payment_input">Condición de pago</label>
                  <input id="payment_input" class="form-control" type="text" name="payment" value="{{ isset($client_data['payment']) ?  $client_data['payment'] : '' }}">
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="budget_date_input">Fecha del presupuesto *</label>
                  <input id="budget_date_input" class="form-control" type="date" name="budget_date" value="{{ isset($client_data['budget_date']) ?  $client_data['budget_date'] : '' }}" required>
                </div>
              </div>
              <button class="btn btn-outline-primary" type="submit">{{ isset($client_data['client_name']) ?  'Actualizar datos cliente' : 'Guardar datos cliente' }}</button>
            </form>
          </div>
        </div>
        <div class="m-4"></div>
        <div class="card" id="add_product">
          <div class="card-body">
            <div class="card-title">
              <h3>Agregar producto</h3>
            </div>
            <form class="mb-4" id="product-form" role="form" method="POST" action="{{ route('get_budget_info') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="category" >Rubro</label>
                  <select id="category" class="form-control" name="category_id">
                    @forelse ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == $selected_category ? 'selected' : '' }}>{{ $category->name }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="product">Producto</label>
                  <select id="product" class="form-control" name="product_id">
                    @forelse ($products as $product)
                      <option value="{{ $product->id }}" {{ $s_product == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <label for="color_input">Color</label>
                  <select id="color_input" class="form-control" name="color">
                    @forelse ($colors as $color)
                      <option value="{{ $color['value'] }}" {{ $s_color == $color['value'] ? 'selected' : '' }}>{{ translate($color['value']) }}</option>
                    @empty
                      
                    @endforelse
                  </select>
                </div>
                <div class="form-group col-12 col-sm-3 mb-2">
                  <legend>Fijación</legend>
                  <div class="form-check form-check-inline">
                    <input id="support_true" class="form-check-input" type="radio" value="1" name="support" checked> 
                    <label for="support_true" class="form-check-label">Mecánica</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="support_false" class="form-check-input" type="radio" value="0" name="support"> 
                    <label for="support_false" class="form-check-label">Pegamento</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="support_false" class="form-check-input" type="radio" value="na" name="support"> 
                    <label for="support_false" class="form-check-label">No incluida</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12 col-sm-4 mb-2">
                  <label for="amount">Cantidad</label>
                  <input id="amount" type="text" class="form-control" name="amount" value="{{ $amount > 0 ? $amount : '' }}">
                </div>

                <div class="form-group col-12 col-sm-4 mb-2">
                  <legend>Medida</legend>
                  <div class="form-check form-check-inline">
                    <input id="measure_true" class="form-check-input" type="radio" value="1" name="measure" checked> 
                    <label for="measure_true" class="form-check-label">Metro lineal</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="measure_false" class="form-check-input" type="radio" value="0" name="measure"> 
                    <label for="measure_false" class="form-check-label">Unidad</label>
                  </div>
                </div>

                <div class="form-group col-12 col-sm-4 mb-2">
                  <label for="unit_price">Precio unitario</label>
                  <input id="unit_price" type="text" class="form-control" name="unit_price" value="{{ $unit_price > 0 ? $unit_price : '' }}">
                </div>

              </div>
              <div class="row">
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-outline-primary">Agregar producto</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="m-4"></div>
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h3>Productos seleccionados</h3>
            </div>
            <div class="row d-none d-sm-flex">
              <div class="col-sm-2">
                Imagen
              </div>
              <div class="col-sm-2">
                Datos
              </div>
              <div class="col-sm-6">
                Descripción
              </div>
              <div class="col-sm-1">
                Precio unitario
              </div>
              <div class="col-sm-1">
                Sub Total
              </div>
            </div>
            @forelse ($selected_products as $k => $s_product)
              <div class="row">
                <div class="col-sm-2 d-none d-sm-block">
                  <img style="max-width: 100%" src="{{ asset("storage/". $s_product['avatar']. "")}}" alt="">
                </div>
                <div class="col-sm-2">
                  <h6>{{ $s_product['category_name'] }} {!! $s_product['sub_category_name'] != null ? '<br><small>'.$s_product['sub_category_name'] . '</small>' : '' !!} </h6>
                  <h5><b>{{ $s_product['name'] }}</b></h5>
                  <a href="{{ route('remove_item', ['key' => $k]) }}">Eliminar</a>
                  <p>Cantidad: <b>{{ $s_product['amount'] }} {{ $s_product['measure'] }}</b></p>
                  <p>Color: <span class="circle {{ $s_product['color'] }}"></span></p>
                  <p>Soporte: <b>{{ $s_product['support'] }}</b></p>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                  <p>{{ cut_str($s_product['description'], 500) }}</p>
                </div>
                <div class="col-6 col-sm-1">
                  <p class="d-sm-none">Precio unitario</p>
                  <h4>{{ format_number($s_product['unit_price']) }}</h4>
                </div>
                <div class="col-6 col-sm-1">
                  <p class="d-sm-none">Total</p>
                  <h4>${{ format_number($s_product['sub_total']) }}</h4>
                </div>
              </div>
              <hr>
            @empty
              <div class="row">
                <div class="col-sm-12">
                  <h3>Para crear un presupuesto debes agregar un producto</h3>
                </div>
              </div>
            @endforelse
            <div class="row justify-content-end">
              <div class="col-sm-3 text-end">
                <h4>{{ $iva > 0 ? 'I.V.A (21%): $' . format_number($iva, 2) : 'I.V.A Incluido' }}</h4>
                {!! $iva > 0 ? '<h4> Sub-total: $' .  format_number($total - $iva, 2)  . '</h4>' : '' !!}
                <h2>Total: ${{ format_number($total, 2) }}</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="m-4"></div>
        <div>
          <form action="{{ route('create_budget') }}" method="POST" role="form">
            @csrf
            <button type="submit" class="btn btn-primary" {{ count($selected_products) == 0 || !isset($client_data['name']) ? 'disabled' : '' }}>Crear presupuesto</button>
          </form>
        </div>
        <div class="m-4"></div>
      </div>
    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('#category').on('change', function(){
          $('#product-form').submit()
        })

        $('#product').on('change', function(){
          $('#product-form').submit()
        })
      })
    </script>
  </body>
</html>
