<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sistem Informasi Data Kebutuhan Pokok Masyarakat dan Bahan Pokok Penting.">
    <meta name="keywords" content="diskominfo, subang, kabupaten subang, kominfo, dkupp, perdagangan, sikepokting">
    <meta name="author" content="@kandipermana">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }} | {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    @include('layouts.template.style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <x-template.navbar-layout />
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <x-template.sidebar-layout />
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            {{ $slot }}
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022
                <a class="ms-25" href="https://kandip.site" target="_blank">@kandipermana</a>
                <span class="d-none d-sm-inline-block">, All rights Reserved</span>
            </span>
            <span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @include('layouts.template.script')
</body>
<!-- END: Body-->

</html>
