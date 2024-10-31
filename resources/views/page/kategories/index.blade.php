@extends('layouts.main')

@section('content')
    <main>
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
                columns: [{
                        title: "Kode Kategori", 
                        field: "kode",
                        sorter: "string"
                    },
                    {
                        title: "Kategori",
                        field: "kategori",
                        sorter: "string"
                    },
                ],
            });

            // Fungsi pencarian
            function searchTable() {
                var searchValue = document.getElementById('search-input').value;
                table.setFilter([{
                        field: "kode_kategori",
                        type: "like",
                        value: searchValue
                    },
                    {
                        field: "kategori",
                        type: "like",
                        value: searchValue
                    }
                ]);
            }
        });
    </script>
    <!-- Periksa apakah Tabulator di-load -->
    <script>
        console.log("Tabulator version:", Tabulator.prototype.version);
    </script>
@endsection
