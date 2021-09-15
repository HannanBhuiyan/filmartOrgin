






<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend') }}/dist/js/demo.js"></script>
<script src="{{ asset('backend') }}/dist/js/toastr.min.js"></script>
<script src="{{ asset('backend') }}/dist/js/jquery.dataTables.js"></script>
<script src="{{ asset('backend') }}/dist/js/sweetalert.min.js"></script>
<script src="{{ asset('backend') }}/dist/js/axios.min.js"></script>
<script src="{{ asset('backend') }}/dist/js/bootstrap-tagsinput.min.js"></script>

<script>
   $("#confirm").click(function (e){
       e.preventDefault();
       var link = $(this).attr('href');
       swal({
           title: "Are you sure?",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
           if (willDelete) {
               window.location.href = link;
           } else {
               swal("Your imaginary file is safe!");
           }
       });
   })
</script>


@yield('scripts')

@if(Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>
@endif
@if(Session::has('fail'))
    <script>
        toastr.error("{!! Session::get('fail') !!}");
    </script>
@endif


</body>
</html>















