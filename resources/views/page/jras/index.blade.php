@extends('layouts.main')

@section('content')
    <!-- Borderless Table -->
    <main>
        <!-- Tombol Export -->
        <div class="mb-3">
            <button class="btn btn-primary" id="export-csv">Export CSV</button>
            <button id="export-xlsx" class="btn btn-success">Export XLSX</button>
            <button id="export-pdf" class="btn btn-danger">Export PDF</button>
        </div>

        <!-- Tabel Tabulator -->
        <div id="jras-table"></div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Data dari Laravel (diambil dari controller)
    var JrasData = @json($jrasData);

    // Map kode_kategori ke nama kategori
    function mapKategori(kode) {
        const kategoriMap = {
            '000': 'Umum',
            '100': 'Pemerintahan',
            '200': 'Politik',
            '300': 'Keamanan dan Ketertiban',
            '400': 'Kesejahteraan Rakyat',
            '500': 'Perekonomian',
            '600': 'Pekerjaan Umum dan Ketenagaan',
            '700': 'Pengawasan',
            '800': 'Kepegawaian',
            '900': 'Keuangan'
        };
        return kategoriMap[kode] || 'Tidak Diketahui'; // Default jika kode tidak dikenali
    }

    // Inisialisasi Tabulator
    var table = new Tabulator("#jras-table", {
        data: JrasData, // Assign data from the controller
        layout: "fitColumns",
        pagination: "local",
        paginationSize: 10,
        columns: [
            { title: "No", field: "id", sorter: "string" },
            { title: "Kode Kategori", field: "kode_kategori", sorter: "string", formatter: function(cell) {
                return mapKategori(cell.getValue()); // Mengubah kode menjadi nama kategori
            }},
            { title: "Kode Klasifikasi", field: "kode_klasifikasi", sorter: "string" },
            { title: "Klasifikasi", field: "klasifikasi", sorter: "string" },
            { title: "KKAD", field: "KKAD", sorter: "string" },
            { title: "Retensi Aktif", field: "retensi_aktif", sorter: "string" },
            { title: "Retensi Inaktif", field: "retensi_inaktif", sorter: "string" },
            { title: "Jumlah Retensi", field: "jumlah_retensi", sorter: "string" },
            { title: "Nasib", field: "nasib", sorter: "string" },
        ],
    });

    // Fungsi Export CSV
    document.getElementById("export-csv").addEventListener("click", function() {
        table.download("csv", "jras-data.csv");
    });

    // Fungsi Export XLSX
    document.getElementById("export-xlsx").addEventListener("click", function() {
        table.download("xlsx", "jras-data.xlsx", { sheetName: "JRAS Data" });
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
            { text: "No", style: "tableHeader" },
            { text: "Kategori", style: "tableHeader" },
            { text: "Kode Klasifikasi", style: "tableHeader" },
            { text: "Klasifikasi", style: "tableHeader" },
            { text: "KKAD", style: "tableHeader" },
            { text: "Retensi Aktif", style: "tableHeader" },
            { text: "Retensi Inaktif", style: "tableHeader" },
            { text: "Jumlah Retensi", style: "tableHeader" },
            { text: "Nasib", style: "tableHeader" }
        ];

        // Isi tabel dari data
        let tableBody = tableData.map((row, index) => [
            index + 1,
            mapKategori(row.kode_kategori), // Menggunakan fungsi untuk konversi kode ke nama kategori
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
                widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto"], // Sesuaikan agar semua kolom muat
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

    <!-- Tambahkan Library Tambahan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <!--/ Borderless Table -->
@endsection
