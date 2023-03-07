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
                                        <h5 class="card-title mb-0">Statistics</h5>
                                        <small class="text-muted">Updated 1 month ago</small>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="row gy-3">
                                            <div class="col-md-3 col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                                    </div>
                                                    <div class="card-info">
                                                        <h5 class="mb-0">230k</h5>
                                                        <small>Sales</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                        <i class="ti ti-users ti-sm"></i>
                                                    </div>
                                                    <div class="card-info">
                                                        <h5 class="mb-0">8.549k</h5>
                                                        <small>Customers</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </div>
                                                    <div class="card-info">
                                                        <h5 class="mb-0">1.423k</h5>
                                                        <small>Products</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                                    </div>
                                                    <div class="card-info">
                                                        <h5 class="mb-0">$9745</h5>
                                                        <small>Revenue</small>
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
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="John Doe" aria-describedby="floatingInputHelp" />
                                        <label for="floatingInput">Name</label>
                                        <div id="floatingInputHelp" class="form-text">
                                            We'll never share your details with anyone else.
                                        </div>
                                    </div>
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
                                                        <i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
                                                        <strong>{{ $commodity->name }}</strong>
                                                    </td>
                                                    <td>Rp. 13.000,-</td>
                                                    <td>Rp. 13.000,- </td>
                                                    <td><span class="badge bg-label-primary me-1">-</span></td>
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
    @show

    <!-- Main JS -->
    <script src="{{ asset('template/js/main.js') }}"></script>

    <!-- Page JS -->
    @section('pageJs')
    @show
</body>

</html>
