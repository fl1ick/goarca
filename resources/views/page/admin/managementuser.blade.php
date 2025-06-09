@extends('layouts.main')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <main>
        <h2 class="mb-4">Daftar Pengguna</h2>
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Tambah Pengguna
            </button>
        </div>
        <div id="users-table"></div>

        <!-- Modal Add User -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:hidden">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('storeuser') }}" method="POST">
                            @csrf
                            <div class="p-2 bg-body rounded shadow-sm">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="Email" class="form-label">Email:</label>
                                        <input class="form-control" type="email" name="email" id="Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Name" class="form-label">Username:</label>
                                        <input class="form-control" type="text" name="name" id="Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role:</label>
                                        <select class="form-select" name="role" id="Role" required>
                                            <option selected>Select Role</option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal User Created -->
        <div class="modal fade" id="userCreatedModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false" style="overflow:hidden">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border border-success">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengguna Berhasil Ditambahkan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <p><strong>Username:</strong> <span id="created-username" class="me-2"></span></p>
                            <p><strong>Token:</strong> <span id="created-token" class="me-2"></span></p>
                            <button id="copy-created" class="btn btn-outline-success btn-sm">
                                <i class="bx bx-copy"></i> Salin Semua
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="fw-bold text-success">Berikan Username & Token ini ke pengguna untuk proses registrasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Reset user -->
        <div class="modal fade" id="resetTokenModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false" style="overflow:hidden">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border border-primary">
                    <div class="modal-header">
                        <h5 class="modal-title">Token Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <p><strong>Username:</strong> <span id="modal-username" class="me-2"></span></p>
                            <p><strong>Token:</strong> <span id="modal-token" class="me-2"></span></p>
                            <button id="copy-all" class="btn btn-outline-primary btn-sm">
                                <i class="bx bx-copy"></i> Salin Semua
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="fw-bold text-danger">Berikan Username & Token ini ke pengguna untuk proses registrasi
                            ulang.</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end', // Pojok kanan atas
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#f0f9f0', // Warna background notifikasi
                color: '#1c7430', // Warna teks
            });
        @endif

        @if (session('created_username') && session('created_token'))
            window.onload = function() {
                document.getElementById('created-username').textContent = "{{ session('created_username') }}";
                document.getElementById('created-token').textContent = "{{ session('created_token') }}";

                var createdModal = new bootstrap.Modal(document.getElementById('userCreatedModal'));
                createdModal.show();
            };
        @endif


        @if ($errors->any())
            Swal.fire({
                toast: true,
                position: 'top-end', // Pojok kanan atas
                icon: 'error',
                title: '{{ $errors->first() }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#fef2f2', // Warna background notifikasi
                color: '#b91c1c', // Warna teks
            });
        @endif

        @if (session('reset_username') && session('reset_token'))
            window.onload = function() {
                document.getElementById('modal-username').textContent = "{{ session('reset_username') }}";
                document.getElementById('modal-token').textContent = "{{ session('reset_token') }}";

                var resetModal = new bootstrap.Modal(document.getElementById('resetTokenModal'));
                resetModal.show();
            };
        @endif
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel (diambil dari controller)
            var users = @json($users);

            console.log('Data : ', users);

            // Inisialisasi Tabulator
            var table = new Tabulator("#users-table", {
                data: users, // Assign data from the controller
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 10,
                columns: [{
                        title: "No",
                        formatter: "rownum",
                        width: 75,
                        hozAlign: "center"
                    },
                    {
                        title: "Username",
                        field: "name",
                        sorter: "string",
                        width: 300
                    },
                    {
                        title: "Email",
                        field: "email",
                        sorter: "string"
                    },
                    {
                        title: "Role",
                        field: "role",
                        sorter: "string"
                    },
                    {
                        title: "Status Registrasi",
                        field: "registration_status",
                        sorter: "string",
                        width: 200,
                        formatter: function(cell, formatterParams, onRendered) {
                            const value = cell.getValue();
                            if (value === 1 || value === "1") {
                                return `<span class="badge bg-success">Selesai</span>`;
                            } else {
                                return `<span class="badge bg-warning">Belum Selesai</span>`;
                            }
                        }
                    },
                    {
                        title: "Aksi",
                        width: 200,
                        formatter: function(cell, formatterParams, onRendered) {
                            const userId = cell.getRow().getData().id;
                            return `<button class="btn btn-warning btn-sm" onclick="confirmReset(${userId})">Reset Password</button>`;
                        }
                    }

                ]
            });
        });
    </script>

    <script>
        function confirmReset(userId) {
            Swal.fire({
                title: 'Reset Password?',
                text: 'Apakah Anda yakin ingin mereset password pengguna ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Reset!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/user/reset-password/${userId}`;
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyAllBtn = document.getElementById('copy-all');

            if (copyAllBtn) {
                copyAllBtn.addEventListener('click', function() {
                    const username = document.getElementById('modal-username').textContent.trim();
                    const token = document.getElementById('modal-token').textContent.trim();

                    const fullText = `Username: ${username}\nToken: ${token}`;

                    navigator.clipboard.writeText(fullText).then(() => {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Username & Token disalin!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const copyCreatedBtn = document.getElementById('copy-created');

            if (copyCreatedBtn) {
                copyCreatedBtn.addEventListener('click', function() {
                    const username = document.getElementById('created-username').textContent.trim();
                    const token = document.getElementById('created-token').textContent.trim();

                    const fullText = `Username: ${username}\nToken: ${token}`;

                    navigator.clipboard.writeText(fullText).then(() => {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Username & Token disalin!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                });
            }
        });
    </script>
@endsection
