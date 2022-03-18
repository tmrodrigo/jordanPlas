@extends('backend.budget.base')

@section('styles')
  <style>
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
@endsection

@section('content')
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
                <label for="delivery_true" class="form-check-label">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input id="delivery_false" class="form-check-input" type="radio" value="0" name="delivery" {{ isset($client_data['delivery']) && $client_data['delivery'] == false ?  'checked' : '' }}> 
                <label for="delivery_false" class="form-check-label">No</label>
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
                  <option value="{{ $product->id }}-0" {{ $s_product == $product->id ? 'selected' : '' }}>{{ strtoupper($product->name) }} {{ $product->meassures->count() > 0 ? ' - ' . $product->height . ' cms' : '' }}</option>
                  @forelse ($product->meassures as $m)
                    <option value="{{ $product->id }}-{{ $m->height }}" {{ $s_product . '-' . $product_meassure == $product->id . '-' . $m->height  ? 'selected' : '' }}>{{ strtoupper($product->name) }} - {{ $m->height . ' cms' }}</option>
                  @empty
                    
                  @endforelse
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
                <input id="support_true" class="form-check-input" type="radio" value="m" name="support" checked> 
                <label for="support_true" class="form-check-label">Mecánica</label>
              </div>
              <div class="form-check form-check-inline">
                <input id="support_false" class="form-check-input" type="radio" value="p" name="support"> 
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
                <input id="meassure_true" class="form-check-input" type="radio" value="1" name="meassure" checked> 
                <label for="meassure_true" class="form-check-label">Metro lineal</label>
              </div>
              <div class="form-check form-check-inline">
                <input id="meassure_false" class="form-check-input" type="radio" value="0" name="meassure"> 
                <label for="meassure_false" class="form-check-label">Unidad</label>
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
            <div class="modal fade" id="edit{{ $k }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar {{ $s_product['name'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('edit_item', ['id' => $k ]) }}">
                    <div class="modal-body">
                      <div class="form-group mb-2">
                        <label for="amount_input_{{ $k }}">Cantidad</label>
                        <input id="amount_input_{{ $k }}" class="form-control" type="text" value="{{ $s_product['amount'] }}" name="amount">
                      </div>
                      <div class="form-group mb-2">
                        <label for="unit_price_input_{{ $k }}">Precio unitario</label>
                        <input id="unit_price_input_{{ $k }}" class="form-control" type="text" value="{{ $s_product['unit_price'] }}" name="unit_price">
                      </div>
                      <div class="form-group mb-2">
                        <label for="color_input_{{ $k }}">Color</label>
                        <select id="color_input_{{ $k }}" class="form-control" name="color">
                          @forelse ($s_product['colors'] as $color)
                            <option value="{{ $color['value'] }}" {{ $s_product['color'] == $color['value'] ? 'selected' : '' }}>{{ translate($color['value']) }}</option>
                          @empty
                            
                          @endforelse
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <legend>Medida {{ $s_product['meassure'] }}</legend>
                        <div class="form-check form-check-inline">
                          <input id="edit_meassure_true_{{ $k }}" class="form-check-input" type="radio" value="1" name="meassure" {{ $s_product['meassure'] !== 'Unidades' ? 'checked' : '' }}> 
                          <label for="edit_meassure_true_{{ $k }}" class="form-check-label">Metro lineal</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input id="edit_meassure_false_{{ $k }}" class="form-check-input" type="radio" value="0" name="meassure" {{ $s_product['meassure'] === 'Unidades' ? 'checked' : '' }}> 
                          <label for="edit_meassure_false_{{ $k }}" class="form-check-label">Unidad</label>
                        </div>
                      </div>
                      <div class="form-group mb-2">
                        <legend>Fijación {{ $s_product['support'] }}</legend>
                        <div class="form-check form-check-inline">
                          <input id="support_true_{{ $k }}" class="form-check-input" type="radio" value="m" name="support" {{ $s_product['support'] === 'Fijación mecánica' ? 'checked' : '' }}> 
                          <label for="support_true" class="form-check-label">Mecánica</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input id="support_false_{{ $k }}" class="form-check-input" type="radio" value="p" name="support" {{ $s_product['support'] === 'Pegamento' ? 'checked' : '' }}> 
                          <label for="support_false_{{ $k }}" class="form-check-label">Pegamento</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input id="support_na_{{ $k }}" class="form-check-input" type="radio" value="na" name="support" {{ $s_product['support'] === 'No incluida' ? 'checked' : '' }}> 
                          <label for="support_na_{{ $k }}" class="form-check-label">No incluida</label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>  
          <div class="row">
            <div class="col-sm-2 d-none d-sm-block">
              <img style="max-width: 100%" src="{{ asset("storage/". $s_product['avatar']. "")}}" alt="">
            </div>
            <div class="col-sm-2">
              <h6>{{ $s_product['category_name'] }} {!! $s_product['sub_category_name'] != null ? '<br><small>'.$s_product['sub_category_name'] . '</small>' : '' !!} </h6>
              <h5><b>{{ $s_product['name'] }} {{ $s_product['product_meassure'] > 0 ? ' - ' . $s_product['product_meassure'] . ' cm' : ''}}</b></h5>
              <p>Cantidad: <b>{{ $s_product['amount'] }} {{ $s_product['meassure'] }}</b></p>
              <p>Color: <span class="circle {{ $s_product['color_hexa'] }}" style="background-color: {{ $s_product['color_hexa'] }}"></span></p>
              <p>Soporte: <b>{{ $s_product['support'] }}</b></p>
              <button type="button" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#edit{{ $k }}">Editar</button>
              <a class="btn btn-danger" href="{{ route('remove_item', ['key' => $k]) }}">Eliminar</a>
            </div>             
            <div class="col-sm-6 d-none d-sm-block">
              <p>{{ cut_str($s_product['description'], 500) }}</p>
            </div>
            <div class="col-6 col-sm-1">
              <p class="d-sm-none">Precio unitario</p>
              <h4>{{ format_number($s_product['unit_price'],2) }}</h4>
            </div>
            <div class="col-6 col-sm-1">
              <p class="d-sm-none">Total</p>
              <h4>${{ format_number($s_product['sub_total'],2) }}</h4>
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
@endsection

@section('scripts')
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
  @if (Session::has('budget'))
    <button style="display: none" id="getBudget" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¡Listo!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Presupuesto generado con éxito
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="window.open('{{ Session::get('budget') }}')">Descargar presupuesto</button>
          </div>
        </div>
      </div>
    </div>



    <script>
      $(document).ready(function(){
        $('#getBudget').click()
      })
    </script>
  @endif
@endsection
