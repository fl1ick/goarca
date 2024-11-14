@extends('layouts.main')

@section('content')
    <div class="container bg-white py-4 px-4 rounded shadow"> <!-- Latar putih pada bagian konten -->

        <div class="row" style="height: 10vh; display: flex; justify-content: center; align-items: center;">
            <div class="col text-center">
                <h1 class="font-weight-bold" style="margin-bottom: 1px;">TATACARA</h1> <!-- Atur margin bawah -->
                <div class="line-dec mb-2" style="width: 50%; margin: 0 auto;"></div> <!-- Atur margin dan panjang garis -->
            </div>
        </div>

        <!-- Gambar Beranda di Tengah -->
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('img/beranda1.png') }}" style="max-width: 90%; border: 2px solid #2196f3; border-radius: 10px;" alt="Beranda Image">
        </div>

        <!-- Langkah 1: Pilih Data Jra -->
        <div style="margin-top: 30px;">
            <p class="font-weight-bold" style="font-size: 1.5rem; text-align: center;">1. Pilih Data Jra</p>
            <div style="display: flex; justify-content: center; align-items: center;">
                <div style="flex: 1; margin-right: 5px;">
                    <img src="{{ asset('img/sidebarjra.jpg') }}" style="max-width: 30%; height: auto; border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
                </div>
                <div style="flex: 1;">
                    <img src="{{ asset('img/datajra.jpg') }}" style="max-width: 100%; height: auto; border: 3px solid #2196f3; border-radius: 20px;" alt="Data Jra">
                </div>
            </div>


            <p style="margin-top: 10px;">Untuk mengakses data Jra, pilih menu 'Data Jra' pada sidebar di sebelah kiri. Di halaman ini, kamu dapat melihat data Jadwal Retensi Arsip.</p>
        </div>

        <!-- Langkah 2: Pilih Data Kategori -->
        <div style="margin-top: 30px;">
            <p class="font-weight-bold" style="font-size: 1.5rem; text-align: center;">2. Pilih Data Kategori</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="flex: 1; margin-right: 20px;">
                    <img src="{{ asset('img/sbkategori.jpg') }}" style="max-width: 40%; height: auto; border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar">
                </div>
                <div style="flex: 1;">
                    <img src="{{ asset('img/datakategori.jpg') }}" style="max-width: 80%; height: auto; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori">
                </div>
            </div>
            <p style="margin-top: 10px;">Untuk mengakses data Kategori, pilih menu 'Data Kategori' pada sidebar di sebelah kiri. Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.</p>
        </div>

    </div>
@endsection