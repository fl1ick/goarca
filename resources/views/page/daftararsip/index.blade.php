@extends('layouts.main')

@section('content')
<main>
    <div class="table-data">
        <div class="order">
            <h2>Daftar Arsip</h2>

            <!-- Filter Form -->
            <form method="GET" action="{{ route('arsip') }}">
                <div class="row">
                    <div class="col-md-6">
                        <label for="isi_berkas">Isi Berkas:</label>
                        <input class="form-control w-40" type="text" name="isi_berkas" id="isi_berkas"
                            value="{{ request()->isi_berkas }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tahun_berkas">Tahun Berkas:</label>
                        <input class="form-control w-25" type="number" name="tahun_berkas" id="tahun_berkas"
                            value="{{ request()->tahun_berkas }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="kategori">Kategori:</label>
                        <div class="">
                            <select name="kategori" id="kategori" class="form-control w-75">
                                <option value="">--Pilih Kategori--</option>
                                @foreach($kategories as $kategori)
                                <option value="{{ $kategori->kode }}"
                                    {{ request()->kategori == $kategori->kode ? 'selected' : '' }}>
                                    {{ $kategori->kategori }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="klasifikasi">Klasifikasi:</label>
                        <div class="">
                            <select name="klasifikasi" id="klasifikasi" class="form-control w-75">
                                <option value="">--Pilih Klasifikasi--</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="nasib">Nasib:</label>
                    <input class="form-control w-75" type="text" name="nasib" id="nasib" value="{{ request()->nasib }}">
                </div>

                <div class="mb-3 row">
                    <label for="submit" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6"><button type="submit" class="btn btn-primary">Filter</button></div>
                </div>
            </form>

    <!-- Daftar Arsip Table -->
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
            </tr>
        </thead>
        <tbody>
            @foreach($daftararsip as $arsip)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $arsip->isi_berkas }}</td>
                    <td>{{ $arsip->tahun_berkas }}</td>
                    <td>{{ $arsip->kategori }}</td>
                    <td>{{ $arsip->kode_klasifikasi }}</td>
                    <td>{{ $arsip->klasifikasi }}</td>
                    <td>{{ $arsip->retensi_aktif }}</td>
                    <td>{{ $arsip->retensi_inaktif }}</td>
                    <td>{{ $arsip->jumlah_retensi }}</td>
                    <td>{{ $arsip->nasib }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
document.getElementById('kategori').addEventListener('change', function() {
    var kodeKategori = this.value;
    fetch('/getKlasifikasi/' + kodeKategori)
        .then(response => response.json())
        .then(data => {
            var klasifikasiSelect = document.getElementById('klasifikasi');
            klasifikasiSelect.innerHTML = '<option value="">--Pilih Klasifikasi--</option>';
            data.forEach(function(klasifikasi) {
                klasifikasiSelect.innerHTML += `<option value="${klasifikasi.klasifikasi}" 
                        ${klasifikasi.klasifikasi == "{{ request()->klasifikasi }}" ? 'selected' : ''}>
                        ${klasifikasi.klasifikasi}</option>`;
            });
        });
});

// Untuk preselecting klasifikasi dropdown jika sudah ada request sebelumnya
if (document.getElementById('kategori').value) {
    document.getElementById('kategori').dispatchEvent(new Event('change'));
}
</script>

@endsection