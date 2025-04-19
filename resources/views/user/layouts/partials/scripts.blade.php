<!-- latest jquery-->
<script src="{{ asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/admin/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/admin/js/config.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/admin/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/admin/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-card/custom-card.js') }}"></script>
<script src="{{ asset('assets/admin/js/tooltip-init.js') }}"></script>
<script src="{{ asset('assets/admin/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/datatable/datatables/datatable.custom.js') }}"></script>


<script src="{{ asset('assets/admin/js/chart/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/chartist/chartist.js') }}"></script>


<script src="{{ asset('assets/admin/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/admin/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/admin/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/counter/counter-custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-card/custom-card.js') }}"></script>
<script src="{{ asset('assets/admin/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/admin/js/owlcarousel/owl-custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/dashboard/dashboard_2.js') }}"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/admin/js/script.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/js/theme-customizer/customizer.js') }}"></script> --}}
<!-- login js-->
<!-- Plugin used-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "30000",
        "hideDuration": "10000",
        "timeOut": "50000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "closeButton": true,
        "progressBar": true
    }

    @if (Session::has('success'))

        toastr.success("{{ session('success') }}");
    @endif

    @if (!empty($errors->all()))
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    @if (Session::has('error'))

        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))

        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))

        toastr.warning("{{ session('warning') }}");
    @endif
</script>
@yield('js')
