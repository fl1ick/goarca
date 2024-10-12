@extends('layouts.main')

@section('content')
              <!-- Borderless Table -->
              <div class="container-fluid">
              <div class="card">
                <h5 class="card-header">Kategori Tabel
                <form action="{{ route('kategory') }}" method="GET" class="d-flex" style="float: right;">
          <input class="form-control me-2" type="search" name="search" placeholder="Cari Kategori" aria-label="Search" value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($kategories as $kategory)
                            <tr data-entry-id="{{ $kategory->id }}">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategory->kode_kategori }}</td>
                                <td>{{ $kategory->kategori }}</td>
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
