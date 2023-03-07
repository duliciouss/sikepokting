@extends('layouts.app')

@section('title', 'Persediaan')

@section('vendorCss')
    @parent
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
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="month">Bulan</label><br>
                                <input type="text" class="form-control flatpickr-basic" id="month" name="month"
                                    placeholder="Masukan bulan" value="{{ now()->format('d-m-Y') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="commodity_id">Komoditas</label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" name="commodity_id"
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
    </script>
@endsection
