@extends('layouts.main')

@section('content')
<main>
    <div class="container bg-white py-4 px-4 rounded shadow">
        <div class="row">
            <div class="col text-center">
                <h1 class="font-weight-bold">PANDUAN</h1>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="image mb-3">
                    <img src="{{ asset('img/beranda1.png') }}" class="img-fluid rounded border" style="width: 200%; border: 5px solid #2196f3; border-radius: 10px;" alt="Beranda Image">
                </div>
                <p class="mt-3" style="font-size: 20px; color: #333;">
                    Kearsipan adalah proses pengelolaan arsip yang mencakup pengumpulan, pengolahan, penyimpanan, hingga pemusnahan dokumen atau informasi yang memiliki nilai historis atau administratif. Sistem kearsipan yang baik sangat penting untuk menjaga kelangsungan informasi dan memudahkan akses di masa depan.
                </p>
            </div>
        </div>
        

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">1. Pilih Data Jra</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/sidebarjra.jpg') }}" width="200" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/datajra.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Jra"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px">Untuk mengakses data Jra, pilih menu 'Data Jra' pada sidebar di sebelah kiri.
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
                <img src="{{ asset('img/sbkategori.jpg') }}" width="200" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/datakategori.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px">Untuk mengakses data Kategori, pilih menu 'Data Kategori' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">2. Data Arsip</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/sbkategori.jpg') }}" width="200" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/datakategori.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori"> <!-- Bingkai biru -->
            </div>
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px">Untuk mengakses data Kategori, pilih menu 'Data Kategori' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.
                </p>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
