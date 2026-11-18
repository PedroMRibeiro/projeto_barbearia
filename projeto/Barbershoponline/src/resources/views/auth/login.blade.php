<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name', 'BarberShopOnline') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('assets/site/img/logo/logo7.png') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/logincss/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" href="{{ asset('assets/logincss/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" href="{{ asset('assets/logincss/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('assets/logincss/css/util.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/logincss/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/logincss/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <form method="POST" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email obrigatório">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Introduza o email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password obrigatória">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Introduza a password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>		
								
					<div class="text-right p-t-8 p-b-31">

					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/logincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assets/logincss/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logincss/js/main.js') }}"></script>

    </body>

</html>
