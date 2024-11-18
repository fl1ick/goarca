@extends('layouts.main')

@section('content')
<main>
    <div class="table-data">
        <div class="order">
            <h2>Berkas Inaktif</h2>
            <!-- Daftar Arsip Table -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Berkas</th>
                            <th>Tahun Berkas</th>
                            <th>Kategori</th>
                            <th>Kode Klasifikasi</th>
                            <th>Klasifikasi</th>
                            <th>Retensi Aktif</th>
                            <th>Retensi Inaktif</th>
                            <th>Jumlah Retensi</th>
                            <th>Nasib</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berkasinaktif as $inaktif)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $inaktif->isi_berkas }}</td>
                            <td>{{ $inaktif->tahun_berkas }}</td>
                            <td>{{ $inaktif->kategori }}</td>
                            <td>{{ $inaktif->kode_klasifikasi }}</td>
                            <td>{{ $inaktif->klasifikasi }}</td>
                            <td>{{ $inaktif->retensi_aktif }}</td>
                            <td>{{ $inaktif->retensi_inaktif }}</td>
                            <td>{{ $inaktif->jumlah_retensi }}</td>
                            <td>{{ $inaktif->nasib }}</td>
                            <td>{{ $inaktif->status }}</td>
                            <td>
                                <form action="{{ route('berkasinaktif.destroy', $inaktif->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection