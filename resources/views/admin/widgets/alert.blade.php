<script src="{{asset('assets/admin/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script>
    function successAlert(message) {
        swal('Saved!', '{{Session::get('success')}}', 'success');
    };
    function errorAlert(message) {
        swal('Error!', '{{Session::get('error')}}', 'error');
    };
</script>

@if (Session::has('success'))
    <script>
        window.onload = successAlert;
    </script>
@endif
@if (Session::has('error'))
    <script>
        window.onload = errorAlert;
    </script>
@endif