<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0-rc.5
    </div>
</footer>
</div>
<!-- ./wrapper -->


<script>



    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('/')}}/design/admin/plugins/jquery/jquery.min.js"></script>

<link rel="stylesheet"
      href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{url('/')}}/design/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{url('/')}}/design/admin/plugins/toastr/toastr.min.js"></script>

<!-- Datatable -->
<script src="{{url('/')}}/design/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('/')}}/design/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

{{--<script  src="{{url('/design/admin/buttons/buttons.min.js')}}"></script>--}}
{{--<script  src="{{url('/design/admin/buttons/jszip.min.js')}}"></script>--}}
{{--<script  src="{{url('/design/admin/buttons/buttons.html5.min.js')}}"></script>--}}

<!-- date-range-picker -->
{{--<script src="{{url('/')}}/design/admin/plugins/daterangepicker/daterangepicker.js"></script>--}}
<!-- bootstrap color picker -->
<script src="{{url('/')}}/design/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>


{{--<link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>


{{--<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')}}"></script>--}}
<!-- Bootstrap -->
{{--<script src="{{url('/')}}/design/admin/plugins/bootstrap/js/bootstrap.bun dle.min.js"></script>--}}
<!-- AdminLTE -->
<script src="{{url('/')}}/design/admin/dist/js/adminlte.js"></script>
<script src="{{url('/')}}/design/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
{{--<script src="{{url('/')}}/design/admin/plugins/chart.js/Chart.min.js"></script>--}}
<script src="{{url('/')}}/design/admin/dist/js/demo.js"></script>
<script src="{{url('/')}}/design/admin/dist/js/myfunction.js"></script>
{{--<script src="{{url('/')}}/design/admin/dist/js/pages/dashboard3.js"></script>--}}
{{--js tree adn ditepiker--}}

<script src="{{url('design/admin/jstree/jstree.js')}}"></script>
<script src="{{url('design/admin/jstree/jstree.wholerow.js')}}"></script>
<script src="{{url('design/admin/jstree/jstree.checkbox.js')}}"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js"></script>--}}

<!-- Select2 -->
<script src="{{url('/')}}/design/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{url('/')}}/design/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{url('/')}}/design/admin/plugins/moment/moment.min.js"></script>
<script src="{{url('/')}}/design/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/')}}/design/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('design/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

    $(function () {

        // Summernote
        $('#summernote').summernote (
            {
                fontNames: ["Tajawal"],
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]


            }
        )
        $('#summernote1').summernote(
            {
                fontNames: ["Lato"],

                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            }
        )
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd'
        });

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#dZUpload", {
            autoProcessQueue: false,
            parallelUploads: 10 // Number of files process at a time (default 2)
        });

        $('#dZUpload').click(function(){
            myDropzone.processQueue();
        });


    })
</script>

<script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    })
  </script>

    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@powerGridScripts

<!-- REQUIRED SCRIPTS -->
<script src="{{ LarapexChart::cdn() }}"></script>
@if (Route::currentRouteName()== 'admin.dashboard')

{{ $chart->script() }}
{{ $chart02->script() }}
{{ $chart03->script() }}
{{ $chart04->script() }}
{{ $chart05->script() }}
{{ $chart06->script() }}


@endif

<script src="//unpkg.com/alpinejs" defer></script>
<script>
window.addEventListener('showAlert', event => {
    alert(event.detail.message);
})
window.addEventListener('showConfirm', event => {

    // alert(event.detail.message);
    confirm(event.detail.message)
})


</script>


<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">


<x-livewire-alert::flash />
@stack('js')
@stack('css')
</body>
</html>

{{--<!-- ./wrapper -->--}}

{{--<link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')}}"></script>--}}
{{--<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>--}}


