<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jordan Plas | Backend</title>

    @include('backend.links')
  </head>
  <body class="login">
    <div class="login_wrapper">
      <div class="animate form">
        <section class="login_content">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
            <h1>Crea una cuenta</h1>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" name="name" placeholder="nombre" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Registrarse
                    </button>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">¿Ya tenés una cuenta?
                <a href={{ route('login') }} class="to_register"> Iniciá sesion </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1>Jordan Plas</h1>
                <p>Jordan Plas backend - diseño y desarrollo <a href="https://www.loveinbrands.com">Loveinbrands</a></p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </body>
</html>
