@extends('backend.backend')

@section('title', "Presupuestos")


@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Solicitud de presupuesto</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<section class="content invoice">
						<!-- title row -->
						<div class="row">
							<div class="col-xs-12 invoice-header">
								<h1>
									<i class="fa fa-globe"></i> Presupuesto N° <strong>{{ $client->id }}</strong>
									<small class="pull-right">Fecha: {{ date('d-m-Y', strtotime($client->created_at)) }}</small>
								</h1>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								De:
								<address>
																<strong>{{ $client->name }}</strong>
																<br>Teléfono: {{ $client->phone }}
																<br>Email: {{ $client->email }}
														</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								{{-- Pa
								<address>
																<strong>John Doe</strong>
																<br>795 Freedom Ave, Suite 600
																<br>New York, CA 94107
																<br>Phone: 1 (804) 123-9876
																<br>Email: jon@ironadmin.com
														</address> --}}
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								{{-- <b>Invoice #007612</b>
								<br>
								<br>
								<b>Order ID:</b> 4F3S8J
								<br>
								<b>Payment Due:</b> 2/22/2014
								<br>
								<b>Account:</b> 968-34567 --}}
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-xs-12 table">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Cantidad</th>
											<th>Producto</th>
											<th style="width: 59%">Descripción</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($bProducts as $product)
											<tr>
												<td>{{ $product->amount }}</td>
												<td>{{ $product->product->name }}</td>
												<td> <input type="text" name="" value="" style="border:0" placeholder="agregar descripción">
												</td>
												<td>$ <input class="value" type="text" name="price" value="" style="border:0;" placeholder="00"></td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-xs-6">
								<p class="lead">Mensaje:</p>
								<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
									{{ $client->message }}
								</p>
								<p class="lead">Observaciones:</p>
								<input class="text-muted well well-sm no-shadow" type="text" placeholder="Escribir observaciones acá" style="border-radius:3px;width:100%;height:60px;">
							</div>
							<!-- /.col -->
							<div class="col-xs-6">
								<p class="lead">Presupuesto válido hasta: <input type="text" name="" value="" style="border:0;" placeholder="dd/mm/aaaa"></p>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<th style="width:50%">Subtotal:</th>
												<td id="subtotal"></td>
											</tr>
											<tr>
												<th>I.V.A %</th>
												<td>$ <input type="text" name="" value="" style="border:0;" placeholder="00"></td>
											</tr>
											<tr>
												<th>Envío:</th>
												<td>$ <input type="text" name="" value="" style="border:0;" placeholder="00"></td>
											</tr>
											<tr>
												<th>Total:</th>
												<td id="total"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-xs-12">
								<button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Imprimir / Generar PDF</button>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		var precio = $('.value')
		var sum = []
		precio.each(function(){
			$(this).on('blur', function(){
				sum.push(parseInt($(this).val()))
				$('#total').empty()
				$('#total').append(sum.reduce(add))
			})
		})
		function add(a, b) {
    return a + b;
		}
	})
	</script>
@endsection
