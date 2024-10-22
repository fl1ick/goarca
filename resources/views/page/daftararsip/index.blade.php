@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Arsip</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('arsip') }}">
        <div class="form-group">
            <label for="isi_berkas">Isi Berkas:</label>
            <input type="text" name="isi_berkas" id="isi_berkas" value="{{ request()->isi_berkas }}">
        </div>

        <div class="form-group">
            <label for="tahun_berkas">Tahun Berkas:</label>
            <input type="number" name="tahun_berkas" id="tahun_berkas" value="{{ request()->tahun_berkas }}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select name="kategori" id="kategori">
                <option value="">--Pilih Kategori--</option>
                @foreach($kategories as $kategori)
                    <option value="{{ $kategori->kode }}" {{ request()->kategori == $kategori->kode ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="klasifikasi">Klasifikasi:</label>
            <select name="klasifikasi" id="klasifikasi">
                <option value="">--Pilih Klasifikasi--</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nasib">Nasib:</label>
            <input type="text" name="nasib" id="nasib" value="{{ request()->nasib }}">
        </div>

        <button type="submit">Filter</button>
    </form>

    <!-- Daftar Arsip Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Isi Berkas</th>
                <th>Tahun Berkas</th>
                <th>Kategori</th>
                <th>Klasifikasi</th>
                <th>Nasib</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftararsip as $arsip)
                <tr>
                    <td>{{ $arsip->isi_berkas }}</td>
                    <td>{{ $arsip->tahun_berkas }}</td>
                    <td>{{ $arsip->kategori }}</td>
                    <td>{{ $arsip->klasifikasi }}</td>
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
    if(document.getElementById('kategori').value) {
        document.getElementById('kategori').dispatchEvent(new Event('change'));
    }
</script>

@endsection
    