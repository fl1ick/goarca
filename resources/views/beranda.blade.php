@extends('layouts.main')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Beranda</h1>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
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


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Log Data</h3>
                </div>
                <table>
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Table_name</th>
                            <th>record_id</th>
                            <th>old_data</th>
                            <th>new_data</th>
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
                                        {{ json_encode($oldData) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $newData = json_decode($log->new_data, true);
                                    @endphp
                                    @if($newData)
                                        @foreach ($newData as $key => $value)
                                            {{ $key }}: {{ $value }}<br>
                                        @endforeach
                                    @else
                                        N/A
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
