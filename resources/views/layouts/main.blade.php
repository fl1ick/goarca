<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('customs/style.css')}}">

	<title>Arsip Kota Magelang</title>
</head>
<body>


	<!-- SIDEBAR -->
	@include('layouts.sidebar')
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	@yield('content')
	<!-- CONTENT -->
	

	<script src="{{ asset('customs/script.js')}}"></script>
</body>
</html>