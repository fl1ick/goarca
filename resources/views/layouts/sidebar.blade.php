<section id="sidebar">
		<a href="#" class="brand" style="text-decoration: none;">
			<i class='bx bxs-copy-alt'></i>
			<span class="text">Arsip Kota Magelang</span>
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
					<i class='bx bx-collection'></i>
					<span class="text">Daftar Arsip</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('aktif') ? 'active' : '' }}">
				<a href="{{route('aktif')}}" style="text-decoration: none;">
					<i class='bx bx-collection'></i>
					<span class="text">Berkas Aktif</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('inaktif') ? 'active' : '' }}">
				<a href="{{route('inaktif')}}" style="text-decoration: none;">
					<i class='bx bx-collection'></i>
					<span class="text">Berkas Inaktif</span>
				</a>
			</li>
			<li>
				<a href="penjelasan.html" style="text-decoration: none;">
					<i class='bx bxs-detail'></i>	
					<span class="text">Tatacara</span>
				</a>
			</li>
			<li>
				<a href="penjelasan.html" style="text-decoration: none;">
					<i class='bx bxs-bookmarks'></i>	
					<span class="text">penjelasan</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout" style="text-decoration: none;">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>