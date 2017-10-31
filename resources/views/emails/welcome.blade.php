<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.gif" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Raleway:400,700" rel="stylesheet">
    <style>
    body{color:#505050}body a{color:#505050;text-decoration:underline}body a:hover{color:#5BAC29}body h2{font-size:18px;text-transform:uppercase}body h3{font-size:18px}.cabezal{background-color:rgba(80,80,80,0.2);padding:16px;border-radius:12px 12px 0 0;margin-top:25px;border:2px solid #505050;border-bottom:0}.cabezal h1,.cabezal a{color:#505050}.cabezal a{text-decoration:none}.cabezal a:hover{color:#99121d}.cabezal .datos{display:flex;flex-flow:column;align-items:center}.cabezal .datos img{height:80px;margin-left:40px}.cabezal .datos h1{font-size:24px;line-height:0}@media only screen and (min-width: 768px){.cabezal .datos h1{text-align:center;margin-top:18px}}.cabezal .datosMail{font-size:18px;color:#99121d;margin:24px 0}.cabezal .datosMail a{color:#99121d}@media only screen and (min-width: 768px){.cabezal .datosMail{margin:24px 18px}}.cabezal p{color:#505050;font-size:12px;line-height:16px;text-align:center}@media only screen and (min-width: 768px){.cabezal p{margin-top:24px;text-align:right}}.cabezal .head{background-color:white;margin-top:-16px;border-radius:12px 12px 0 0}.mensaje{background-color:white !important;border-radius:0 0 12px 12px;padding:8px 16px;border:2px solid #505050;border-top:0;background-color:#C8C8C8}.mensaje h2,.mensaje h3{border-bottom:1px solid #505050;padding-bottom:8px}@media only screen and (min-width: 768px){.mensaje h2,.mensaje h3{margin:18px 18px 24px 18px}}.mensaje p{font-size:16px;line-height:24px}@media only screen and (min-width: 768px){.mensaje p{margin:18px 18px 24px 18px}}
    </style>
  </head>
  <body>
    <main>
    	<div class="container-fluid">
    		<div class="row">
    		  <div class="col-sm-12 col-lg-6">
            <div class="cabezal">
              <div class="row head">
                <div class="col-sm-3 col-xs-12">
                  <div class="datos">
                    <h1><img src="{{ $message->embed(public_path() . '/storage/assets/logo.svg') }}" / alt="Jordan Plas"></h1>
                  </div>
                </div>
                <div class="col-sm-9 col-sm-offset-0 col-xs-offset-1 col-xs-10">
                  <p><a href="http://www.jordanplas.com">jordanplas.com</a><br /><a href="tel:+541142419726">TEL: +5411 4241 9726</a><br><a href="tel:+5491167891320">TEL: +54911 6789 1320</a><br><a href="tel:+5491133602561">TEL: +54911 3360 2561</a><br><a href="mailto:cotizaciones@jordan-plas.com.ar">cotizaciones@jordan-plas.com.ar</a></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-7">
                  <div class="datosMail">
                    <strong>Fecha:</strong> {{ $client->date }}<br />
                    <strong>Solicitud de presupuesto: # {{ $id }}</strong><br>
                    <strong>Cliente: </strong> {{ $client->name }}<br>
                    <strong>Teléfono: </strong><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a><br>
                    <strong>Email: </strong><a href="mailto:{{ $client->email }}">{{ $client->email }}</a><br>
                  </div>
                </div>
              </div>
            </div>
    		  </div>
    		</div>
				<div class="row">
				  <div class="col-sm-12 col-lg-6">
            <div class="mensaje">
              @if (count($bProducts) > 0)
              <h2>Detalle solicitado</h2>
                @foreach ($bProducts as $product)
                  <p>
                    <strong>Producto: </strong> {{ $product->product->name }}<br>
                    <strong>Cantidad: </strong> {{ $product->amount }}
                  </p>
                @endforeach
              @endif
              <h2>Comentario</h2>
              <p>
                <strong>{{ $client->message }}</strong>
              </p>
            </div>
				  </div>
				</div>
    	</div>
    </main>
  </body>
</html>
