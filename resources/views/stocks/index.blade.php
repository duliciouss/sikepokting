@extends('layouts.app')

@section('title', 'Persediaan')

@section('vendorCss')
    @parent
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Persediaan</h4>
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Form Tambah Persediaan</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form class="form-stock" action="{{ route('stocks.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="date">Bulan</label><br>
                                <input type="text" class="form-control flatpickr-basic" id="date" name="date"
                                    placeholder="Masukan bulan" value="{{ now()->format('d-m-Y') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="market_id">Pasar</label>
                                <select id="market_id" class="select2 form-select" name="market_id" data-allow-clear="true">
                                    @foreach ($markets as $market)
                                        <option value="{{ $market->id }}">{{ $market->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="commodity_id">Komoditas</label>
                                <select id="commodity_id" class="select2 form-select" name="commodity_id"
                                    data-allow-clear="true">
                                    @foreach ($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="stock">Jumlah Persediaan</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    placeholder="Masukan jumlah persediaan" autofocus />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="menu-icon tf-icons ti ti-device-floppy"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorJs')
    @parent
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
            static: true,
            altInput: true,
            plugins: [new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m-d",
                altFormat: "M Y"
            })]
        });

        $(document).ready(function() {
            $('form.form-stock').on('submit', function(e) {
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
                            // clearForm();
                            // clearError();
                            // table.ajax.reload();

                            // toastr.success(result.message, 'Sukses!', {
                            //     closeButton: true,
                            //     tapToDismiss: true,
                            //     progressBar: true
                            // });
                            Swal.fire({
                                title: 'Sukses',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
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
                            Swal.fire({
                                title: 'Gagal',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
