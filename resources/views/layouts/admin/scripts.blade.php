<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/src/waves/waves.min.js')}}"></script>
<script src="{{asset('admin/layouts/vertical-dark-menu/app.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('admin/src/plugins/src/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/src/assets/js/dashboard/dash_2.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('admin/src/assets/js/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('toastr/toastr.min.js')}}"></script>

<script>
    toastr.options.rtl = true;
    window.addEventListener('show-success-toast', function (event){
        toastr.success(event.detail, 'موفق');
    });
    window.addEventListener('show-error-toast', event => {
        toastr.error(event.detail.message ,'خطا');
    });
</script>
