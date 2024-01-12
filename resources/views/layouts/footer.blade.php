<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('assets/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
