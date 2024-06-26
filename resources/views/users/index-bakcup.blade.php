<x-template.app-layout>
    <x-slot name="title">{{ __('Pengguna') }}</x-slot>

    <x-slot name="vendorCss">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    </x-slot>

    <x-slot name="pageCss">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    </x-slot>

    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top flex-fill">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Pengguna') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Pengguna') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title form-title">{{ __('Form Tambah Pengguna') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-vertical form-commodity" action="{{ route('users.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="my-1">
                                                <label class="form-label"
                                                    for="name">{{ __('Nama Lengkap') }}</label>

                                                <input type="text" class="form-control" name="name"
                                                    id="name">
                                                <span class="name_error text-danger"></span>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="email">{{ __('Alamat Email') }}</label>

                                                <input type="email" class="form-control" name="email"
                                                    id="email">
                                                <span class="email_error text-danger"></span>
                                            </div>

                                            <div class="my-1">
                                                <label class="form-label" for="password">{{ __('Kata Sandi') }}</label>

                                                <input type="password" class="form-control" name="password"
                                                    id="password">
                                                <span class="password_error text-danger"></span>
                                            </div>

                                            <div class="my-1">
                                                <label class="form-label"
                                                    for="password_confirmation">{{ __('Konfirmasi Kata Sandi') }}</label>

                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="password_confirmation">
                                                <span class="password_confirmation_error text-danger"></span>
                                            </div>

                                            <div class="my-1">
                                                <label class="form-label" for="role">{{ __('Hak Akses') }}</label>
                                                <select class="select2 form-select" name="role" id="role">
                                                    <option value="" selected disabled>
                                                        {{ __('Pilih Hak Akses ...') }}
                                                    </option>
                                                    <option value="3">
                                                        {{ __('Monitoring') }}
                                                    </option>
                                                    <option value="2">
                                                        {{ __('Admin Pasar') }}
                                                    </option>
                                                </select>
                                                <span class="role_error text-danger"></span>
                                            </div>

                                            <div class="my-1">
                                                <label class="form-label" for="market_id">{{ __('Pasar') }}</label>
                                                <select class="select2 form-select" name="market_id" id="market-id">
                                                    <option value="" selected disabled>
                                                        {{ __('Pilih Pasar ...') }}
                                                    </option>
                                                    @foreach ($market as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="market_id_error text-danger"></span>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-primary">
                                                    <i data-feather='save'></i> {{ __('Simpan') }}
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-cencel d-none">
                                                    <i data-feather='x-square'></i> {{ __('Batal') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Basic table -->
            <div class="col-md-8 col-12">
                <div class="card">
                    <table class="table text-nowrap" id="datatable-users">
                        <thead>
                            <tr>
                                <th>{{ __('Nama Pengguna') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Hak Akses') }}</th>
                                <th>{{ __('Pasar') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/ Basic table -->
        </div>
    </div>

    <x-slot name="pageVendorJs">
        <script src="{{ asset('assets/js/jquery-dateformat.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    </x-slot>

    <x-slot name="pageJs">
        <script>
            $(document).ready(function() {
                // init
                var table = $('#datatable-users').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    serverSide: true,
                    processing: true,
                    responsive: true,
                    ajax: {
                        url: "/users/json"
                    },
                    columns: [{
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
                            defaultContent: '-'
                        },
                        {
                            data: 'aksi',
                            name: 'aksi'
                        }
                    ],
                    dom: '<"card-header border-bottom p-2"<"head-label"><"dt-action-buttons text-end"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                });

                $('div.head-label').html('<h4 class="mb-0">Data Pengguna</h4>');
                $('.select2').select2();
                $('.flatpickr-basic').flatpickr({
                    dateFormat: 'd-m-Y'
                });

                function clearForm() {
                    $('.form-title').text('Form Tambah Pengguna');
                    $('form').trigger('reset');
                    $('.select2').val();
                    $('.select2').select2().trigger('change');
                    $('.btn-cencel').addClass('d-none');
                    $('form').attr('method', 'POST');
                    $('form').attr('action', '/users');
                }

                function clearError() {
                    console.log('clear error');
                    $('span.text-danger').text('');
                    $('input.is-invalid').removeClass('is-invalid');
                    $('select.is-invalid').removeClass('is-invalid');
                }

                $('form.form-commodity').on('submit', function(e) {
                    e.preventDefault();

                    const url = $(this).attr('action');
                    const method = $(this).attr('method');
                    const data = $(this).serialize();

                    $.ajax({
                        url,
                        type: method,
                        data: data,
                        success: function(result) {
                            if (result.success) {
                                clearForm();
                                clearError();
                                table.ajax.reload();

                                toastr.success(result.message, 'Sukses!', {
                                    closeButton: true,
                                    tapToDismiss: true,
                                    progressBar: true
                                });
                            } else {
                                clearError();
                                toastr.error(result.message, 'Error', {
                                    closeButton: true,
                                    tapToDismiss: true,
                                    progressBar: true
                                });
                            }
                        },
                        error: function(error) {
                            if (error.responseJSON.errors) {
                                $.each(error.responseJSON.errors, function(prefix, val) {
                                    $($('form')).find("span." + prefix + "_error").text(val[
                                        0]);
                                    $("input[name=" + prefix + "]").addClass('is-invalid');
                                });
                            } else {
                                toastr.error(error.statusText, 'Error', {
                                    closeButton: true,
                                    tapToDismiss: true,
                                    progressBar: true
                                });
                            }
                        }
                    });
                });

                // edit commodity
                $(document).on('click', '.btn-edit', function() {
                    clearForm();
                    clearError();
                    const id = $(this).attr('data-id');
                    const method = $(this).attr('data-method');
                    const url = $(this).attr('data-url');

                    $.ajax({
                        url: '/users/' + id + '/edit',
                        type: 'GET',
                        success: function(result) {
                            result = result.data;
                            $('form').attr('method', method);
                            $('form').attr('action', url);
                            console.log(url);
                            $('form select[name="role"]').val(result.role);
                            $('form select[name="role"]').select2().trigger(
                                'change');
                            $('form select[name="market_id"]').val(result.market_id);
                            $('form select[name="market_id"]').select2().trigger(
                                'change');
                            $('form input[name="name"]').val(result.name);
                            $('form input[name="name"]').focus();
                            $('form input[name="email"]').val(result.email);
                            $('form input[name="email"]').focus();
                            $('.form-title').text('Form Ubah Pengguna');
                            $('.btn-cencel').removeClass('d-none');
                        }
                    });
                });

                // cencel edit
                $(document).on('click', '.btn-cencel', function() {
                    clearForm();
                    clearError();
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
                                        toastr.success(result.message, 'Sukses!', {
                                            closeButton: true,
                                            tapToDismiss: true,
                                            progressBar: true
                                        });
                                        table.ajax.reload();
                                        clearForm();
                                        clearError();
                                    } else {
                                        toastr.error(result.message, 'Error');
                                    }
                                },
                                error: function(error) {
                                    toastr.error(error.statusText, 'Error');
                                }
                            })
                        }
                    });
                })
            });
        </script>
    </x-slot>
</x-template.app-layout>
