@extends('layouts.main')

@section('content')
<main>
    <div class="mt-3">
        <h4>Data Arsip Lama</h4>
        <div class="row">
            <div class="col-sm-3">
                <label for="search-isi-berkas" class="form-label">Cari Isi Berkas</label>
                <input type="text" id="search-isi-berkas" class="form-control">
            </div>
            <div class="col-sm-3">
                <label for="search-tahun-berkas" class="form-label">Cari Tahun Berkas</label>
                <input type="date" id="search-tahun-berkas" class="form-control">
            </div>
            <div class="col-sm-3">
                <label for="search-kategori" class="form-label">Cari Kategori Berkas</label>
                <input type="text" id="search-kategori" class="form-control">
            </div>
            <div class="col-sm-3">
                <label for="search-klasifikasi" class="form-label">Cari Klasifikasi Berkas</label>
                <input type="text" id="search-klasifikasi" class="form-control">
            </div>

            <!-- Filter Jangka Waktu -->
            <div class="col-sm-3 mt-3">
                <label for="start-date" class="form-label">Mulai Tanggal</label>
                <input type="date" id="start-date" class="form-control">
            </div>
            <div class="col-sm-3 mt-3">
                <label for="end-date" class="form-label">Sampai Tanggal</label>
                <input type="date" id="end-date" class="form-control">
            </div>
        </div>

        <!-- Tombol Export -->
        <div class="my-3">
            <button class="btn btn-primary" id="export-csv">Export CSV</button>
            <button class="btn btn-warning" id="export-xlsx">Export XLSX</button>
            <button class="btn btn-danger" id="export-pdf">Export PDF</button>
        </div>

        <!-- Hapus Semua -->
        <div class="mb-3">
            <form id="form-delete-all" action="{{ route('arsip.lama.deleteAll') }}" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
            <button type="button" class="btn btn-danger" id="btn-delete-all">Hapus Semua Data</button>
        </div>

        <!-- Tabel Tabulator -->
        <div id="lama-table"></div>
    </div>
</main>

<script>
    document.getElementById("btn-delete-all").addEventListener("click", function () {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Semua data arsip lama akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus semua!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-all').submit();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var dataLama = @json($arsip);

        // Format tanggal agar cocok jika belum diformat di controller
        dataLama = dataLama.map(row => {
            row.created_at = row.created_at ? row.created_at.substring(0, 10) : null;
            return row;
        });

        var table = new Tabulator("#lama-table", {
            data: dataLama,
            layout: "fitColumns",
            pagination: "local",
            paginationSize: 10,
            columns: [
                { title: "No", formatter: "rownum", width: 70, hozAlign: "center" },
                { title: "Isi Berkas", field: "isi_berkas", sorter: "string", width: 300 },
                { title: "Tahun Berkas", field: "tahun_berkas", sorter: "string" },
                { title: "Kategori", field: "kategori", sorter: "string" },
                { title: "Kode Klasifikasi", field: "kode_klasifikasi", sorter: "string" },
                { title: "Klasifikasi", field: "klasifikasi", sorter: "string" },
                { title: "Retensi Aktif", field: "retensi_aktif", sorter: "string" },
                { title: "Retensi Inaktif", field: "retensi_inaktif", sorter: "string" },
                { title: "Jumlah Retensi", field: "jumlah_retensi", sorter: "string" },
                { title: "Nasib", field: "nasib", sorter: "string" },
                { title: "Status", field: "status", sorter: "string" },
                { title: "Unit Olah", field: "unit_olah", sorter: "string" },
                { title: "Tanggal Dibuat", field: "created_at", sorter: "date", hozAlign: "center" }
            ]
        });

        // Fungsi Filter
        function applyFilter() {
            table.clearFilter(true);

            let filters = [
                { id: "search-isi-berkas", field: "isi_berkas", type: "like" },
                { id: "search-tahun-berkas", field: "tahun_berkas", type: "like" },
                { id: "search-kategori", field: "kategori", type: "like" },
                { id: "search-klasifikasi", field: "klasifikasi", type: "like" }
            ];

            filters.forEach(f => {
                let value = document.getElementById(f.id).value;
                if (value) table.addFilter(f.field, f.type, value);
            });

            // Filter jangka waktu created_at
            let start = document.getElementById("start-date").value;
            let end = document.getElementById("end-date").value;

            if (start && end) {
                table.addFilter("created_at", ">=", start);
                table.addFilter("created_at", "<=", end);
            } else if (start) {
                table.addFilter("created_at", ">=", start);
            } else if (end) {
                table.addFilter("created_at", "<=", end);
            }
        }

        // Event Listeners
        ["search-isi-berkas", "search-tahun-berkas", "search-kategori", "search-klasifikasi", "start-date", "end-date"]
            .forEach(id => document.getElementById(id).addEventListener("input", applyFilter));

        // Export
        document.getElementById("export-csv").addEventListener("click", () => table.download("csv", "berkas-lama.csv"));
        document.getElementById("export-xlsx").addEventListener("click", () => table.download("xlsx", "berkas-lama.xlsx", { sheetName: "Arsip Lama" }));
        document.getElementById("export-pdf").addEventListener("click", () =>
            table.download("pdf", "berkas-lama.pdf", {
                orientation: "landscape",
                title: "Data Arsip Lama"
            })
        );
    });
</script>

<!-- Eksternal JS untuk Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>
@endsection
