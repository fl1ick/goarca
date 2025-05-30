@extends('layouts.main')

@section('content')
    <main>
        <!-- Tabel Tabulator -->
        <div class="mt-3">
            <div class="mb-3">
                <button class="btn btn-primary" id="export-csv">Export CSV</button>
                <button class="btn btn-warning" id="export-xlsx">Export XLSX</button>
                <button class="btn btn-danger" id="export-pdf">Export PDF</button>
            </div>
            <div id="inaktif-table"></div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel (diambil dari controller)
            var musnah = @json($berkasinaktif);

            // Inisialisasi Tabulator
            var table = new Tabulator("#inaktif-table", {
                data: musnah, // Assign data from the controller
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
                        title: "Kategori",
                        field: "kategori",
                        sorter: "string"
                    },
                    {
                        title: "Kode Klasifikasi",
                        field: "kode_klasifikasi",
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

            // Fungsi Export CSV
            document.getElementById("export-csv").addEventListener("click", function() {
                table.download("csv", "berkas-inaktif.csv");
            });

            // Fungsi Export XLSX
            document.getElementById("export-xlsx").addEventListener("click", function() {
                table.download("xlsx", "berkas-inaktif.xlsx", {
                    sheetName: "Berkas Inaktif"
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
                            table: {
                                widths: ["auto", "*", "auto"], // Logo kiri, teks tetap di tengah
                                body: [
                                    [{
                                            image: data.image,
                                            fit: [80, 80],
                                            alignment: "left"
                                        },
                                        {
                                            stack: [{
                                                    text: "PEMERINTAH KOTA MAGELANG",
                                                    style: "kopJudul"
                                                },
                                                {
                                                    text: "DINAS PERPUSTAKAAN DAN KEARSIPAN",
                                                    style: "kopJudul"
                                                },
                                                {
                                                    text: "Jl. Kartini No.4, Kec. Magelang Tengah",
                                                    style: "kopAlamat"
                                                },
                                                {
                                                    text: "Telepon: (0293) 123456 | Fax: (0293) 361775",
                                                    style: "kopAlamat"
                                                },
                                                {
                                                    text: "MAGELANG JAWA TENGAH 56121",
                                                    style: "kopAlamat"
                                                }
                                            ],
                                            margin: [-70, 0, 0, 0]
                                        },
                                        {
                                            text: "", // Kolom kosong agar teks tidak terdorong
                                            alignment: "right"
                                        }
                                    ]
                                ]
                            },
                            layout: "noBorders",
                            margin: [0, 0, 0, 8]
                        };

                        // Garis bawah
                        let garisBawah = {
                            canvas: [{
                                type: "line",
                                x1: 0,
                                y1: 0,
                                x2: 762,
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
                                text: "Kode Klasifikasi",
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
                            row.kode_klasifikasi || "-",
                            row.isi_berkas || "-",
                            row.tahun_berkas || "-",
                            row.kategori || "-",
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
                        pdfMake.createPdf(docDefinition).download("berkasinaktif.pdf");
                    })
                    .catch(err => console.error("Error fetching image: ", err));
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>
@endsection
