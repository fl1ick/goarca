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
                    <img src="{{ asset('img/beranada.JPG') }}" class="img-fluid rounded border"
                        style="width: 120%; border: 5px solid #2196f3; border-radius: 10px;" alt="Beranda Image">
                </div>
                <div class="description mt-3">
                    <p style="font-size: 18px; color: #555;">
                        Kearsipan adalah proses pengelolaan dokumen atau berkas secara sistematis agar mudah ditemukan,
                        digunakan, dan disimpan kembali.
                        Arsip berperan penting dalam menunjang efisiensi kerja serta menjadi bukti administrasi dan sejarah
                        organisasi.
                        Di sistem ini, Anda dapat mengelola berkas aktif dan inaktif dengan mudah dan terorganisir.
                    </p>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Data Jra</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/jra.png') }}" width="180" height="620" class="img-fluid rounded border"
                    style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/jra.jpg') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Jra">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Data Jra, pilih menu 'Data Jra' pada sidebar di sebelah kiri.
                    Di halaman ini, kamu dapat melihat data Jadwal Retensi Arsip, yang mencakup informasi mengenai retensi
                    arsip aktif dan inaktif.
                    Pastikan kamu memahami setiap kategori sebelum mengarsipkan data.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Data Kategori</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/kate.png') }}" width="180" height="620" class="img-fluid rounded border"
                    style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/kate.jpg') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Data Kategori, pilih menu 'Data Kategori' pada sidebar di
                    sebelah kiri.
                    Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Daftar Arsip</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border"
                    style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/daftarr.png') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Daftar">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Tombol 'Tambah Arsip' digunakan untuk menambahkan data arsip baru ke dalam
                    sistem.
                    Pastikan data yang diinput sesuai dengan ketentuan yang telah dijelaskan pada Tata Cara dibawah.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Menambah Data</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border"
                    style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/tambahh.png') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Saat ingin menambahkan data, pastikan Anda mengisi semua kolom yang wajib,
                    yaitu 'Isi Berkas', 'Tahun Berkas', 'Kategori', 'Klasifikasi', dan 'Unit Olah'.
                    Setelah semua data terisi dengan lengkap, klik tombol 'Submit' yang berada di bagian bawah untuk
                    menyimpan data.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Memfilter Data</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/daftar.png') }}" width="180" height="620" class="img-fluid rounded border"
                    style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Edit/filterr.png') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mencari atau memfilter data,
                    silakan isi kolom 'Isi Berkas', 'Tahun Berkas', 'Kategori', dan 'Klasifikasi' sesuai dengan data yang
                    ingin dicari.
                    Maka otomatis akan memunculkan hasil yang dicari.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Musnah</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/musnah.png') }}" width="180" height="620"
                    class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;"
                    alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/musnah.jpg') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Musnah, pilih menu 'Berkas Musnah' pada sidebar di
                    sebelah kiri.
                    Di halaman ini, kamu dapat melihat arsip yang bersifat Musnah.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Permanen</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/permanen.png') }}" width="180" height="620"
                    class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;"
                    alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/permanen.jpg') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Permanen, pilih menu 'Berkas Permanen' pada sidebar di
                    sebelah kiri.
                    Di halaman ini, kamu dapat melihat arsip yang bersifat Permanen.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Inaktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Edit/inaktif.png') }}" width="180" height="620"
                    class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;"
                    alt="Side Bar">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/inaktif.jpg') }}" class="img-fluid rounded border"
                    style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif">
            </div>

            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Aktif, pilih menu 'Berkas Aktif' pada sidebar di sebelah
                    kiri.
                    Di halaman ini, kamu dapat melihat arsip yang bersifat inaktif.<br>
                    Selain itu, fitur ini memungkinkan pengguna mengunduh data arsip dalam format CSV, XLSX, atau PDF.
                </p>
            </div>
        </div>


    </div>
    </div>
@endsection
