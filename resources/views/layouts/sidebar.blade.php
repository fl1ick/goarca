<section id="sidebar">
		<a href="#" class="brand" style="text-decoration: none;">
			<img src="{{ asset('img/kotamagelang.png')}}" alt="Logo Kota Magelang" class="logo">
			<span class="text"  style="color: black">GoArca</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
				<a href="{{route('beranda')}}" style="text-decoration: none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Beranda</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('jra') ? 'active' : '' }}">
				<a href="{{route('jra')}}" style="text-decoration: none;">
				<i class='bx bxs-cabinet'></i>
					<span class="text">Data Jra</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('kategory') ? 'active' : '' }}">
				<a href="{{route('kategory')}}" style="text-decoration: none;">
					<i class='bx bxs-package' ></i>
					<span class="text">Data Kategori</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('arsip') ? 'active' : '' }}">
				<a href="{{route('arsip')}}" style="text-decoration: none;">
					<i class='bx bxs-data'></i>
					<span class="text">Daftar Arsip</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('berkasmusnah.index') ? 'active' : '' }}">
				<a href="{{route('berkasmusnah.index')}}" style="text-decoration: none;">
					<i class='bx bxs-bar-chart-alt-2'></i>
					<span class="text">Berkas Musnah</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('berkaspermanen.index') ? 'active' : '' }}">
				<a href="{{route('berkaspermanen.index')}}" style="text-decoration: none;">
					<i class='bx bxs-bar-chart-alt-2'></i>
					<span class="text">Berkas Permanen</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('inaktif') ? 'active' : '' }}">
				<a href="{{route('inaktif')}}" style="text-decoration: none;">
					<i class='bx bxs-cabinet'></i>
					<span class="text">Berkas Inaktif</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('tatacara') ? 'active' : '' }}">
				<a href="{{route('tatacara')}}" style="text-decoration: none;">
				<i class='bx bxs-cabinet'></i>
					<span class="text">Tata Cara</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('penjelasan') ? 'active' : '' }}">
				<a href="{{route('penjelasan')}}" style="text-decoration: none;">
				<i class='bx bxs-collection'></i>
					<span class="text">Penjelasan</span>
				</a>
			</li>
		</ul>
	</section>