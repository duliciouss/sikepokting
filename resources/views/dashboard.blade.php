<x-template.app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="row">
        <!-- Sessions Card -->
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Top 3 Harga Naik</h4>
                </div>
                <div class="card-body">
                    <div id="session-chart" class="my-1"></div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-primary"></i>
                            <span class="fw-bold ms-75 me-25">Beras</span>
                            {{-- <span>- 58.6%</span> --}}
                        </div>
                        <div>
                            <span>2%</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-warning"></i>
                            <span class="fw-bold ms-75 me-25">Minyak Goreng</span>
                            {{-- <span>- 34.9%</span> --}}
                        </div>
                        <div>
                            <span>8%</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-danger"></i>
                            <span class="fw-bold ms-75 me-25">Daging Ayam</span>
                            {{-- <span>- 6.5%</span> --}}
                        </div>
                        <div>
                            <span>-5%</span>
                            <i data-feather="arrow-down" class="text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sessions Card -->
        <!-- Sessions Card -->
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Top 3 Harga Turun</h4>
                </div>
                <div class="card-body">
                    <div id="session-chart2" class="my-1"></div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-primary"></i>
                            <span class="fw-bold ms-75 me-25">Beras</span>
                            {{-- <span>- 58.6%</span> --}}
                        </div>
                        <div>
                            <span>2%</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-warning"></i>
                            <span class="fw-bold ms-75 me-25">Minyak Goreng</span>
                            {{-- <span>- 34.9%</span> --}}
                        </div>
                        <div>
                            <span>8%</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <i data-feather="tag" class="font-medium-2 text-danger"></i>
                            <span class="fw-bold ms-75 me-25">Daging Ayam</span>
                            {{-- <span>- 6.5%</span> --}}
                        </div>
                        <div>
                            <span>-5%</span>
                            <i data-feather="arrow-down" class="text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sessions Card -->
    </div>
    <x-slot name="pageVendorJs">
        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    </x-slot>
    <x-slot name="pageJs">
        <script>
            var $sessionChart = document.querySelector('#session-chart');
            var $sessionChart2 = document.querySelector('#session-chart2');

            // Session Chart
            // ----------------------------------
            sessionChartOptions = {
                chart: {
                    type: 'donut',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [28.6, 31.9, 16.5],
                legend: {
                    show: false
                },
                comparedResult: [2, -3, 8],
                labels: ['Desktop', 'Mobile', 'Tablet'],
                stroke: {
                    width: 0
                },
                colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.danger]
            };
            sessionChart = new ApexCharts($sessionChart, sessionChartOptions);
            sessionChart.render();

            // Session Chart
            // ----------------------------------
            sessionChartOptions2 = {
                chart: {
                    type: 'donut',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [58.6, 34.9, 6.5],
                legend: {
                    show: false
                },
                comparedResult: [2, -3, 8],
                labels: ['Desktop', 'Mobile', 'Tablet'],
                stroke: {
                    width: 0
                },
                colors: [window.colors.solid.success, window.colors.solid.secondary, window.colors.solid.info]
            };
            sessionChart2 = new ApexCharts($sessionChart2, sessionChartOptions2);
            sessionChart2.render();
        </script>
    </x-slot>
</x-template.app-layout>
