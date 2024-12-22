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
                    <img src="{{ asset('img/beranada.JPG') }}" class="img-fluid rounded border" 
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
                <p class="font-weight-bold" style="font-size: 1.5rem;">Data Jra</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/jra.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/jra.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Jra"> 
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
                <p class="font-weight-bold" style="font-size: 1.5rem;">Data Kategori</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/kate.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/kate.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Data Kategori"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Data Kategori, pilih menu 'Data Kategori' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat data kategori yang digunakan dalam pengarsipan.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Daftar Arsip</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/daftar.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/daftar.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Daftar Arsip, pilih menu 'Daftar Arsip' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat penambahan arsip dan pemfilteran arsip.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Musnah</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/musnah.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/musnah.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Aktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Musnah, pilih menu 'Berkas Musnah' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat Musnah. Berkas Musnah adalah data yang berasal dari penambahan arsip dengan status 'Musnah'. 
                   Status ini menunjukkan bahwa berkas tersebut dimusnahkan.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Permanen</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/permanen.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/permanen.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Permanen, pilih menu 'Berkas Permanen' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat Permanen. 
                   Berkas Permanen adalah data yang berasal dari penambahan arsip dengan status 'Permanen'.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="font-weight-bold" style="font-size: 1.5rem;">Berkas Inaktif</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/Sb/inaktif.jpg') }}" width="180" height="620" class="img-fluid rounded border" style="border: 3px solid #2196f3; border-radius: 10px;" alt="Side Bar"> 
            </div>
            <div class="col-md-8">
                <img src="{{ asset('img/Data/permanen.jpg') }}" class="img-fluid rounded border" style="width: 100%; border: 3px solid #2196f3; border-radius: 10px;" alt="Berkas Inaktif"> 
            </div>
            
            <div class="col-md-12 mt-2">
                <p style="font-size: 20px;">Untuk mengakses Berkas Inaktif, pilih menu 'Berkas Inaktif' pada sidebar di sebelah kiri.
                   Di halaman ini, kamu dapat melihat arsip yang bersifat Inaktif. 
                   Berkas Inaktif adalah data yang berasal dari penambahan arsip dengan status 'Inaktif'. 
                   Status ini menunjukkan bahwa berkas tersebut sudah tidak digunakan secara rutin, namun tetap disimpan untuk keperluan referensi atau sesuai dengan jadwal retensi arsip.
                </p>
            </div>
        </div>
        

    </div>
</div>
@endsection