@extends('layouts.main')

@section('content')
              <!-- Borderless Table -->
              <div class="container-fluid">
              <div class="card">
                <h5 class="card-header">Tabel Jra
                <form action="{{ route('jra') }}" method="GET" class="d-flex" style="float: right;">
          <input class="form-control me-2" type="search" name="search" placeholder="Cari Kategori" aria-label="Search" value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Kode Klasifikasi</th>
                        <th>Klasifikasi</th>
                        <th>KKAD</th>
                        <th>Retensi Aktif</th>
                        <th>Retensi InAktif</th>
                        <th>Jumlah Retensi</th>
                        <th>Nasib</th>
                      </tr> 
                    </thead>
                    <tbody>
                    @forelse($jras as $jra)
                            <tr data-entry-id="{{ $jra->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($jra->kategory)->kategori ?? 'N/A' }}</td>
                                <td>{{ $jra->kode_klasifikasi }}</td>
                                <td>{{ $jra->klasifikasi }}</td>
                                <td>{{ $jra->KKAD }}</td>
                                <td>{{ $jra->retensi_aktif }}</td>
                                <td>{{ $jra->retensi_inaktif }}</td>
                                <td>{{ $jra->retensi_aktif + $jra->retensi_inaktif }}</td> <!-- Hitung jumlah retensi di sini -->
                                <td>@if ($jra->nasib == 'Musnah')
                                        <span class="badge bg-label-danger me-1">{{ $jra->nasib }}</span>
                                    @elseif ($jra->nasib == 'Permanen')
                                        <span class="badge bg-label-success me-1">{{ $jra->nasib }}</span>
                                    @else
                                        <span class="badge bg-label-secondary me-1">{{ $jra->nasib }}</span>
                                    @endif
                                </span></td>
                            </tr>   
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Borderless Table -->
@endsection
