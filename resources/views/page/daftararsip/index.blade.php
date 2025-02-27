@extends('layouts.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    <main>
        <div class="table-data">
            <div class="order">
                <h2>Daftar Arsip</h2>
                <!-- Filter Form -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="col g-3 align-items-center">
                            <div class="col-auto">
                                <label for="search-isi-berkas" class="col-form-label">Cari isi Berkas</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="search-isi-berkas" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="col g-3 align-items-center">
                            <div class="col-auto">
                                <label for="search-tahun-berkas" class="col-form-label">Cari Tahun Berkas</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" id="search-tahun-berkas" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="col g-3 align-items-center">
                            <div class="col-auto">
                                <label for="search-kategori" class="col-form-label">Cari Kategori Berkas</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="search-kategori" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="col g-3 align-items-center">
                            <div class="col-auto">
                                <label for="search-klasifikasi" class="col-form-label">Cari Klasifikasi Berkas</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="search-klasifikasi" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + Tambah Arsip
                    </button>
                </div>

                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
                    data-bs-backdrop="true" data-bs-keyboard="false" style="overflow:hidden">
                    <div class="modal-dialog modal-lg"> <!-- Gunakan modal-lg untuk ukuran lebih besar -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Arsip</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('arsip.store') }}" method="POST">
                                    @csrf
                                    <div class="p-2 bg-body rounded shadow-sm">
                                        <div class="row"> <!-- ROW UTAMA -->
                                            <div class="mb-3">
                                                <label for="isi_berkas" class="form-label">Isi Berkas:</label>
                                                <textarea class="form-control" name="isi_berkas" id="isi_berkas" rows="3" required></textarea>
                                            </div>
                                            <!-- KOLOM Atas -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tahun_berkas" class="form-label">Tahun Berkas:</label>
                                                    <input class="form-control" type="date" name="tahun_berkas"
                                                        id="tahun_berkas" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori:</label>
                                                    <select name="kategori" id="kategori" class="form-control" required>
                                                        <option value="">--Pilih Kategori--</option>
                                                        @foreach ($kategories as $kategori)
                                                            <option value="{{ $kategori->kode }}">{{ $kategori->kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Kolom Spesial Order -->
                                            <div class="mb-3">
                                                <label for="klasifikasi" class="form-label">Klasifikasi:</label>
                                                <select name="klasifikasi" id="klasifikasi" class="form-control select2"
                                                    style="width:100%!important;" required>
                                                    <option value="">--Pilih Klasifikasi--</option>
                                                </select>
                                            </div>

                                            <!-- KOLOM Bawah -->
                                            <div class="col-md-6">
                                                <!-- Input Hidden -->
                                                <input type="hidden" name="klasifikasi_hidden" id="klasifikasi_hidden">
                                                <div class="mb-3">
                                                    <label for="kode_klasifikasi" class="form-label">Kode
                                                        Klasifikasi:</label>
                                                    <input class="form-control" type="text" name="kode_klasifikasi"
                                                        id="kode_klasifikasi" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="retensi_aktif" class="form-label">Retensi Aktif:</label>
                                                    <input class="form-control" type="number" name="retensi_aktif"
                                                        id="retensi_aktif" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nasib" class="form-label">Nasib:</label>
                                                    <input class="form-control" type="text" name="nasib"
                                                        id="nasib" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="retensi_inaktif" class="form-label">Retensi
                                                        Inaktif:</label>
                                                    <input class="form-control" type="number" name="retensi_inaktif"
                                                        id="retensi_inaktif" readonly>
                                                </div>
                                            </div>
                                            <!-- Kolom Footer -->
                                            <div class="mb-3">
                                                <label for="jumlah_retensi" class="form-label">Jumlah Retensi:</label>
                                                <input class="form-control" type="number" name="jumlah_retensi"
                                                    id="jumlah_retensi" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="unit_olah" class="form-label">Unit Olah:</label>
                                                <input type="text" class="form-control" name="unit_olah"
                                                    id="unit_olah" placeholder="Masukkan unit olah" required>
                                            </div>
                                        </div> <!-- END ROW -->

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

                <div class="mt-3">
                    <!-- Tombol Export -->
                    <div class="mb-3">
                        <button class="btn btn-primary" id="export-csv">Export CSV</button>
                        <button class="btn btn-warning" id="export-xlsx">Export XLSX</button>
                        <button class="btn btn-danger" id="export-pdf">Export PDF</button>
                    </div>

                    <!-- Tabel Daftar Arsip -->
                    <div id="arsip-table"></div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

            // Inisialisasi Select2

            $('#klasifikasi').select2({
                dropdownParent: $('#exampleModal')
            });

            // Mengisi otomatis berdasarkan klasifikasi yang dipilih
            $('#klasifikasi').on('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById('kode_klasifikasi').value = selectedOption
                    .value; // Tetap mengambil kode klasifikasi
                document.getElementById('klasifikasi_hidden').value = selectedOption.getAttribute(
                    'data-klasifikasi'); // Simpan nama klasifikasi ke hidden input
                document.getElementById('retensi_aktif').value = selectedOption.getAttribute(
                    'data-retensi-aktif');
                document.getElementById('retensi_inaktif').value = selectedOption.getAttribute(
                    'data-retensi-inaktif');
                document.getElementById('jumlah_retensi').value = selectedOption.getAttribute(
                    'data-jumlah-retensi');
                document.getElementById('nasib').value = selectedOption.getAttribute('data-nasib');
            });
        </script>
        {{-- <script>
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
        </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Data dari Laravel (diambil dari controller)
                var arsips = @json($daftararsip);

                console.log('Data : ', arsips);

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
                            field: "klasifikasi",
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
                        },
                        {
                            title: "Unit Olah",
                            field: "unit_olah",
                            sorter: "string"
                        }
                    ]
                });

                // Pencarian Isi Berkas
                document.getElementById("search-isi-berkas").addEventListener("input", function(e) {
                    let value = e.target.value;
                    table.setFilter("isi_berkas", "like", value);
                });

                // Pencarian Tahun Berkas
                document.getElementById("search-tahun-berkas").addEventListener("input", function(e) {
                    let value = e.target.value;
                    table.setFilter("tahun_berkas", "like", value);
                });

                // Pencarian Kategori
                document.getElementById("search-kategori").addEventListener("input", function(e) {
                    let value = e.target.value;
                    table.setFilter("kategori", "like", value);
                });

                // Pencarian Klasifikasi
                document.getElementById("search-klasifikasi").addEventListener("input", function(e) {
                    let value = e.target.value;
                    table.setFilter("klasifikasi", "like", value);
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
                    fetch('/get-base64-image')
                        .then(response => response.json())
                        .then(data => {
                            let tableData = table.getData();

                            // Header kop surat dengan logo di kiri dan teks di tengah
                            let kopSurat = {
                                columns: [{
                                        image: data.image, // Menggunakan Base64 dari Laravel
                                        width: 80, // Ukuran gambar lebih proporsional
                                        height: 80,
                                        alignment: "center"
                                    },
                                    {
                                        stack: [{
                                                text: "PEMERINTAH KOTA MAGELANG",
                                                style: "kopJudul"
                                            },
                                            {
                                                text: "DINAS KEARSIPAN",
                                                style: "kopSubjudul"
                                            },
                                            {
                                                text: "Jl. Contoh No. 123, Kota Magelang",
                                                style: "kopAlamat"
                                            },
                                            {
                                                text: "Telepon: (0293) 123456 | Fax: (0293) 361775",
                                                style: "kopAlamat"
                                            },
                                            {
                                                text: "MAGELANG 56117",
                                                style: "kopAlamat"
                                            }
                                        ],
                                        alignment: "center",
                                        margin: [0, 10, 0, 0]
                                    }
                                ],
                                columnGap: 10,
                                margin: [0, 0, 0, 8]
                            };

                            // Garis bawah
                            let garisBawah = {
                                canvas: [{
                                    type: "line",
                                    x1: 0,
                                    y1: 0,
                                    x2: 800,
                                    y2: 0,
                                    lineWidth: 2
                                }],
                                margin: [0, 0, 0, 10]
                            };

                            // Header tabel
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
                                    text: "Kode Klasifikasi",
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
                                },
                                {
                                    text: "Unit Olah",
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
                                row.status || "-",
                                row.unit_olah || "-"
                            ]);

                            // Menyatukan header dan body tabel
                            let tableContent = {
                                table: {
                                    headerRows: 1,
                                    widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto",
                                        "auto", "auto", "auto"
                                    ],
                                    body: [tableHeaders, ...tableBody]
                                },
                                layout: "lightHorizontalLines"
                            };

                            // Definisi dokumen PDF
                            let docDefinition = {
                                pageOrientation: "landscape",
                                content: [kopSurat, garisBawah, tableContent],
                                styles: {
                                    kopJudul: {
                                        fontSize: 14,
                                        bold: true,
                                        alignment: "center"
                                    },
                                    kopSubjudul: {
                                        fontSize: 12,
                                        bold: true,
                                        alignment: "center"
                                    },
                                    kopAlamat: {
                                        fontSize: 10,
                                        alignment: "center"
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
                        .catch(err => console.error("Error fetching image: ", err));
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    </main>
@endsection
