<x-template.app-layout>
    <x-slot name="title">Harga</x-slot>

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
                    <h2 class="content-header-title float-start mb-0">Harga</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Harga
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div>
                {{-- <button class="btn btn-success btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i data-feather="download"></i> Unduh Laporan
                </button> --}}
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i data-feather="download" class="dropdown-icon"></i> Unduh Laporan
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#report-modal">Rekap
                        Harian</a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#report-modal">Rekap
                        Bulanan</a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#report-modal">Rekap
                        Tahunan</a>
                </div>
                <div class="modal fade" id="report-modal" tabindex="-1" aria-labelledby="ReportModal"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-xs modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Unduh Rekap Harian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('prices.export') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="my-1">
                                        <label class="form-label" for="date">Pilih Tanggal</label>
                                        <input type="text" class="form-control flatpickr-basic" name="date"
                                            id="date" autofocus value="{{ now()->format('Y-m-d') }}">
                                        <span class="date_error text-danger"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-icon" data-bs-dismiss="modal">
                                        <i data-feather="x-square"></i>Batal
                                    </button>
                                    <button type="submit" class="btn btn-success btn-icon">
                                        <i data-feather="download"></i> Unduh
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
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Form Tambah Harga</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical form-price" action="{{ route('prices.store') }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="my-1">
                                        <label class="form-label" for="date">Tanggal</label>
                                        <input type="text" class="form-control flatpickr-basic" name="date"
                                            id="date" autofocus value="{{ now()->format('Y-m-d') }}">
                                        <span class="date_error text-danger"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="market_id">Pasar</label>

                                        <select class="select2 form-select " name="market_id" id="market-id">
                                            <option value="" selected disabled></option>
                                            @foreach ($markets as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="market_id_error text-danger"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="commodity_id">Komoditas</label>

                                        <select class="select2 form-select" name="commodity_id" id="commodity-id">
                                            <option value="" selected disabled></option>
                                            @foreach ($commodities as $item)
                                                <option value="{{ $item->id }}">{{ $item->parent->name }}:
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="commodity_id_error text-danger"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label id="label-price" class="form-label" for="price">Harga</label>

                                        <input type="number" class="form-control" name="price" id="price">
                                        <span class="price_error text-danger"></span>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather='save'></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Basic table -->
            <div class="col-md-8 col-12">
                <div class="card">
                    <table class="table text-nowrap" id="datatable-market">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pasar</th>
                                <th>Komoditas</th>
                                <th>Harga</th>
                                <th>Aksi</th>
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
                var table = $('table').DataTable({
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

                // reset form
                function reset() {
                    $('span.text-danger').text('');
                    $('input.is-invalid').removeClass('is-invalid');
                    $('select.is-invalid').removeClass('is-invalid');
                    $('form')[0].reset();
                    $('.select2').val();
                    $('.select2').select2().trigger('change');
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
                            reset();
                            table.ajax.reload();

                            toastr.success(result.message, 'Sukses!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });
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
            });
        </script>
    </x-slot>
</x-template.app-layout>
