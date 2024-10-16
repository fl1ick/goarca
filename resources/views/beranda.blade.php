@extends('layouts.main')

@section('content')
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Beranda</h1>
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
						<h3>History Data</h3>
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
@endsection
