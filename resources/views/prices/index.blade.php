<x-template.app-layout>
    <x-slot name="title">{{ __('Harga') }}</x-slot>

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
        <div class="content-header-left col-12 mb-2 d-flex justify-content-between">
            <div class="row breadcrumbs-top flex-fill">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Harga') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Harga') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i data-feather="download" class="dropdown-icon"></i> {{ __('Unduh Laporan') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#report-modal">{{ __('Rekap Harian') }}</a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#report-modal">{{ __('Rekap Bulanan') }}</a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                        data-bs-target="#report-modal">{{ __('Rekap Tahunan') }}</a>
                </div>
                <div class="modal fade" id="report-modal" tabindex="-1" aria-labelledby="ReportModal"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-xs modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Unduh Rekap Harian') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('prices.export') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="my-1">
                                        <label class="form-label" for="date">{{ __('Pilih Tanggal') }}</label>
                                        <input type="text" class="form-control flatpickr-basic" name="date"
                                            id="date" autofocus value="{{ now()->format('d-m-Y') }}">
                                        <span class="date_error text-danger"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-icon" data-bs-dismiss="modal">
                                        <i data-feather="x-square"></i>{{ __('Batal') }}
                                    </button>
                                    <button type="submit" class="btn btn-success btn-icon">
                                        <i data-feather="download"></i> {{ __('Unduh') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-4 col-12 {{ auth()->user()->role === 3 ? 'd-none' : '' }}">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title form-title">{{ __('Form Tambah Harga') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-vertical form-price" action="{{ route('prices.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="my-1">
                                                <label class="form-label" for="date">{{ __('Tanggal') }}</label>
                                                <input type="text" class="form-control flatpickr-basic"
                                                    name="date" id="date" autofocus
                                                    value="{{ now()->format('d-m-Y') }}">
                                                <span class="date_error text-danger"></span>
                                            </div>
                                            <div
                                                class="mb-1 {{ auth()->user()->market_id === null ? '' : 'd-none' }}">
                                                <label class="form-label" for="market_id">{{ __('Pasar') }}</label>
                                                <select class="select2 form-select " name="market_id" id="market-id">
                                                    <option value=""
                                                        {{ auth()->user()->market_id === null ? 'selected' : '' }}
                                                        disabled>
                                                        {{ __('Pilih Pasar...') }}
                                                    </option>
                                                    @foreach ($markets as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ auth()->user()->market_id === $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="market_id_error text-danger"></span>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="commodity_id">{{ __('Komoditas') }}</label>
                                                <select class="select2 form-select" name="commodity_id"
                                                    id="commodity-id">
                                                    <option value="" selected disabled>
                                                        {{ __('Pilih Komoditas...') }}
                                                    </option>
                                                    @foreach ($commodities as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->parent->name }}:
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="commodity_id_error text-danger"></span>
                                            </div>
                                            <div class="mb-1">
                                                <label id="label-price" class="form-label"
                                                    for="price">Harga</label>

                                                <input type="number" class="form-control" name="price"
                                                    id="price">
                                                <span class="price_error text-danger"></span>
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
            <div class="col-md-{{ auth()->user()->role === 3 ? '12' : '8' }} col-12">
                <div class="card">
                    <table class="table text-nowrap" id="datatable-price">
                        <thead>
                            <tr>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('Pasar') }}</th>
                                <th>{{ __('Komoditas') }}</th>
                                <th>{{ __('Harga') }}</th>
                                <th>{{ auth()->user()->role === 3 ? '' : 'Aksi' }}</th>
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
                var table = $('#datatable-price').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    serverSide: true,
                    processing: true,
                    responsive: true,
                    ajax: {
                        url: "/prices/json"
                    },
                    columns: [{
                            data: 'date',
                            name: 'date'
                        },
                        {
                            data: 'market.name',
                            name: 'market.name'
                        },
                        {
                            data: 'commodity.name',
                            name: 'commodity.name'
                        },
                        {
                            data: 'price',
                            name: 'price'
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

                $('div.head-label').html('<h4 class="mb-0">Data Harga</h4>');
                $('.select2').select2();
                $('.flatpickr-basic').flatpickr({
                    dateFormat: 'd-m-Y'
                });

                function clearForm() {
                    $('.form-title').text('Form Tambah Harga');
                    $('form').trigger('reset');
                    $('.select2').val();
                    $('.select2').select2().trigger('change');
                    $('form input[name="date"]').prop('disabled', false);
                    $('form select[name="market_id"]').prop('disabled', false);
                    $('form select[name="commodity_id"]').prop('disabled', false);
                    $('.btn-cencel').addClass('d-none');
                    $('form').attr('method', 'POST');
                    $('form').attr('action', '/prices');
                }

                function clearError() {
                    console.log('clear error');
                    $('span.text-danger').text('');
                    $('input.is-invalid').removeClass('is-invalid');
                    $('select.is-invalid').removeClass('is-invalid');
                }

                // get uom
                $('#commodity-id').change(function() {
                    commodityId = $(this).val();
                    if (commodityId !== null) {
                        $.ajax({
                            url: '/commodities/' + commodityId,
                            type: 'GET',
                            success: function(result) {
                                $('#label-price').text('Harga per ' + result.data.uom.name);
                            }
                        });
                    }

                });

                // store price
                $('form.form-price').on('submit', function(e) {
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

                // edit price
                $(document).on('click', '.btn-edit', function() {
                    clearForm();
                    clearError();
                    const priceId = $(this).attr('data-id');
                    const method = $(this).attr('data-method');
                    const url = $(this).attr('data-url');

                    $.ajax({
                        url: '/prices/' + priceId + '/edit',
                        type: 'GET',
                        success: function(result) {
                            result = result.data;
                            $('form').attr('method', method);
                            $('form').attr('action', url);
                            console.log(url);
                            $('form input[name="date"]').prop('disabled', true);
                            $('form input[name="date"]').val($.format.date(result.date,
                                "dd-MM-yyyy"));
                            $('form select[name="market_id"]').val(result.market_id);
                            $('form select[name="market_id"]').select2().trigger('change');
                            $('form select[name="market_id"]').prop('disabled', true);
                            $('form select[name="commodity_id"]').val(result.commodity_id);
                            $('form select[name="commodity_id"]').select2().trigger('change');
                            $('form select[name="commodity_id"]').prop('disabled', true);
                            $('form input[name="price"]').val(result.price);
                            $('form input[name="price"]').focus();
                            $('.form-title').text('Form Ubah Harga');
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
                                url: '/prices/' + id,
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
