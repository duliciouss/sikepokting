<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template/') . '/' }}" data-template="vertical-menu-template-starter">

<head>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="title" content="Sikepokting Kabupaten Subang">
    <meta name="description" content="Sikepokting Kabupaten Subang">
    <meta name="keywords"
        content="sikepokting, subang, kabupaten, kota, harga, pangan, kebutuhan, pokok, penting, informasi, publik">
    <meta name="author" content="kandipermana">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('template/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('template/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/css/demo.css') }}" />

    <!-- Vendors CSS -->
    @section('vendorCss')
        <link rel="stylesheet" href="{{ asset('template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/vendor/libs/node-waves/node-waves.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/vendor/libs/select2/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/vendor/libs/flatpickr/flatpickr.css') }}" />
    @show

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('template/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('template/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('template/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Menu -->

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('layouts.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>
                            {{ now()->format('d-m-Y') }}</h4>
                        <div class="row">
                            <!-- Statistics -->
                            <div class="col-lg-8 mb-4 col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5 class="card-title mb-0">Statistik</h5>
                                        <small class="text-muted">Updated 1 month ago</small>
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
                            <!-- Orders -->
                            <div class="col-lg-2 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                                            <i class="ti ti-briefcase ti-sm"></i>
                                        </div>
                                        <h5 class="card-title mb-2">97.8k</h5>
                                        <small>Orders</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="col-lg-2 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="badge rounded-pill p-2 bg-label-success mb-2">
                                            <i class="ti ti-message-dots ti-sm"></i>
                                        </div>
                                        <h5 class="card-title mb-2">3.4k</h5>
                                        <small>Review</small>
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
                                            <input type="date" name="date" id="date"
                                                class="form-control flatpickr-basic"
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
                                        <h5 class="card-title mb-0">Statistics</h5>
                                        <small class="text-muted">Commercial networks and enterprises</small>
                                    </div>
                                    <div class="card-header-elements ms-auto py-0">
                                        <h5 class="fw-bold mb-0 me-3">$ 78,000</h5>
                                        <span class="badge bg-label-secondary">
                                            <i class='ti ti-arrow-up ti-xs text-success'></i>
                                            <span class="align-middle">37%</span>
                                        </span>
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

                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    © 2023 Kominfo Subang</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('template/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('template/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('template/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    @section('vendorJs')
        <script src="{{ asset('template/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('template/vendor/libs/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('template/vendor/libs/chartjs/chartjs.js') }}"></script>
    @show

    <!-- Main JS -->
    <script src="{{ asset('template/js/main.js') }}"></script>

    <!-- Page JS -->
    @section('pageJs')
        <script>
            $(".select2").select2();
            $('.flatpickr-basic').flatpickr({
                dateFormat: 'd-m-Y',
            });

            // Color Variables
            const yellowColor = '#ffe800'
            5
            let borderColor, gridColor, tickColor;
            if (isDarkStyle) {
                borderColor = 'rgba(100, 100, 100, 1)';
                gridColor = 'rgba(100, 100, 100, 1)';
                tickColor = 'rgba(255, 255, 255, 0.75)'; // x & y axis tick color
            } else {
                borderColor = '#f0f0f0';
                gridColor = '#f0f0f0';
                tickColor = 'rgba(0, 0, 0, 0.75)'; // x & y axis tick color
            }
            const lineChart = document.getElementById('lineChart');
            if (lineChart) {
                const lineChartVar = new Chart(lineChart, {
                    type: 'line',
                    data: {
                        labels: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                        datasets: [{
                                data: [80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255, 290, 360, 375],
                                label: 'Europe',
                                borderColor: config.colors.danger,
                                tension: 0.5,
                                pointStyle: 'circle',
                                backgroundColor: config.colors.danger,
                                fill: false,
                                pointRadius: 1,
                                pointHoverRadius: 5,
                                pointHoverBorderWidth: 5,
                                pointBorderColor: 'transparent',
                                pointHoverBorderColor: cardColor,
                                pointHoverBackgroundColor: config.colors.danger
                            },
                            {
                                data: [80, 125, 105, 130, 215, 195, 140, 160, 230, 300, 220, 170, 210, 200, 280],
                                label: 'Asia',
                                borderColor: config.colors.primary,
                                tension: 0.5,
                                pointStyle: 'circle',
                                backgroundColor: config.colors.primary,
                                fill: false,
                                pointRadius: 1,
                                pointHoverRadius: 5,
                                pointHoverBorderWidth: 5,
                                pointBorderColor: 'transparent',
                                pointHoverBorderColor: cardColor,
                                pointHoverBackgroundColor: config.colors.primary
                            },
                            {
                                data: [80, 99, 82, 90, 115, 115, 74, 75, 130, 155, 125, 90, 140, 130, 180],
                                label: 'Africa',
                                borderColor: yellowColor,
                                tension: 0.5,
                                pointStyle: 'circle',
                                backgroundColor: yellowColor,
                                fill: false,
                                pointRadius: 1,
                                pointHoverRadius: 5,
                                pointHoverBorderWidth: 5,
                                pointBorderColor: 'transparent',
                                pointHoverBorderColor: cardColor,
                                pointHoverBackgroundColor: yellowColor
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                grid: {
                                    color: borderColor,
                                    drawBorder: false,
                                    borderColor: borderColor
                                },
                                ticks: {
                                    color: labelColor
                                }
                            },
                            y: {
                                scaleLabel: {
                                    display: true
                                },
                                min: 0,
                                max: 400,
                                ticks: {
                                    color: labelColor,
                                    stepSize: 100
                                },
                                grid: {
                                    color: borderColor,
                                    drawBorder: false,
                                    borderColor: borderColor
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                // Updated default tooltip UI
                                rtl: isRtl,
                                backgroundColor: cardColor,
                                titleColor: headingColor,
                                bodyColor: legendColor,
                                borderWidth: 1,
                                borderColor: borderColor
                            },
                            legend: {
                                position: 'top',
                                align: 'start',
                                rtl: isRtl,
                                labels: {
                                    usePointStyle: true,
                                    padding: 35,
                                    boxWidth: 6,
                                    boxHeight: 6,
                                    color: legendColor
                                }
                            }
                        }
                    }
                });
            }
        </script>
    @show
</body>

</html>
