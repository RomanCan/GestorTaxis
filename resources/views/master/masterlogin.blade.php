<!DOCTYPE html>
<html lang="es">
<head>
	 <meta charset="utf-8">
 	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	{{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">


	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 {{-- <!-- Normalize CSS --> --}}
	<link rel="stylesheet" href="css/normalize.css">

     {{-- <!-- Materialize CSS --> --}}
	<link rel="stylesheet" href="css/materialize.min.css">

     {{-- <!-- Material Design Iconic Font CSS --> --}}
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">

    {{-- <!-- Malihu jQuery custom content scroller CSS --> --}}
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">

    {{-- <!-- Sweet Alert CSS --> --}}
    {{-- <!-- <link rel="stylesheet" href="css/sweetalert2.css"> --> --}}
    <link rel="stylesheet" href="css/sweetalert.css">

    {{-- <!-- MaterialDark CSS --> --}}
	<link rel="stylesheet" href="css/style.css">

	<script src="js/vue.js"></script>
	<script src="js/vue-resource.min.js"></script>

</head>
<body class="font-cover" id="login">
	@yield('contenido')




	@stack('scripts')

    <script src="js/sweetalert.min.js"></script>
	{{-- <script src="js/modal-materialize.js"></script>	 --}}

	{{-- <script>window.jQuery || document.write('<script src="js/jquery-2.2.0.min.js"><\/script>')</script> --}}

    {{-- <!-- Materialize JS --> --}}
	<script src="js/materialize.min.js"></script>

    {{-- <!-- Malihu jQuery custom content scroller JS --> --}}
	{{--  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>  --}}
    <script src="js/sweetalert2.js"></script>
    {{-- <!-- MaterialDark JS -->
	<!-- <script src="js/main.js"></script> --> --}}
	<script src="js/jquery-3.3.1.min.js"></script>
	{{-- <!-- <script src="js/bootstrap.min.js"></script> --> --}}
</body>
</html>
