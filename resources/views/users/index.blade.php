<x-template.app-layout>
    <x-slot name="title">Pasar</x-slot>
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
            href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    </x-slot>
    <div class="content-header row">
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
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Form Tambah Pasar</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="my-1">
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
                                    <button class="btn btn-warning btn-icon"><i data-feather='edit'></i>
                                        Ubah</button>
                                    <button class="btn btn-danger btn-icon"><i data-feather='trash'></i>
                                        Hapus</button>
                                </td>
                            </tr>
                        </tbody>
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
    </x-slot>

    <x-slot name="pageJs">
        <script>
            $(function() {
                $('table').DataTable({
                    dom: '<"card-header border-bottom p-2"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                });

                $('div.head-label').html('<h4 class="mb-0">Data Pasar</h4>');
            })
        </script>
    </x-slot>
</x-template.app-layout>
