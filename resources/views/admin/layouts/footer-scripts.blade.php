<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('admin-assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('admin-assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('admin-assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('admin-assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('admin-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('admin-assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('admin-assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('admin-assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('admin-assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('admin-assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('admin-assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('admin-assets/js/sticky.js')}}"></script>
<script src="{{URL::asset('admin-assets/js/bootstrap-select.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('admin-assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('admin-assets/plugins/side-menu/sidemenu.js')}}"></script>
<script src="{{URL::asset('admin-assets/js/datatables.min.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(function () {
        $('#example-table').DataTable({});
    });
    $(".alert.alert-success.alert-dismissable").fadeTo(2000, 5000).slideUp(500);
</script>
