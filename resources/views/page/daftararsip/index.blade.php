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
                            <input class="form-control w-25" type="date" name="tahun_berkas" id="tahun_berkas"
                                value="{{ request()->tahun_berkas }}">
                        </div>
                        <div class="col-md-6">
                            <label for="kategori1">Kategori:</label>
                            <select name="kategori1" id="kategori1" class="form-control w-50">
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($kategories as $kategori)
                                    <option value="{{ $kategori->kode }}"
                                        {{ request()->kategori1 == $kategori->kode ? 'selected' : '' }}>
                                        {{ $kategori->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="klasifikasi1">Klasifikasi:</label>
                            <select name="klasifikasi1" id="klasifikasi1" class="form-control w-50">
                                <option value="">--Pilih Klasifikasi--</option>
                                @if (isset($klasifikasis))
                                    @foreach ($klasifikasis as $klasifikasi)
                                        <option value="{{ $klasifikasi->kode_kodeklasifikasi }}"
                                            {{ request()->klasifikasi1 == $klasifikasi->kode_kodeklasifikasi ? 'selected' : '' }}>
                                            {{ $klasifikasi->klasifikasi }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="form-control w-25 btn btn-primary"><i class='bx bx-filter'></i>
                                Filter</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + Tambah Arsip
                    </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="false">
                    <div class="modal-dialog modal-75w">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Arsip</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                                <input class="form-control w-25" type="date" name="tahun_berkas"
                                                    id="tahun_berkas" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="kategori" class="col-sm-2 col-form-label">Kategori:</label>
                                            <div class="col-sm-10">
                                                <select name="kategori" id="kategori" class="form-control w-25" required>
                                                    <option value="">--Pilih Kategori--</option>
                                                    @foreach ($kategories as $kategori)
                                                        <option value="{{ $kategori->kode }}">{{ $kategori->kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi:</label>
                                            <div class="col-sm-10">
                                                <select name="klasifikasi" id="klasifikasi" class="form-control w-75"
                                                    required>
                                                    <option value="">--Pilih Klasifikasi--</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tambahkan input hidden untuk klasifikasi -->
                                        <input type="hidden" name="klasifikasi_hidden" id="klasifikasi_hidden">

                                        {{-- <div class="mb-3 row">
                                            <label for="status" class="col-sm-2 col-form-label">Status:</label>
                                            <div class="col-sm-10">
                                                <select name="status" id="status" class="form-control w-25" required>
                                                    <option value="">--Pilih Status--</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Inaktif">Inaktif</option>
                                                    <option value="Proses">Proses</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="mb-3 row">
                                            <label for="kode_klasifikasi" class="col-sm-2 col-form-label">Kode
                                                Klasifikasi:</label>
                                            <div class="col-sm-10">
                                                <input class="form-control w-25" type="text" name="kode_klasifikasi"
                                                    id="kode_klasifikasi" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="retensi_aktif" class="col-sm-2 col-form-label">Retensi
                                                Aktif:</label>
                                            <div class="col-sm-10">
                                                <input class="form-control w-25" type="number" name="retensi_aktif"
                                                    id="retensi_aktif" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="retensi_inaktif" class="col-sm-2 col-form-label">Retensi
                                                Inaktif:</label>
                                            <div class="col-sm-10">
                                                <input class="form-control w-25" type="number" name="retensi_inaktif"
                                                    id="retensi_inaktif" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="jumlah_retensi" class="col-sm-2 col-form-label">Jumlah
                                                Retensi:</label>
                                            <div class="col-sm-10">
                                                <input class="form-control w-25" type="number" name="jumlah_retensi"
                                                    id="jumlah_retensi" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="nasib" class="col-sm-2 col-form-label">Nasib:</label>
                                            <div class="col-sm-10">
                                                <input class="form-control w-25" type="text" name="nasib"
                                                    id="nasib" readonly>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
                <div class="mt-3">
                    <!-- Tombol Export -->
                    <div class="mb-3">
                        <button class="btn btn-primary" id="export-csv">Export CSV</button>
                        <button class="btn btn-warning me-2" id="export-xlsx">Export XLSX</button>
                        <button class="btn btn-danger" id="export-pdf">Export PDF</button>
                    </div>

                    <!-- Tabel Daftar Arsip -->
                    <div id="arsip-table"></div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end', // Pojok kanan atas
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#f0f9f0', // Warna background notifikasi
                    color: '#1c7430', // Warna teks
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    toast: true,
                    position: 'top-end', // Pojok kanan atas
                    icon: 'error',
                    title: '{{ $errors->first() }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#fef2f2', // Warna background notifikasi
                    color: '#b91c1c', // Warna teks
                });
            @endif
        </script>
        <script>
            // Mengambil klasifikasi berdasarkan kategori yang dipilih
            document.getElementById('kategori').addEventListener('change', function() {
                var kodeKategori = this.value;
                fetch('/getKlasifikasi/' + kodeKategori)
                    .then(response => {
                        console.log(response); // Cek status response
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
                // Data dari Laravel (diambil dari controller)
                var arsips = @json($daftararsip);

                // Inisialisasi Tabulator
                var table = new Tabulator("#arsip-table", {
                    data: arsips, // Assign data from the controller
                    layout: "fitColumns",
                    pagination: "local",
                    paginationSize: 10,
                    columns: [{
                            title: "No",
                            formatter: "rownum",
                            width: 100,
                            hozAlign: "center"
                        },
                        {
                            title: "Isi Berkas",
                            field: "isi_berkas",
                            sorter: "string",
                            width: 300
                        },
                        {
                            title: "Tahun Berkas",
                            field: "tahun_berkas",
                            sorter: "string"
                        },
                        {
                            title: "Masalah",
                            field: "kategori",
                            sorter: "string"
                        },
                        {
                            title: "Klasifikasi",
                            field: "kode_klasifikasi",
                            sorter: "string"
                        },
                        {
                            title: "Retensi Aktif",
                            field: "retensi_aktif",
                            sorter: "string"
                        },
                        {
                            title: "Retensi Inaktif",
                            field: "retensi_inaktif",
                            sorter: "string"
                        },
                        {
                            title: "Jumlah Retensi",
                            field: "jumlah_retensi",
                            sorter: "string"
                        },
                        {
                            title: "Nasib Akhir",
                            field: "nasib",
                            sorter: "string"
                        },
                        {
                            title: "Status Berkas",
                            field: "status",
                            sorter: "string"
                        }
                    ]
                });

                // Fungsi Export CSV
                document.getElementById("export-csv").addEventListener("click", function() {
                    table.download("csv", "daftar-arsip.csv");
                });

                // Fungsi Export XLSX
                document.getElementById("export-xlsx").addEventListener("click", function() {
                    table.download("xlsx", "daftar-arsip.xlsx", {
                        sheetName: "Daftar Arsip"
                    });
                });

                // Fungsi Export PDF
                document.getElementById("export-pdf").addEventListener("click", function() {
                    // Ambil data gambar Base64 dari server
                    fetch('/get-base64-image')
                        .then(response => response.json())
                        .then(data => {
                            let tableData = table.getData();

                            // Header kop surat dengan gambar di kiri dan teks di tengah
                            let kopSurat = {
                                columns: [{
                                        image: data.image, // Gambar Base64 yang diterima
                                        width: 50, // Ukuran lebar gambar
                                        height: 50, // Ukuran tinggi gambar
                                        alignment: "left", // Posisi gambar di kiri
                                        margin: [0, 0, 10,
                                            0
                                        ] // Margin kanan untuk memberi jarak dengan teks
                                    },
                                    {
                                        text: "DINAS KEARSIPAN KOTA MAGELANG\nAlamat: Jl. Contoh No. 123, Kota Magelang\nTelepon: (0293) 123456",
                                        style: "header",
                                        alignment: "center", // Posisi teks ke tengah
                                        margin: [0, 0, 0,
                                            20
                                        ] // Margin bawah untuk memberi ruang di bawah teks
                                    }
                                ],
                                columnGap: 10 // Menambahkan jarak antar kolom
                            };

                            // Kolom tabel (header) untuk PDF
                            let tableHeaders = [{
                                    text: "No",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Isi Berkas",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Tahun Berkas",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Masalah",
                                    style: "tableHeader"
                                },
                                {
                                    text: "kode_klasifikasi",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Retensi Aktif",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Retensi Inaktif",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Jumlah Retensi",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Nasib Akhir",
                                    style: "tableHeader"
                                },
                                {
                                    text: "Status Berkas",
                                    style: "tableHeader"
                                }
                            ];

                            // Isi tabel dari data
                            let tableBody = tableData.map((row, index) => [
                                index + 1,
                                row.isi_berkas || "-",
                                row.tahun_berkas || "-",
                                row.kategori || "-",
                                row.kode_klasifikasi || "-",
                                row.retensi_aktif || "-",
                                row.retensi_inaktif || "-",
                                row.jumlah_retensi || "-",
                                row.nasib || "-",
                                row.status || "-"
                            ]);

                            // Menyatukan header dan body tabel
                            let tableContent = {
                                table: {
                                    headerRows: 1,
                                    widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto",
                                        "auto", "auto"
                                    ], // Menyesuaikan ukuran kolom agar pas
                                    body: [tableHeaders, ...tableBody] // Menggabungkan header dan body
                                },
                                layout: "lightHorizontalLines" // Garis horizontal ringan
                            };

                            // Definisi dokumen PDF
                            let docDefinition = {
                                content: [kopSurat, tableContent],
                                styles: {
                                    header: {
                                        fontSize: 12,
                                        bold: true
                                    },
                                    tableHeader: {
                                        bold: true,
                                        fontSize: 10,
                                        color: "black"
                                    }
                                },
                                defaultStyle: {
                                    fontSize: 9
                                }
                            };

                            // Generate dan download PDF
                            pdfMake.createPdf(docDefinition).download("daftar_arsip.pdf");
                        })
                        .catch(err => console.error("Error fetching image: ", err)); // Menangani error
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <!-- Periksa Versi Tabulator -->
        <script>
            console.log("Tabulator version:", Tabulator.prototype.version);
        </script>
    </main>
@endsection
