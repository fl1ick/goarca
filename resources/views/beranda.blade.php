@extends('layouts.main')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Beranda</h1>
            </div>
        </div>

        <ul class="box-info" style="margin-bottom:20px">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>{{ $Hasildataarsip->total_data_daftararsip }}</h3>
                    <p>Data arsip Masuk</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-hot'></i>
                <span class="text">
                    <h3>{{ $Hasiljras->total_data_jras }}</h3>
                    <p>Jumlah Data JRA</p>
                </span>
            </li>
            <li>
                <i class='bx bx-category-alt'></i>
                <span class="text">
                    <h3>{{ $Hasilkategory->total_data_kategory }}</h3>
                    <p>Jumlah Data Kategori</p>
                </span>
            </li>
        </ul>
        <ul class="custom-box-info">
            <li>
                <i class='bx bxs-file'></i>
                <span class="text">
                    <h3>{{ $Hasilberkaspermanen->total_data_berkaspermanen }}</h3>
                    <p>Berkas Permanen</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-archive'></i>
                <span class="text">
                    <h3>{{ $Hasilberkasinaktif->total_data_berkasinaktif }}</h3>
                    <p>Berkas Inaktif</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-trash'></i>
                <span class="text">
                    <h3>{{ $Hasilberkasmusnah->total_data_berkasmusnah }}</h3>
                    <p>Berkas Musnah</p>
                </span>
            </li>
        </ul>
        
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Jejak Data</h3>
                </div>
                <table>
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Nama Tabel</th>
                            <th>id</th>
                            <th>data lama</th>
                            <th>data baru</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->table_name }}</td>
                                <td>{{ $log->record_id }}</td>
                                <td>
                                    @php
                                        $oldData = json_decode($log->old_data, true);
                                    @endphp
                                    @if($oldData)
                                        <ul>
                                            @foreach ($oldData as $key => $value)
                                                <li>
                                                    <strong>{{ $key }}</strong>: 
                                                    @if (is_null($value) || $value === '000000Z' || $value === '')
                                                        N/A
                                                    @elseif (strtotime($value)) <!-- Jika tipe data tanggal -->
                                                        {{ \Carbon\Carbon::parse($value)->format('d-m-Y') }}
                                                    @else
                                                        {{ $value }}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </td>
                                <td>
                                @php
                                    $newData = json_decode($log->new_data, true);
                                @endphp
                                @if($newData)
                                    <ul>
                                        @foreach ($newData as $key => $value)
                                            <li>
                                                <strong>{{ $key }}</strong>: 
                                                @if (is_null($value) || $value === '000000Z' || $value === '')
                                                    N/A
                                                @elseif (strtotime($value)) <!-- Jika tipe data tanggal -->
                                                    {{ \Carbon\Carbon::parse($value)->format('d-m-Y') }}
                                                @else
                                                    {{ $value }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>N/A</span>
                                @endif
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
@endsection
