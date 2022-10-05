<x-app-theme-layout>
    <x-slot name="header">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Harga</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Harga
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                <div class="alert-body">
                    <strong>Info:</strong> Please check the&nbsp;<a class="text-primary"
                        href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-full.html"
                        target="_blank">Layout full documentation</a>&nbsp; for more details.
                </div>
            </div>
        </div>
        <div class="col-12">
            Prices
        </div>
    </div>
</x-app-theme-layout>
