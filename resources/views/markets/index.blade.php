<x-app-theme-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('theme/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('theme/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('theme/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('theme/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('theme/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    </x-slot>
    <x-slot name="header">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Pasar</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Pasar
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Pasar</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Nama Pasar</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="" autocomplete="off" autofocus />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="name">Alamat</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="" autocomplete="off" />
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-outline-secondary me-1">Bersihkan</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                <div class="card-body">
                    <table class="table" id="datatable-market">
                        <thead>
                            <tr>
                                <th>Nama Pasar</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>adfasdf</td>
                                <td>adfasdf</td>
                                <td>
                                    <button class="btn btn-warning btn-icon"><i data-feather='edit'></i> Ubah</button>
                                    <button class="btn btn-danger btn-icon"><i data-feather='trash'></i> Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Basic table -->
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('theme/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('theme/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('assets/js/table-datatables-market.js') }}"></script>
        <!-- END: Page JS-->

        <script>
            $(function() {
                $('#datatable-market').DataTable();
            })
        </script>
    </x-slot>
</x-app-theme-layout>
