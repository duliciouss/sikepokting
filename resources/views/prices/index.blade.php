@extends('layouts.app')

@section('title', 'Harga')

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
        <div class="row">
            @can('create harga')
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Form Harga Komoditas</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <form class="form-price" action="{{ route('prices.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="date">Tanggal</label><br>
                                    <input type="text" class="form-control flatpickr-basic" id="date" name="date"
                                        placeholder="Masukan bulan" value="{{ now()->format('d-m-Y') }}" />
                                </div>
                                <div class="mb-3 {{ auth()->user()->market_id === null ? '' : 'd-none' }}">
                                    <label class="form-label" for="market_id">Pasar</label>
                                    <select id="market_id" class="select2 form-select" name="market_id">
                                        @foreach ($markets as $market)
                                            <option value="{{ $market->id }}">{{ $market->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="commodity_id">Komoditas</label>
                                    <select id="commodity_id" class="select2 form-select" name="commodity_id">
                                        @foreach ($commodities as $commodity)
                                            <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Harga</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Masukan harga" autofocus />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="menu-icon tf-icons ti ti-device-floppy"></i> Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            @can('view harga')
                <div class="col-md-12 col-xl-12">
                    <!-- DataTable -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="table-price" class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Pasar</th>
                                        <th>Komoditas</th>
                                        <th>Harga</th>
                                        <th> <i class="menu-icon tf-icons ti ti-settings"></i> </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection

@section('vendorJs')
    @parent
    <script src="{{ asset('template/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
@endsection

@section('pageJs')
    @parent
    <script>
        $(".select2").select2();
        $('.flatpickr-basic').flatpickr({
            dateFormat: 'd-m-Y',
            locale: 'id',
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
                url: "/prices/json"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'date',
                    name: 'date',
                    render: function(data) {
                        // Format tanggal menjadi 'd F Y'
                        var formattedDate = moment(data).format('D MMMM YYYY');
                        return formattedDate;
                    }
                },
                {
                    data: 'market.name',
                    name: 'market.name'
                },
                {
                    data: 'commodity.name',
                    name: 'commodity.name',
                    render: function(data, type, row) {
                        return data + ' (' + row.uom + ')';
                    }
                },
                {
                    data: 'price',
                    name: 'price',
                    className: 'dt-right',
                    render: function(data) {
                        // Konversi harga menjadi format Rupiah
                        var formattedPrice = 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                        return formattedPrice;
                    }
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    render: function(data, type, row) {
                        return deleteButton =
                            `<button type="button" class="btn btn-icon btn-outline-danger btn-sm btn-delete" id="btn-delete" data-id="${row.id}"><i class="ti ti-trash"></i></button>`;
                    }
                }
            ]
        });

        $('form.form-price').on('submit', function(e) {
            e.preventDefault();

            const form = $(this); // Menyimpan referensi ke formulir dalam variabel form
            const table = $('#table-price').DataTable(); // Ganti 'table_id' dengan ID tabel Anda

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
                        form.trigger('reset').find('.is-invalid').removeClass('is-invalid');
                        table.ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan.',
                            showConfirmButton: false,
                            timer: 1500,
                            buttonsStyling: false
                        });
                    } else {
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
                        url: '/prices/' + id,
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
