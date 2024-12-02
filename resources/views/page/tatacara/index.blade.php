@extends('layouts.main')

@section('content')
    <div class="container bg-white py-4 px-4 rounded shadow">
        <div class="row">
            <div class="col text-center">
                <h1 class="font-weight-bold">TATA CARA</h1>
                <div class="line-dec mb-4"></div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="image mb-3">
                    <img src="{{ asset('img/Beranda.png') }}" class="img-fluid rounded border" 
                        style="width: 120%; border: 5px solid #2196f3; border-radius: 10px;" 
                        alt="Beranda Image"> 
                </div>
                <div class="description mt-3">
                    <p style="font-size: 18px; color: #555;">
                        Kearsipan adalah proses pengelolaan dokumen atau berkas secara sistematis agar mudah ditemukan, digunakan, dan disimpan kembali. 
                        Arsip berperan penting dalam menunjang efisiensi kerja serta menjadi bukti administrasi dan sejarah organisasi. 
                        Di sistem ini, Anda dapat mengelola berkas aktif dan inaktif dengan mudah dan terorganisir.
                    </p>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">1. Pilih Data Jra</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/jra.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Jra.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Jra"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Data Jra, pilih menu 'Data Jra' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat data Jadwal Retensi Arsip, yang mencakup informasi mengenai retensi arsip aktif dan inaktif.
                   Pastikan kamu memahami setiap kategori sebelum mengarsipkan data.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">2. Pilih Data Kategori</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/kate.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Kategori.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Data Kategori, pilih menu 'Data Kategori' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">3. Pilih Daftar Arsip</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/Tmbltambah.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Tombol 'Tambah Arsip' digunakan untuk menambahkan data arsip baru ke dalam sistem.
                    Pastikan data yang diinput sesuai dengan ketentuan yang telah dijelaskan pada Tata Cara nomor 4. 
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">4. Menambah Data</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/Tambaharsip.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Saat ingin menambahkan data, pastikan Anda mengisi semua kolom yang wajib, 
                    yaitu 'Isi Berkas', 'Tahun Berkas', 'Kategori', 'Klasifikasi', dan 'Status'. 
                    Setelah semua data terisi dengan lengkap, klik tombol 'Submit' yang berada di bagian bawah untuk menyimpan data.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">5. Memfilter Data</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/Filteredit.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mencari atau memfilter data, 
                    silakan isi kolom 'Isi Berkas', 'Tahun Berkas', 'Kategori', 'Klasifikasi', dan 'Status' sesuai dengan data yang ingin dicari. 
                    Setelah semua kolom terisi, klik tombol 'Filter' untuk menampilkan hasil pencarian.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">6. Pilih Berkas Aktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/aktif.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Aktif.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Aktif, pilih menu 'Berkas Aktif' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat aktif. 
                   Jika ingin menghapus data berkas aktif, Anda dapat mengklik tombol 'Delete' yang tersedia.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">7. Pilih Berkas Inaktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/inaktif.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Inaktif.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Aktif, pilih menu 'Berkas Aktif' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat inaktif.  
                   Jika ingin menghapus data berkas inaktif, Anda dapat mengklik tombol 'Delete' yang tersedia.
                </p>
            </div>
        </div>
        

    </div>
</div>
@endsection