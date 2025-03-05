<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('aset/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('aset/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('aset/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('aset/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('aset/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('aset/assets/js/template.js') }}"></script>
<script src="{{ asset('aset/assets/js/settings.js') }}"></script>
<script src="{{ asset('aset/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('aset/assets/js/todolist.js') }}"></script>


<script src="{{ asset('uset/assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('uset/assets/js/dataTables.bootstrap4.js') }}"></script>


<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('aset/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('aset/assets/js/dashboard.js') }}"></script>
<!-- <script src="{{ asset('aset/assets/js/Chart.roundedBarCharts.js') }}"></script> -->
<!-- End custom js for this page-->

@stack('js-lib')

@stack('script')

