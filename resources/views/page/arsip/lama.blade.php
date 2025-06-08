@extends('layouts.main')

@section('content')
<main>
    <div class="mt-3">
        <h4>Data Arsip Lama</h4>
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

        <!-- Tombol Export -->
        <div class="mb-3">
            <button class="btn btn-primary" id="export-csv">Export CSV</button>
            <button class="btn btn-warning" id="export-xlsx">Export XLSX</button>
            <button class="btn btn-danger" id="export-pdf">Export PDF</button>
        </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        var dataLama = @json($arsip);

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
                { title: "Unit Olah", field: "unit_olah", sorter: "string" }
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

        document.getElementById("export-csv").addEventListener("click", function () {
            table.download("csv", "berkas-lama.csv");
        });

        document.getElementById("export-xlsx").addEventListener("click", function () {
            table.download("xlsx", "berkas-lama.xlsx", { sheetName: "Arsip Lama" });
        });

        document.getElementById("export-pdf").addEventListener("click", function () {
            table.download("pdf", "berkas-lama.pdf", {
                orientation: "landscape",
                title: "Data Arsip Lama"
            });
        });
    });
</script>

<!-- External JS for export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>
@endsection
