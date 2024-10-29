@extends('layouts.main')

@section('content')
    <!-- Borderless Table -->
    <main>
        <div id="jras-table"></div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel (diambil dari controller)
            var JrasData = @json($jrasData);

            // Inisialisasi Tabulator
            var table = new Tabulator("#jras-table", {
                data: JrasData, // Assign data from the controller
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 10,
                columns: [{
                        title: "No",
                        field: "id",
                        sorter: "string"
                    },
                    {
                        title: "Kategori",
                        field: "kode_kategori",
                        sorter: "string"
                    },
                    {
                        title: "Kode Kategori",
                        field: "kode_klasifikasi",
                        sorter: "string"
                    },
                    {
                        title: "Klasifikasi",
                        field: "klasifikasi",
                        sorter: "string"
                    },
                    {
                        title: "KKAD",
                        field: "KKAD",
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
                        title: "Nasib",
                        field: "nasib",
                        sorter: "string"
                    },
                ],
            });

            // // Fungsi pencarian
            // function searchTable() {
            //     var searchValue = document.getElementById('search-input').value;
            //     table.setFilter([{
            //             field: "kode_kategori",
            //             type: "like",
            //             value: searchValue
            //         },
            //         {
            //             field: "kategori",
            //             type: "like",
            //             value: searchValue
            //         }
            //     ]);
            // }
        });
    </script>
    <!--/ Borderless Table -->
@endsection
