<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link href="{{ asset('aset/assets/vendors/feather/feather.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link href="{{ asset('aset/assets/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('aset/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('aset/assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->

    @stack('css-lib')

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('aset/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href=" {{ asset('aset/assets/images/favicon.png') }}" />

    @stack('style')

</head>