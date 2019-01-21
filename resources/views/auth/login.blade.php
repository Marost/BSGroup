<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Administrador</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
	</script>
	<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/admin-login.css" rel="stylesheet">
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(/assets/app/media/img//bg/bg-2.jpg);">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#"><img src="/assets/admin-logo.png"></a>
				</div>
				<div class="m-login__signin">
					<div class="m-login__head">
						<h3 class="m-login__title">Iniciar sesión en Administrador</h3>
					</div>

					{!! Form::open(['url' => '/login', 'method' => 'post', 'class' => 'm-login__form m-form']) !!}
						@include('flash::message')

						@if(count($errors) > 0)
							<div class="alert alert-danger">
								<button class="close" data-close="alert"></button>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="form-group m-form__group">
							{!! Form::email('email', null, ['autocomplete' => 'off', 'class' => 'form-control m-input', 'placeholder' => 'Email']) !!}
						</div>
						<div class="form-group m-form__group">
							{!! Form::password('password', ['autocomplete' => 'off', 'class' => 'form-control m-input m-login__form-input--last', 'placeholder' => 'Contraseña']) !!}
						</div>
						<div class="row m-login__form-sub">
							<div class="col m--align-right m-login__form-right">
								<a href="javascript:;" id="m_login_forget_password" class="m-link">
									¿Olvidaste tu contraseña?
								</a>
							</div>
						</div>
						<div class="m-login__form-action">
							<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
								Iniciar sesión
							</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="/assets/snippets/pages/user/login.js" type="text/javascript"></script>

</body>
</html>