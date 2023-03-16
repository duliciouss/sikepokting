@extends('layouts.app')

@section('title', 'Pengguna')

@section('vendorCss')
    @parent
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pengguna</h4>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Form Tambah Pengguna</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form class="form-stock" action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukan nama lengkap" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukan alamat email" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan kata sandi" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Masukan konfirmasi kata sandi" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="role">Hak Akses</label>
                                <select id="role" class="select2 form-select" name="role">
                                    <option value="2">Admin Pasar</option>
                                    <option value="3">Monitoring</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="menu-icon tf-icons ti ti-device-floppy"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <!-- DataTable -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th>Pasar</th>
                                    <th> <i class="menu-icon tf-icons ti ti-settings"></i> </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorJs')
    @parent
    <script src="{{ asset('template/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
@endsection

@section('pageJs')
    @parent
    <script>
        $(".select2").select2();
        $('.flatpickr-basic').flatpickr({
            dateFormat: 'd-m-Y',
            altInput: true,
            plugins: [new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m-d",
                altFormat: "M Y"
            })]
        });

        var table = $('.datatables-basic').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            serverSide: true,
            processing: true,
            // responsive: true,
            ajax: {
                url: "/users/json"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'market.name',
                    name: 'market.name',
                    defaultContent: "-",
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ]
        });

        $('form.form-stock').on('submit', function(e) {
            e.preventDefault();

            const url = $(this).attr('action');
            const method = $(this).attr('method');

            $.ajax({
                url,
                type: method,
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.success) {
                        // clearForm();
                        // clearError();

                        table.ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan.',
                            showConfirmButton: false,
                            timer: 1500,
                            buttonsStyling: false
                        });
                    } else {
                        // clearError();

                        Swal.fire({
                            icon: 'error',
                            title: 'Telah terjadi kesalahan.',
                            showConfirmButton: false,
                            timer: 1500,
                            buttonsStyling: false
                        });
                    }
                },
                error: function(error) {
                    if (error.responseJSON) {
                        $.each(error.responseJSON.errors, function(prefix, val) {
                            $('form#form-information').find('span.' + prefix + '_error').text(
                                val[0]);
                            $('input[name=' + prefix + ']').addClass('is-invalid');
                            $('select[name=' + prefix + ']').addClass('is-invalid');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Telah terjadi kesalahan.',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            console.log(id);
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang sudah dihapus tidak akan kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/users/' + id,
                        method: 'delete',
                        success: function(result) {
                            if (result.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data berhasil dihapus.',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                                table.ajax.reload();
                            } else {
                                toastr.error(result.message, 'Error');
                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Telah terjadi kesalahan.',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    })
                }
            });
        });
    </script>
@endsection
