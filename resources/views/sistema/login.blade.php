<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inciar Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('lo/images/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<title>Iniciar Sesion</title>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lo/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('log/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('log/css/main.css')}}">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('log/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="{{route('valida')}}" method="POST">
				{{csrf_field()}}	
				<span class="login100-form-title p-b-49">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate="El correo es requerido">
						<span class="label-input100">Correo</span>
						<input class="input100" type="text" name="correo" placeholder="ingrese su correo">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="La contraseña es requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="password" placeholder="Ingrese su contraseña">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Iniciar Sesion
							</button>
						</div>
					</div>
					@if (Session::has('error'))
                        <div>{{ Session::get('error') }}</div>
	                    @endif
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('log/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('log/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('log/js/main.js')}}"></script>
</body>
</html>