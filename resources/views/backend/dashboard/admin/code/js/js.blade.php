<script src="{{asset('backend/assetss/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/assetss/js/pages/dashboard.init.js')}}"></script>
<script src="{{asset('backend/assetss/js/app.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assetss/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assetss/js/pages/datatables.init.js')}}"></script>    
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
