@section('vendorCss')
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>
        {{ now()->format('d-m-Y') }}</h4>
    <div class="row">
        <!-- Statistics -->
        <div class="col-lg-8 mb-4 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistik</h5>
                    {{-- <small class="text-muted">Terakhir update: 1 detik yang lalu</small> --}}
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
                                    <h5 class="mb-0">{{ $marketUsers->count() }}</h5>
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
                                    <h5 class="mb-0">{{ $users->count() }}</h5>
                                    <small>Pengguna</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews -->
        @if ($prices->count() > 0)
            <div class="col-lg-2 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="badge rounded-pill p-2 bg-label-primary mb-2">
                            <i class="ti ti-coin ti-sm"></i>
                        </div>
                        <h5 class="card-title mb-2">Rp. {{ $prices->first()->price }},-</h5>
                        <small>{{ $prices->first()->commodity->name }} ({{ $prices->first()->commodity->uom->name }} )
                            hari
                            ini</small>
                    </div>
                </div>
            </div>
        @endif

        <!-- Orders -->
        <div class="col-lg-2 col-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="badge rounded-pill p-2 bg-label-success mb-2">
                        <i class="ti ti-file-download ti-sm"></i>
                    </div>
                    <h5 class="card-title mb-2"><a href="{{ route('prices.export') }}" target="_blank">Download</a>
                    </h5>
                    <small>Data harga</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4 col-md-12">
        <form action="{{ route('dashboard') }}" method="POST" id="filterForm">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="market" class="form-label">Pasar</label>
                            <select id="market" name="market_id" class="select2 form-select"
                                onchange="this.form.submit()">
                                <option value="">Semua</option>
                                @foreach ($markets as $market)
                                    <option value="{{ $market->id }}"
                                        {{ session('market_id') == $market->id ? 'selected' : '' }}>
                                        {{ $market->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="commodity" class="form-label">Komoditas</label>
                            <select id="commodity" name="commodity_id" class="select2 form-select"
                                onchange="this.form.submit()">
                                @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}"
                                        {{ session('commodity_id') == $commodity->id ? 'selected' : '' }}>
                                        {{ $commodity->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="text" class="form-control flatpickr-basic" id="date" name="date"
                                value="{{ session('date') ?? now()->format('Y-m-d') }}"
                                onchange="this.form.submit()" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                <canvas id="lineChart" width="400" height="80"></canvas>
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
                            <th>Pasar</th>
                            <th>Harga Hari Ini</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($prices as $price)
                            <tr>
                                <td>
                                    {{-- <i class="ti ti-leaf ti-lg text-info me-3"></i> --}}
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-leaf ti-sm text-info"></i>
                                    </div>
                                    <strong>{{ $price->commodity->name }}</strong>
                                </td>
                                <td>{{ $price->market->name }}</td>
                                <td class="text-end">{{ $price->price }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <p>Belum ada data.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('pageJs')
    <script src="{{ asset('template/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <!-- Memuat Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Memuat adapter tanggal untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.flatpickr-basic').flatpickr({
                dateFormat: "Y-m-d",
                locale: "id" // Setting locale to Indonesian
            });
        });
    </script>

    <script>
        // Mendapatkan elemen canvas
        var ctx = document.getElementById('lineChart').getContext('2d');

        // Data tanggal
        var dates = ['2024-01-01', '2024-01-02', '2024-01-03', '2024-01-04', '2024-01-05'];

        // Data jumlah untuk komoditas A
        var dataA = [100, 120, 90, 110, 95];

        // Konfigurasi grafik
        var pengaturan = {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Komoditas A',
                    data: dataA,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                    borderWidth: 1 // Lebar garis
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day' // Satuan waktu untuk sumbu x
                        }
                    },
                    y: {
                        beginAtZero: true // Mulai sumbu y dari nol
                    }
                }
            }
        };

        // Membuat grafik
        var lineChart = new Chart(ctx, pengaturan);
    </script>
@endsection
