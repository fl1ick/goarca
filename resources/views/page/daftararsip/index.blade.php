@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Form Daftar Arsip</h2>
    <form action="{{ route('arsip.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="isi_berkas">Isi Berkas:</label>
            <input type="text" name="isi_berkas" id="isi_berkas" required>
        </div>

        <div class="form-group">
            <label for="tahun_berkas">Tahun Berkas:</label>
            <input type="number" name="tahun_berkas" id="tahun_berkas" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select name="kategori" id="kategori" required>
                <option value="">--Pilih Kategori--</option>
                @foreach($kategories as $kategori)
                    <option value="{{ $kategori->kode }}">{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="klasifikasi">Klasifikasi:</label>
            <select name="klasifikasi" id="klasifikasi" required>
                <option value="">--Pilih Klasifikasi--</option>
            </select>
        </div>

        <!-- Tambahkan input hidden untuk klasifikasi -->
        <input type="hidden" name="klasifikasi_hidden" id="klasifikasi_hidden">

        <div class="form-group">
            <label for="kode_klasifikasi">Kode Klasifikasi:</label>
            <input type="text" name="kode_klasifikasi" id="kode_klasifikasi" readonly>
        </div>

        <div class="form-group">
            <label for="retensi_aktif">Retensi Aktif:</label>
            <input type="number" name="retensi_aktif" id="retensi_aktif" readonly>
        </div>

        <div class="form-group">
            <label for="retensi_inaktif">Retensi Inaktif:</label>
            <input type="number" name="retensi_inaktif" id="retensi_inaktif" readonly>
        </div>

        <div class="form-group">
            <label for="jumlah_retensi">Jumlah Retensi:</label>
            <input type="number" name="jumlah_retensi" id="jumlah_retensi" readonly>
        </div>

        <div class="form-group">
            <label for="nasib">Nasib:</label>
            <input type="text" name="nasib" id="nasib" readonly>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

<script>
    // Mengambil klasifikasi berdasarkan kategori yang dipilih
    document.getElementById('kategori').addEventListener('change', function() {
        var kodeKategori = this.value;
        fetch('/getKlasifikasi/' + kodeKategori)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var klasifikasiSelect = document.getElementById('klasifikasi');
                klasifikasiSelect.innerHTML = '<option value="">--Pilih Klasifikasi--</option>';
                data.forEach(function(klasifikasi) {
                    klasifikasiSelect.innerHTML += `<option value="${klasifikasi.kode_klasifikasi}" 
                        data-klasifikasi="${klasifikasi.klasifikasi}" 
                        data-retensi-aktif="${klasifikasi.retensi_aktif}" 
                        data-retensi-inaktif="${klasifikasi.retensi_inaktif}" 
                        data-jumlah-retensi="${klasifikasi.jumlah_retensi}" 
                        data-nasib="${klasifikasi.nasib}">
                        ${klasifikasi.klasifikasi}</option>`;
                });
            });
    });

    // Mengisi otomatis berdasarkan klasifikasi yang dipilih
    document.getElementById('klasifikasi').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('kode_klasifikasi').value = selectedOption.value;  // Tetap mengambil kode klasifikasi
        document.getElementById('klasifikasi_hidden').value = selectedOption.getAttribute('data-klasifikasi');  // Simpan nama klasifikasi ke hidden input
        document.getElementById('retensi_aktif').value = selectedOption.getAttribute('data-retensi-aktif');
        document.getElementById('retensi_inaktif').value = selectedOption.getAttribute('data-retensi-inaktif');
        document.getElementById('jumlah_retensi').value = selectedOption.getAttribute('data-jumlah-retensi');
        document.getElementById('nasib').value = selectedOption.getAttribute('data-nasib');
    });
</script>

@endsection
