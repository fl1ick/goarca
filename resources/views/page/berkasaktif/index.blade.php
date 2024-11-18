@extends('layouts.main')

@section('content')
<main>
    <div class="table-data">
        <div class="order">
            <h2>Berkas Aktif</h2>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berkasaktif as $aktif)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aktif->isi_berkas }}</td>
                            <td>{{ $aktif->tahun_berkas }}</td>
                            <td>{{ $aktif->kategori }}</td>
                            <td>{{ $aktif->kode_klasifikasi }}</td>
                            <td>{{ $aktif->klasifikasi }}</td>
                            <td>{{ $aktif->retensi_aktif }}</td>
                            <td>{{ $aktif->retensi_inaktif }}</td>
                            <td>{{ $aktif->jumlah_retensi }}</td>
                            <td>{{ $aktif->nasib }}</td>
                            <td>{{ $aktif->status }}</td>
                            <td>
                                <form action="{{ route('berkasaktif.destroy', $aktif->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete this record?');">
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