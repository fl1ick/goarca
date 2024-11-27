@extends('layouts.main')

@section('content')
    <main>
        <!-- Tabel Tabulator -->
        <div class="mt-3" id="inaktif-table"></div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel (diambil dari controller)
            var inaktifs = @json($berkasinaktif);

            // Inisialisasi Tabulator
            var table = new Tabulator("#inaktif-table", {
                data: inaktifs, // Assign data from the controller
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 10,
                columns: [{
                        title: "No",
                        formatter: "rownum",
                        width: 100,
                        hozAlign: "center",
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
                        sorter: "string",
                    },
                    {
                        title: "Kategori",
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
                ],
            });

            // Fungsi Export CSV
            document.getElementById("export-csv").addEventListener("click", function() {
                table.download("csv", "jras-data.csv");
            });

            // Fungsi Export XLSX
            document.getElementById("export-xlsx").addEventListener("click", function() {
                table.download("xlsx", "jras-data.xlsx", {
                    sheetName: "JRAS Data"
                });
            });

            // Fungsi Export PDF
            document.getElementById("export-pdf").addEventListener("click", function() {
                // Data dari tabel untuk digunakan di PDF
                let tableData = table.getData();

                // Header kop surat
                let kopSurat = {
                    text: "DINAS KEARSIPAN KOTA MAGELANG\nAlamat: Jl. Contoh No. 123, Kota Magelang\nTelepon: (0293) 123456",
                    style: "header",
                    alignment: "center",
                    margin: [0, 0, 0, 20] // Margin bawah 20px
                };

                // Kolom tabel
                let tableHeaders = [{
                        text: "No",
                        style: "tableHeader"
                    },
                    {
                        text: "Kategori",
                        style: "tableHeader"
                    },
                    {
                        text: "Kode Klasifikasi",
                        style: "tableHeader"
                    },
                    {
                        text: "Klasifikasi",
                        style: "tableHeader"
                    },
                    {
                        text: "KKAD",
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
                        text: "Nasib",
                        style: "tableHeader"
                    }
                ];

                // Isi tabel dari data
                let tableBody = tableData.map((row, index) => [
                    index + 1,
                    row.kode_kategori,
                    row.kode_klasifikasi,
                    row.klasifikasi,
                    row.KKAD || "-",
                    row.retensi_aktif,
                    row.retensi_inaktif,
                    row.jumlah_retensi,
                    row.nasib
                ]);

                // Menyatukan header dan isi tabel
                let tableContent = {
                    table: {
                        headerRows: 1,
                        widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto",
                            "auto"
                        ], // Sesuaikan agar semua kolom muat
                        body: [tableHeaders, ...tableBody]
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
                pdfMake.createPdf(docDefinition).download("jras-data-with-kop-surat.pdf");
            });
        });
    </script>
@endsection
