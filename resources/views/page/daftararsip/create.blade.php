@extends('layouts.main')

@section('content')
<main>
    <div class="table-data">
        <div class="order">
            <h2>Form Daftar Arsip</h2>
            <form action="{{ route('arsip.store') }}" method="POST">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="isi_berkas" class="col-sm-2 col-form-label">Isi Berkas:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control w-100" name="isi_berkas" id="isi_berkas" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tahun_berkas" class="col-sm-2 col-form-label">Tahun Berkas:</label>
                        <div class="col-sm-10">
                            <input class="form-control w-25" type="date" name="tahun_berkas" id="tahun_berkas" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori:</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="kategori" class="form-control w-25" required>
                                <option value="">--Pilih Kategori--</option>
                                @foreach($kategories as $kategori)
                                <option value="{{ $kategori->kode }}">{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi:</label>
                        <div class="col-sm-10">
                            <select name="klasifikasi" id="klasifikasi" class="form-control w-75" required>
                                <option value="">--Pilih Klasifikasi--</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tambahkan input hidden untuk klasifikasi -->
                    <input type="hidden" name="klasifikasi_hidden" id="klasifikasi_hidden">

                    <div class="mb-3 row">
                        <label for="kode_klasifikasi" class="col-sm-2 col-form-label">Kode Klasifikasi:</label>
                        <div class="col-sm-10">
                        <input class="form-control w-25" type="text" name="kode_klasifikasi" id="kode_klasifikasi" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="retensi_aktif" class="col-sm-2 col-form-label">Retensi Aktif:</label>
                        <div class="col-sm-10">
                        <input class="form-control w-25" type="number" name="retensi_aktif" id="retensi_aktif" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="retensi_inaktif" class="col-sm-2 col-form-label">Retensi Inaktif:</label>
                        <div class="col-sm-10">
                        <input class="form-control w-25" type="number" name="retensi_inaktif" id="retensi_inaktif" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah_retensi" class="col-sm-2 col-form-label">Jumlah Retensi:</label>
                        <div class="col-sm-10">
                        <input class="form-control w-25" type="number" name="jumlah_retensi" id="jumlah_retensi" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nasib" class="col-sm-2 col-form-label">Nasib:</label>
                        <div class="col-sm-10">
                        <input class="form-control w-25" type="text" name="nasib" id="nasib" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>

                </div>
            </form>
        </div>
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
        document.getElementById('kode_klasifikasi').value = selectedOption
            .value; // Tetap mengambil kode klasifikasi
        document.getElementById('klasifikasi_hidden').value = selectedOption.getAttribute(
            'data-klasifikasi'); // Simpan nama klasifikasi ke hidden input
        document.getElementById('retensi_aktif').value = selectedOption.getAttribute('data-retensi-aktif');
        document.getElementById('retensi_inaktif').value = selectedOption.getAttribute('data-retensi-inaktif');
        document.getElementById('jumlah_retensi').value = selectedOption.getAttribute('data-jumlah-retensi');
        document.getElementById('nasib').value = selectedOption.getAttribute('data-nasib');
    });
    </script>
</main>
@endsection