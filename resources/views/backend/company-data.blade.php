@extends('backend.backend')

@section('title', "Datos generales")

@section('sectionTitle', "Datos generales de la empresa")

@section('content')
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-bars"></i> Jordan Plas <small>Datos de la empresa</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				@if (!empty($data))
					<div class="col-xs-3">
						<!-- required for floating -->
						<!-- Nav tabs -->
						<ul class="nav nav-tabs tabs-left">
							<li class="active"><a href="#description" data-toggle="tab">Descripción</a>
							</li>
							<li><a href="#phones" data-toggle="tab">Teléfonos</a>
							</li>
							<li><a href="#mail" data-toggle="tab">Mail</a>
							</li>
							<li><a href="#address" data-toggle="tab">Dirección</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-9">
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="description">
								<p class="lead">Descripción</p>
								<p>{!! $data->description !!}</p>
							</div>
							<div class="tab-pane" id="phones">
								<p class="lead">Teléfonos</p>
								<p><strong>Teléfono: </strong>{{ $data->phone }}</p>
								<p><strong>Fax: </strong>{{ $data->fax }}</p>
								<p><strong>Celular: </strong>{{ $data->celular }}</p>
							</div>
							<div class="tab-pane" id="mail">
								<p class="lead">Mail</p>
								<p><strong>Mail: </strong>{{ $data->email }}</p>
							</div>
							<div class="tab-pane" id="address">
								<p class="lead">Dirección</p>
								<p><strong>Dirección: </strong>{{ $data->address }}</p>
							</div>
						</div>
					</div>
					@else
						<div class="x_title">
							<h2>Aún no existe ningún dato</h2>
							<div class="clearfix"></div>
						</div>
				@endif


				<div class="clearfix"></div>

			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Datos generales del sitio</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<strong>{{ $error }}</strong>
						</div>
					@endforeach
				@endif
			</div>
			<div class="row">
		    <div class="col-sm-12">
		      @if (session('message'))
		        <div class="alert alert-success alert-dismissible fade in" role="alert">
		          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		          </button>
		          <strong>{{ session('message') }}</strong>
		        </div>
		      @endif
		    </div>
		  </div>

			<div class="x_content">
				<br />
				@if ($data !== null)
					<form class="form-horizontal form-label-left" action="{{ route('company.create') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Descripción empresa</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea name="description" value="{{ $data->description }}" class="resizable_textarea form-control" placeholder="{{ $data->description }}" style="min-height:250px"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Teléfono</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Celular</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="celular" value="{{ $data->celular }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Celular 02</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="fax" value="{{ $data->fax }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="email" value="{{ $data->email }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Dirección</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="address" value="{{ $data->address }}">
							</div>
						</div>
						<input type="text" name="id" value="{{ $data->id }}" style="display:none;">
						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-3">
								<a href="backend/backendHome" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<form class="" action="{{ route('company.update')}}" method="post">
								{{ csrf_field() }}
								{{ method_field('PUT')}}
								<input type="submit" class="btn btn-primary" value="editar">
								<input type="text" name="id" value="{{ $data->id }}" style="display:none;">
							</form>
						</div>
					</div>
					@else
						<form class="form-horizontal form-label-left" action="{{ route('company.create') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Descripción empresa</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="description" value="{{ old('description') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Teléfono</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Fax</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="fax" value="{{ old('fax') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Celular</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="celular" value="{{ old('celular') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Dirección</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="address" value="{{ old('address') }}">
								</div>
							</div>
							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<a href="backend/backendHome" class="btn btn-danger">Cancel</a>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
				@endif
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ingresar / Editar nuevo servicio</h2><br><br>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="x_content">
					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<strong>{{ $error }}</strong>
							</div>
						@endforeach
					@endif
					@if (session('messageService'))
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<strong>{{ session('messageService') }}</strong>
						</div>
					@endif
				</div>
				<br />
				<div class="row">
					<form class="form-horizontal form-label-left" action="{{ route('service.store') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="control-label col-md-2">Nuevo servicio</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Descripción</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Descripción">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-10 col-sm-2">
								<button type="submit" class="btn btn-success">Guardar</button>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
					</form>
				</div>
					@foreach ($services as $service)
						<div class="row">
							<div class="col-sm-12">
								<form class="" action="{{ route('service.update', $service ) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('PUT')}}
										<div class="form-group">
											<label class="control-label col-md-2">Reemplazar el nombre acá:</label>
											<div class="col-md-10">
												<input type="text" name="id" value="{{ $service->id }}" style="display:none;">
												<input type="text" class="form-control" value="{{ $service->name }}" name="name">
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-group">
											<label class="control-label col-md-2">Reemplazar la descripción acá:</label>
											<div class="col-md-10">
												<input type="text" class="form-control" value="{{ $service->description }}" name="description">
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-group">
											<div class="col-sm-offset-10">
												<input type="submit" name="" value="Editar" class="btn btn-success">
											</div>
										</div>
								</form>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-offset-10 col-sm-2">
								<form class="" action="{{ route('service.destroy', $service) }}" method="post">
									{{ method_field('DELETE')}}
									{{ csrf_field() }}
									<input type="text" name="id" value="{{ $service->id }}" style="display:none;">
									<input type="submit" name="" value="Eliminar" class="btn btn-danger">
								</form>
							</div>
						</div>
						<div class="separador"></div>
					@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ingresar nueva imagen de proyecto</h2><br><br>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="x_content">
					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<strong>{{ $error }}</strong>
							</div>
						@endforeach
					@endif
					@if (session('Projectmessage'))
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<strong>{{ session('Projectmessage') }}</strong>
						</div>
					@endif
				</div>
				<br />
				<div class="row">
					<form class="form-horizontal form-label-left" action="{{ route('project.create') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="control-label col-md-2">Nombre proyecto</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Cargar imagen (Proporción recomendada 16:9)</label>
							<div class="col-md-10">
								<input type="file" class="form-control" name="url" value="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-10 col-sm-2">
								<button type="submit" class="btn btn-success">Guardar</button>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
					</form>
				</div>
				@if (isset($projects))
					@foreach ($projects as $project)
						<div class="row">
							<div class="col-sm-6">
								@if (substr($project->url, -3, 3) == "mp4")
									<div class="col-sm-3">
										<video src="{{ Storage::url( $project->url ) }}" autoplay loop style="width:150px"></video>
										<figcaption>{{ $project->name }}</figcaption>
									</div>
									@else
										<img src={{ Storage::url( $project->url ) }} alt="{{ $project->name }}" style="width:150px"></a>
										<figcaption>{{ $project->name }}</figcaption>
								@endif
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-offset-10 col-sm-2">
								<form class="" action="{{ route('project.destroy', $project) }}" method="post">
									{{ method_field('DELETE')}}
									{{ csrf_field() }}
									<input type="text" name="id" value="{{ $project->id }}" style="display:none;">
									<input type="submit" name="" value="Eliminar" class="btn btn-danger">
								</form>
							</div>
						</div>
						<div class="separador"></div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
