@extends('layouts.main')

@section('content')
    <main>
        <!-- Tombol Export -->
        <div class="mb-3">
            <button class="btn btn-primary" id="export-csv">Export CSV</button>
            <button id="export-xlsx" class="btn btn-success">Export XLSX</button>
            <button id="export-pdf" class="btn btn-danger">Export PDF</button>
        </div>

        <!-- Tabel Tabulator -->
        <div id="kategori-table"></div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel (diambil dari controller)
            var kategoriData = @json($kategories->items());

            // Inisialisasi Tabulator
            var table = new Tabulator("#kategori-table", {
                data: kategoriData, // Assign data from the controller
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 10,
                columns: [
                    { title: "Kode Kategori", field: "kode", sorter: "string" },
                    { title: "Kategori", field: "kategori", sorter: "string" },
                ],
            });

            // Fungsi Export CSV
            document.getElementById("export-csv").addEventListener("click", function() {
                table.download("csv", "kategori-data.csv");
            });

            // Fungsi Export XLSX
            document.getElementById("export-xlsx").addEventListener("click", function() {
                table.download("xlsx", "kategori-data.xlsx", { sheetName: "Kategori Data" });
            });

            // Fungsi Export PDF dengan Kop Surat
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
                    { text: "Kode Kategori", style: "tableHeader" },
                    { text: "Kategori", style: "tableHeader" }
                ];

                // Isi tabel dari data
                let tableBody = tableData.map((row) => [
                    row.kode,  // Kode Kategori
                    row.kategori // Kategori
                ]);

                // Menyatukan header dan isi tabel
                let tableContent = {
                    table: {
                        headerRows: 1,
                        widths: ["*", "*"], // Ukuran kolom
                        body: [tableHeaders, ...tableBody]
                    },
                    layout: "lightHorizontalLines" // Garis horizontal ringan
                };

                // Definisi dokumen PDF
                let docDefinition = {
                    content: [kopSurat, tableContent],
                    pageOrientation: "portrait", // Atau "landscape"
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
                pdfMake.createPdf(docDefinition).download("kategori-data-with-kop-surat.pdf");
            });
        });
    </script>

    <!-- Tambahkan Library Tambahan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Periksa Versi Tabulator -->
    <script>
        console.log("Tabulator version:", Tabulator.prototype.version);
    </script>
@endsection
