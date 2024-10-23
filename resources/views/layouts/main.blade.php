<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('customs/style.css')}}">
	<!-- Tabulator Table -->
	<link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator_bootstrap4.min.css" rel="stylesheet">

	<title>Arsip Kota Magelang</title>
</head>
<body>



	<!-- SIDEBAR -->
	@include('layouts.sidebar')
	<!-- SIDEBAR -->
	 <section id="content">
	 @include('layouts.navbar')
	 

	<!-- CONTENT -->
	@yield('content')
	<!-- CONTENT -->
	</section>

	<script src="{{ asset('customs/script.js')}}"></script>
	<!-- Tabulator Table Script -->
	<script src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
</body>
</html>