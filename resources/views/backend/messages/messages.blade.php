@extends('backend.backend')

@section('title', "Inbox")

@section('sectionTitle', "Mensajes de clientes")

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Últimos mensajes<small></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					{{-- <p class="text-muted font-13 m-b-30">
						Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
					</p> --}}

					<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Consulta #</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Email</th>
								<th>Mensaje</th>
								<th>Presupuesto</th>
								<th>Fecha de contacto</th>
								{{-- <th>Salary</th>
								<th>Extn.</th>
								<th>E-mail</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach ($clients as $client)
								<tr>
									<td>{{ $client->id }}</td>
									<td>{{ $client->name }}</td>
									<td>{{ $client->phone }}</td>
									<td>{{ $client->email }}</td>
									<td>{{ $client->message }}</td>
									<td>
										@if ($client->budget)
											<a href="{{ url('backend/budget/'. $client->id)}}">ver</a>
										@endif
									</td>
									<td>{{ date('d-m-Y | g:i a', strtotime($client->created_at)) }}</td>
									{{-- <td>2011/04/25</td>
									<td>$320,800</td>
									<td>5421</td>
									<td>t.nixon@datatables.net</td> --}}
								</tr>
							@endforeach

						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>
@endsection
