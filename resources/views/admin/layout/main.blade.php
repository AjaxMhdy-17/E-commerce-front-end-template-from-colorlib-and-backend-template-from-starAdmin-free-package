@include('admin.layout.header')

@include('sweetalert::alert')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->

    @include('admin.layout.sidebar')


    <!-- partial -->
    <div class="main-panel">

        <!-- content-wrapper ends -->


        @yield('content')


        @include('admin.layout.footer')



        </body>

        </html>