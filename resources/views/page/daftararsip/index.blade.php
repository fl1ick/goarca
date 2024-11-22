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
                        <input class="form-control w-40" type="text" name="isi_berkas" id="isi_berkas" value="{{ request()->isi_berkas }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tahun_berkas">Tahun Berkas:</label>
                        <input class="form-control w-25" type="date" name="tahun_berkas" id="tahun_berkas" value="{{ request()->tahun_berkas }}">
                    </div>
                    <div class="col-md-6">
                        <label for="kategori1">Kategori:</label>
                        <select name="kategori1" id="kategori1" class="form-control w-50">
                            <option value="">--Pilih Kategori--</option>
                            @foreach($kategories as $kategori)
                            <option value="{{ $kategori->kode }}" {{ request()->kategori1 == $kategori->kode ? 'selected' : '' }}>
                                {{ $kategori->kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="klasifikasi1">Klasifikasi:</label>
                        <select name="klasifikasi1" id="klasifikasi1" class="form-control w-50">
                            <option value="">--Pilih Klasifikasi--</option>
                            @if(isset($klasifikasis))
                                @foreach($klasifikasis as $klasifikasi)
                                <option value="{{ $klasifikasi->kode_kodeklasifikasi }}" 
                                    {{ request()->klasifikasi1 == $klasifikasi->kode_kodeklasifikasi ? 'selected' : '' }}>
                                    {{ $klasifikasi->klasifikasi }}
                                </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="status1">Status:</label>
                        <select name="status1" id="status1" class="form-control w-50">
                            <option value="">--Pilih Status--</option>
                            <option value="Aktif" {{ request()->status1 == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Inaktif" {{ request()->status1 == 'Inaktif' ? 'selected' : '' }}>Inaktif</option>
                            <option value="Proses" {{ request()->status1 == 'Proses' ? 'selected' : '' }}>Proses</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="form-control w-25 btn btn-primary"><i class='bx bx-filter'></i> Filter</button>
                    </div>
                </div>
            </form>
            <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            + Tambah Arsip
                        </button>
                    </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
                <div class="modal-dialog modal-75w">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Arsip</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        <label for="status" class="col-sm-2 col-form-label">Status:</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control w-25" required>
                                <option value="">--Pilih Status--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Inaktif">Inaktif</option>
                                <option value="Proses">Proses</option>
                            </select>
                        </div>
                    </div>

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

                                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
            
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>

            <style>
            .modal-75w {
                max-width: 75%;
                /* Set the modal width to 75% of the screen */
            }

            .sidebar a {
                text-decoration: none;
                /* Menghapus garis bawah */
            }
            </style>








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
                            <td>{{ $arsip->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
        {{ $daftararsip->links('pagination::bootstrap-5') }}
    </div>
            </div>
        </div>
    </div>

    
<script>
    // Mengambil klasifikasi berdasarkan kategori yang dipilih
    document.getElementById('kategori').addEventListener('change', function() {
        var kodeKategori = this.value;
        fetch('/getKlasifikasi/' + kodeKategori)
            .then(response => {console.log(response); // Cek status response
        return response.json();
    })
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
            })
            .catch(error => console.error('Error:', error)); // Menangani error;
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
<script>
    // Mengisi otomatis klasifikasi berdasarkan kategori yang dipilih di form filter
    document.getElementById('kategori1').addEventListener('change', function() {
        var kodeKategori = this.value;
        fetch('/getKlasifikasi/' + kodeKategori)
            .then(response => response.json())
            .then(data => {
                var klasifikasiSelect = document.getElementById('klasifikasi1');
                klasifikasiSelect.innerHTML = '<option value="">--Pilih Klasifikasi--</option>';
                data.forEach(function(klasifikasi) {
                    klasifikasiSelect.innerHTML += `<option value="${klasifikasi.kode_klasifikasi}">
                        ${klasifikasi.klasifikasi}</option>`;
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const modal = document.getElementById('myModal');

        if (modal) {
            // Saat modal terbuka, matikan sidebar
            modal.addEventListener('show.bs.modal', function() {
                if (sidebar) sidebar.classList.remove('active');
            });

            // Saat modal tertutup, aktifkan kembali sidebar
            modal.addEventListener('hide.bs.modal', function() {
                if (sidebar) sidebar.classList.add('active');
            });
        }
    });
</script>
</main>
@endsection