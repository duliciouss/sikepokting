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
    </x-slot>

    <x-slot name="pageCss">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
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
                                            id="date" autofocus value="{{ now()->format('Y-m-d') }}">
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
            <div class="col-md-4 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">{{ __('Form Tambah Harga') }}</h4>
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
                                                    value="{{ now()->format('Y-m-d') }}">
                                                <span class="date_error text-danger"></span>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="market_id">Pasar</label>

                                                <select class="select2 form-select " name="market_id" id="market-id">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($markets as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="market_id_error text-danger"></span>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="commodity_id">Komoditas</label>

                                                <select class="select2 form-select" name="commodity_id"
                                                    id="commodity-id">
                                                    <option value="" selected disabled></option>
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
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">
                                                    <i data-feather='save'></i> {{ __('Simpan') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">{{ __('Status Kirim Data') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-vertical form-price" action="{{ route('prices.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="my-1">
                                                <input type="text" class="form-control flatpickr-basic"
                                                    name="date_status" id="date-status" autofocus
                                                    value="{{ now()->format('Y-m-d') }}">
                                                <span class="date_error text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                    <table class="table table-sm mb-2">
                                        <tbody>
                                            <tr>
                                                <td class="pe-1 fw-bold">{{ __('Tanggal:') }}</td>
                                                <td> <span id="get-date"> Selasa, 10 Oktober 2022</span> </td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1 fw-bold">{{ __('Status:') }}</td>
                                                <td>
                                                    <span id="get-status" class="badge bg-secondary"> Tertunda </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1 fw-bold">{{ __('Jumlah Komoditas:') }}</td>
                                                <td> <span id="get-commodities-count"> 20 Terisi </span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">
                                        <i data-feather='send'></i> {{ __('Kirim') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Basic table -->
            <div class="col-md-8 col-12">
                <div class="card">
                    <table class="table text-nowrap" id="datatable-price">
                        <thead>
                            <tr>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('Pasar') }}</th>
                                <th>{{ __('Komoditas') }}</th>
                                <th>{{ __('Harga') }}</th>
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
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    </x-slot>

    <x-slot name="pageJs">
        <script>
            $(document).ready(function() {
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
                    // columnDefs: [{
                    //         targets: [1, 2],
                    //         orderable: false
                    //     },
                    //     {
                    //         targets: [1, 2],
                    //         searchable: false
                    //     }
                    // ],
                    dom: '<"card-header border-bottom p-2"<"head-label"><"dt-action-buttons text-end"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                });

                $('div.head-label').html('<h4 class="mb-0">Data Harga</h4>');
                $('.select2').select2();
                $('.flatpickr-basic').flatpickr();

                function clearForm() {
                    $('form').trigger('reset');
                    $('.select2').val();
                    $('.select2').select2().trigger('change');
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
                    $.ajax({
                        url: '/commodities/' + commodityId,
                        type: 'GET',
                        success: function(result) {
                            $('#label-price').text('Harga per ' + result.data.uom.name);
                        }
                    });
                });

                // store price
                $('form.form-price').on('submit', function(e) {
                    e.preventDefault();

                    const url = $(this).attr('action');
                    const data = $(this).serialize();

                    $.ajax({
                        url,
                        type: 'POST',
                        data: data,
                        success: function(result) {
                            if (result.success) {
                                clearForm();
                                clearError();
                                table.ajax.reload();

                                toastr.success(result.message, 'Sukses!', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    rtl: false
                                });
                            } else {
                                clearError();
                                toastr.error(result.message, 'Error', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    rtl: false
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

                $('#date-status').change(function() {
                    $('#get-date').text($(this).val());
                    $('#get-status').text('terkirim');
                    $('#get-commodities-count').text(12);
                });
            });
        </script>
    </x-slot>
</x-template.app-layout>
