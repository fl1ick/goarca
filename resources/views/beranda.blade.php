@extends('layouts.main')

@section('content')
<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Arsip Kota Magelang</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Data arsip Masuk</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-hot'></i>
					<span class="text">
						<h3>2834</h3>
						<p>Surat Musnah</p>
					</span>
				</li>
				<li>
					<i class='bx bx-category-alt' ></i>
					<span class="text">
						<h3>9</h3>
						<p>Kategori Arsip</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Kategori Data</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Kategori</th>
								<th>Kode Surat</th>
								<th>Sifat</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>List Data</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
@endsection
