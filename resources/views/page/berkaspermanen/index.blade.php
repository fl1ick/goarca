@extends('layouts.main')

@section('content')
    <main>
        <div class="mt-3">
            <!-- Export Buttons -->
            <div class="mb-3">
                <button class="btn btn-primary" id="export-csv">Export CSV</button>
                <button class="btn btn-warning" id="export-xlsx">Export XLSX</button>
                <button class="btn btn-danger" id="export-pdf">Export PDF</button>
            </div>
            <!-- Tabel Tabulator -->
            <div id="permanen-table"></div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Data from Laravel (taken from the controller)
    var permanen = @json($berkasPermanen);

    // Initialize Tabulator
    var table = new Tabulator("#permanen-table", {
        data: permanen, // Assign data from the controller
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

    // Export CSV function
    document.getElementById("export-csv").addEventListener("click", function() {
        table.download("csv", "berkas-permanen.csv");
    });

    // Export XLSX function
    document.getElementById("export-xlsx").addEventListener("click", function() {
        table.download("xlsx", "berkas-permanen.xlsx", {
            sheetName: "Berkas Aktif Data"
        });
    });

    // Export PDF function
    document.getElementById("export-pdf").addEventListener("click", function() {
        let tableData = table.getData();

        // Header of the letterhead
        let kopSurat = {
            text: "DINAS KEARSIPAN KOTA MAGELANG\nAlamat: Jl. Contoh No. 123, Kota Magelang\nTelepon: (0293) 123456",
            style: "header",
            alignment: "center",
            margin: [0, 0, 0, 20] // Bottom margin of 20px
        };

        // Table column headers
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


        // Table content from the data
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

        // Combine header and table body
        let tableContent = {
            table: {
                headerRows: 1,
                widths: [30, "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto"], // Adjust widths for all columns
                body: [tableHeaders, ...tableBody]
            },
            layout: "lightHorizontalLines" // Light horizontal lines for the table layout
        };

        // PDF document definition
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

        // Generate and download PDF
        pdfMake.createPdf(docDefinition).download("berkas_permanen.pdf");
    });
});

    </script>

    <!-- External JS libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>
@endsection
