<!DOCTYPE html>
<html lang="es">
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Metronic | Login Page - 4
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/assets/admin-login.css" rel="stylesheet">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(/assets/app/media/img//bg/bg-2.jpg);">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#"><img src="/assets/admin-logo.png"></a>
				</div>
				<div class="m-login__forget-password">
					<div class="m-login__head">
						<h3 class="m-login__title">
							¿Olvidaste tu contraseña?
						</h3>
						<div class="m-login__desc">
							Ingresa tu email para poder resetear tu contraseña:
						</div>
					</div>
					<form class="m-login__form m-form" action="">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
						</div>
						<div class="m-login__form-action">
							<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
								Enviar
							</button>
							&nbsp;&nbsp;
							<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
								Cancel
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="/assets/snippets/pages/user/login.js" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>