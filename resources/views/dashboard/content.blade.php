<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>
        {{ now()->format('d-m-Y') }}</h4>
    <div class="row">
        <!-- Statistics -->
        <div class="col-lg-8 mb-4 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistik</h5>
                    <small class="text-muted">Terakhir update: 1 menit yang lalu</small>
                </div>
                <div class="card-body pt-2">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="ti ti-leaf ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ $commodities->count() }}</h5>
                                    <small>Komoditas</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="ti ti-building-store ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ $markets->count() }}</h5>
                                    <small>Pasar</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="ti ti-user-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ $markets->count() }}</h5>
                                    <small>Admin Pasar</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">12</h5>
                                    <small>Pengguna</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews -->
        <div class="col-lg-2 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="badge rounded-pill p-2 bg-label-primary mb-2">
                        <i class="ti ti-coin ti-sm"></i>
                    </div>
                    <h5 class="card-title mb-2">0</h5>
                    <small>Beras hari ini</small>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="col-lg-2 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="badge rounded-pill p-2 bg-label-success mb-2">
                        <i class="ti ti-file-download ti-sm"></i>
                    </div>
                    <h5 class="card-title mb-2">Download</h5>
                    <small>Data harga</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="market" class="form-label">Pasar</label>
                        <select id="market" class="select2 form-select">
                            @foreach ($markets as $market)
                                <option value="{{ $market->id }}">{{ $market->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="commodity" class="form-label">Komoditas</label>
                        <select id="commodity" class="select2 form-select">
                            @foreach ($commodities as $commodity)
                                <option value="{{ $commodity->id }}">{{ $commodity->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control flatpickr-basic"
                            value="{{ now()->format('d-m-Y') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4 col-md-12">
        <div class="card">
            <div class="card-header header-elements">
                <div>
                    <h5 class="card-title mb-0">Harga Komoditas Per Bulan</h5>
                    <small class="text-muted">Grafik harga komoditas sesuai dengan pencarian yang dipilih</small>
                </div>
            </div>
            <div class="card-body pt-2">
                <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4 col-md-12">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Komoditas</th>
                            <th>Harga Kemarin</th>
                            <th>Harga Hari Ini</th>
                            <th>Perubahan Rupiah (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($commodities as $commodity)
                            <tr>
                                <td>
                                    {{-- <i class="ti ti-leaf ti-lg text-info me-3"></i> --}}
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-leaf ti-sm text-info"></i>
                                    </div>
                                    <strong>{{ $commodity->name }}</strong>
                                </td>
                                <td>Rp. 13.000,-</td>
                                <td>Rp. 13.000,- </td>
                                <td>Rp. 0,- </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
