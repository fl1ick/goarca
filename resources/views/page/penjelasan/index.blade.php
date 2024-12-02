@extends('layouts.main')

@section('content')
    <div class="container bg-white py-4 px-4 rounded shadow">
        <div class="row">
            <div class="col text-center">
                <h1 class="font-weight-bold">PENJELASAN</h1>
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
                <img src="{{ asset('img/Sidebar/Sjra.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
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
                <img src="{{ asset('img/Sidebar/Skate.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
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
                <img src="{{ asset('img/Sidebar/Sdaftar.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Tambaharsip.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Daftar Arsip, pilih menu 'Daftar Arsip' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat penambahan arsip dan pemfilteran arsip.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">4. Pilih Berkas Aktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sidebar/Saktif.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Aktif.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Aktif, pilih menu 'Berkas Aktif' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat aktif. Berkas aktif adalah data yang berasal dari penambahan arsip dengan status 'Aktif'. 
                   Status ini menunjukkan bahwa berkas tersebut masih digunakan atau relevan untuk keperluan saat ini.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">5. Pilih Berkas Inaktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sidebar/Sinaktif.png') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/Inaktif.png') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Aktif, pilih menu 'Berkas Aktif' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat inaktif. 
                   Berkas inaktif adalah data yang berasal dari penambahan arsip dengan status 'Inaktif'. 
                   Status ini menunjukkan bahwa berkas tersebut sudah tidak digunakan secara rutin, namun tetap disimpan untuk keperluan referensi atau sesuai dengan jadwal retensi arsip.
                </p>
            </div>
        </div>
        

    </div>
</div>
@endsection