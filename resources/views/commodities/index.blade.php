<x-template.app-layout>
    <x-slot name="title">{{ __('Komoditas') }}</x-slot>

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
                    <h2 class="content-header-title float-start mb-0">{{ __('Komoditas') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Komoditas') }}
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
                                <h4 class="card-title form-title">{{ __('Form Tambah Komoditas') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-vertical form-commodity"
                                    action="{{ route('commodities.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="my-1">
                                                <label class="form-label"
                                                    for="parent_commodity_id">{{ __('Komoditas') }}</label>
                                                <select class="select2 form-select" name="parent_commodity_id"
                                                    id="parent-commodity-id">
                                                    <option value="" selected disabled>
                                                        {{ __('Pilih Kategori Komoditas...') }}
                                                    </option>
                                                    @foreach ($parentCommodities as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="parent_commodity_id_error text-danger"></span>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="name">{{ __('Nama Komoditas') }}</label>

                                                <input type="text" class="form-control" name="name"
                                                    id="name">
                                                <span class="name_error text-danger"></span>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="uom_id">{{ __('Satuan') }}</label>
                                                <select class="select2 form-select" name="uom_id" id="uom-id">
                                                    <option value="" selected disabled>
                                                        {{ __('Pilih Satuan...') }}
                                                    </option>
                                                    @foreach ($uom as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="uom_id_error text-danger"></span>
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
                    <table class="table" id="datatable-commodities">
                        <thead>
                            <tr>
                                <th>{{ __('Nama Komoditas') }}</th>
                                <th>{{ __('Kategori') }}</th>
                                <th>{{ __('Satuan') }}</th>
                                <th>{{ __('Tanggal Input') }}</th>
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
                var table = $('#datatable-commodities').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    serverSide: true,
                    processing: true,
                    responsive: true,
                    ajax: {
                        url: "/commodities/json"
                    },
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'parent.name',
                            name: 'parent.name'
                        },
                        {
                            data: 'uom.name',
                            name: 'uom.name'
                        },
                        {
                            data: 'date',
                            name: 'date'
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

                $('div.head-label').html('<h4 class="mb-0">Data Komoditas</h4>');
                $('.select2').select2();
                $('.flatpickr-basic').flatpickr({
                    dateFormat: 'd-m-Y'
                });

                function clearForm() {
                    $('.form-title').text('Form Tambah Komoditas');
                    $('form').trigger('reset');
                    $('.select2').val();
                    $('.select2').select2().trigger('change');
                    $('.btn-cencel').addClass('d-none');
                    $('form').attr('method', 'POST');
                    $('form').attr('action', '/commodities');
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
                        url: '/commodities/' + id + '/edit',
                        type: 'GET',
                        success: function(result) {
                            result = result.data;
                            $('form').attr('method', method);
                            $('form').attr('action', url);
                            console.log(url);
                            $('form select[name="parent_commodity_id"]').val(result.parent_id);
                            $('form select[name="parent_commodity_id"]').select2().trigger(
                                'change');
                            $('form select[name="uom_id"]').val(result.uom_id);
                            $('form select[name="uom_id"]').select2().trigger(
                                'change');
                            $('form input[name="name"]').val(result.name);
                            $('form input[name="name"]').focus();
                            $('.form-title').text('Form Ubah Komoditas');
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
                                url: '/commodities/' + id,
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
