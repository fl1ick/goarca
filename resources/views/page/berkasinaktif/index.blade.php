@extends('layouts.main')

@section('content')
    <main>
        <!-- Tabel Tabulator -->
        <div class="mt-3" >
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
                columns: [
                    {title: "No", formatter: "rownum", width: 100, hozAlign: "center"},
                    {title: "Isi Berkas", field: "isi_berkas", sorter: "string", width: 300},
                    {title: "Tahun Berkas", field: "tahun_berkas", sorter: "string"},
                    {title: "Kategori", field: "kategori", sorter: "string"},
                    {title: "Kode Klasifikasi", field: "kode_klasifikasi", sorter: "string"},
                    {title: "Klasifikasi", field: "klasifikasi", sorter: "string"},
                    {title: "Retensi Aktif", field: "retensi_aktif", sorter: "string"},
                    {title: "Retensi Inaktif", field: "retensi_inaktif", sorter: "string"},
                    {title: "Jumlah Retensi", field: "jumlah_retensi", sorter: "string"},
                    {title: "Nasib Akhir", field: "nasib", sorter: "string"},
                    {title: "Status Berkas", field: "status", sorter: "string"}
                ]
            });

            // Fungsi Export CSV
            document.getElementById("export-csv").addEventListener("click", function() {
                table.download("csv", "berkas-inaktif.csv");
            });

            // Fungsi Export XLSX
            document.getElementById("export-xlsx").addEventListener("click", function() {
                table.download("xlsx", "berkas-inaktif.xlsx", {sheetName: "Berkas Inaktif"});
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
                let tableHeaders = [
                    {text: "No", style: "tableHeader"},
                    {text: "Isi Berkas", style: "tableHeader"},
                    {text: "Tahun Berkas", style: "tableHeader"},
                    {text: "Kategori", style: "tableHeader"},
                    {text: "Kode Klasifikasi", style: "tableHeader"},
                    {text: "Retensi Aktif", style: "tableHeader"},
                    {text: "Retensi Inaktif", style: "tableHeader"},
                    {text: "Jumlah Retensi", style: "tableHeader"},
                    {text: "Nasib Akhir", style: "tableHeader"},
                    {text: "Status Berkas", style: "tableHeader"}
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

                // Menyatukan header dan isi tabel
                let tableContent = {
                    table: {
                        headerRows: 1,
                        widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto"], // Sesuaikan agar semua kolom muat
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
                pdfMake.createPdf(docDefinition).download("berkas_inaktif.pdf");
            });
        });
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>
@endsection
