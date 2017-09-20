@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
	<div class="">
		<div class="row">
			<section id="contacto">
				<div class="container fullW">
					<div class="row">
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-6 col-lg-offset-3 col-lg-6">
							<form id="contactForm" class="contacto" action="{{ route('contact') }}" method="post" autocomplete="off">
	              {{ csrf_field() }}
								<div id="form">
									<h2>Contactanos</h2>
									<h4>Solicitud de presupuesto</h4>
									<div class="exito">
	                  @if (session('message'))
	                    <h3>{{ session('message') . $clientId->id}}</h3>
	                  @endif
	                </div>
	                @if ($errors->any())
	                  @foreach ($errors->all() as $error)
	                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
	                      <strong>{{ $error }}</strong>
	                    </div>
	                  @endforeach
	                @endif
									<div class="form-group">
	                  <input type="text" class="form-control required" name="name" value="{{ old('name') }}" id="name" placeholder="nombre">
	                  <p class="help-block" id="nameError"></p>
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control required" name="email" value="{{ old('email') }}" id="email" placeholder="tu email">
	                  <p class="help-block" id="emailError"></p>
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control required" name="phone" value="{{ old('phone') }}" id="phone" placeholder="teléfono de contacto">
	                  <p class="help-block" id="phoneError"></p>
	                </div>
								</div>
								<div class="productsSelect">
	                <p>Si está interesado en un producto en específico<br>indiquelo a continuación</p>
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label>Producto</label>
	                    <select class="producto" name="product_id[]">
	                      <option value="">seleccione un producto</option>
	                      @foreach ($products as $product)
	                        <option value="{{ $product->id }}">{{ $product->name }}</option>
	                      @endforeach
	                    </select>
	                  </div>
	                </div>
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label>Cantidad</label>
	                    <input type="text" class="cantidad" name="amount[]" value="" placeholder="cantidad">
	                  </div>
	                </div>
	                <div id="campo01">
										<div class="col-sm-6">
		                  <div class="form-group">
		                    <label>Producto</label>
		                    <select class="producto" name="product_id[]">
		                      <option value="">seleccione un producto</option>
		                      @foreach ($products as $product)
		                        <option value="{{ $product->id }}">{{ $product->name }}</option>
		                      @endforeach
		                    </select>
		                  </div>
		                </div>
		                <div class="col-sm-6">
		                  <div class="form-group">
		                    <label>Cantidad</label>
		                    <input type="text" class="cantidad" name="amount[]" value="" placeholder="cantidad">
		                  </div>
		                </div>
	                </div>
	              </div>

								<div class="form-group">
	                <input type="text" class="form-control required" name="message" value="{{ old('message') }}" id="message" placeholder="tu mensaje">
	                <p class="help-block" id="messageError"></p>
	              </div>

								<div class="form-group check">
									<span>Suscribirse al newsletter</span>
									<input type="checkbox" name="newsletter" value="1">
								</div>
								<div class="form-group botonera">
									<button type="button" name="button" id="enviar">Enviar</button>
									<!-- <button type="button" name="presupuesto" class="btnBudget" id="next">Solicitar presupuesto</button> -->
								</div>
								<div class="form-group">
									<p class="help-block" id="contactError"></p>
								</div>
								<div class="form-group">
									<p class="help-block" id="nfError"></p>
								</div>

							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
{{-- <div class="container-fluid">
  <div class="row">
    <section id="contacto">
      <div class="container fullW">
        <div class="row">
          <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
            <form id="contactForm" class="contacto" action="{{ route('contact') }}" method="post" autocomplete="off">
              {{ csrf_field() }}
              <div id="form">
                <h2>Contactanos</h2>
                <h4>Solicitud de presupuesto</h4>
                <div class="exito">
                  @if (session('message'))
                    <h3>{{ session('message') . $clientId->id}}</h3>
                  @endif
                </div>
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <strong>{{ $error }}</strong>
                    </div>
                  @endforeach
                @endif
                <div class="form-group">
                  <input type="text" class="form-control required" name="name" value="{{ old('name') }}" id="name" placeholder="nombre">
                  <p class="help-block" id="nameError"></p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control required" name="email" value="{{ old('email') }}" id="email" placeholder="tu email">
                  <p class="help-block" id="emailError"></p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control required" name="phone" value="{{ old('phone') }}" id="phone" placeholder="teléfono de contacto">
                  <p class="help-block" id="phoneError"></p>
                </div>
              </div>
              <div class="productsSelect">
                <p>Si está interesado en un producto en específico<br>indiquelo a continuación</p>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Producto</label>
                    <select class="producto" name="product_id">
                      <option value="">seleccione un producto</option>
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="cantidad" name="amount" value="" placeholder="cantidad">
                  </div>
                </div>
                <div id="agregarMas">

                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control required" name="message" value="{{ old('message') }}" id="message" placeholder="tu mensaje">
                <p class="help-block" id="messageError"></p>
              </div>

              <div class="form-group check">
                <span>Suscribirse al newsletter</span>
                <input type="checkbox" name="newsletter" value="1">
              </div>
              <div class="form-group botonera">
                <button type="button" name="button" id="enviar">Enviar</button>
                <!-- <button type="button" name="presupuesto" class="btnBudget" id="next">Solicitar presupuesto</button> -->
              </div>
              <div class="form-group">
                <p class="help-block" id="contactError"></p>
              </div>
              <div class="form-group">
                <p class="help-block" id="nfError"></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div> --}}
@endsection
