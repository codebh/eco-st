

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://tafseel.net">Tafseel</a></strong>
    All rights reserved.
{{--    <div class="float-right d-none d-sm-inline-block">--}}
{{--        <b>Version</b> 3.0.0-rc.5--}}
{{--    </div>--}}
</footer>
</div>
<!-- ./wrapper -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>


<!-- REQUIRED SCRIPTS -->
<script src="{{ LarapexChart::cdn() }}"></script>
@if (Route::currentRouteName()== 'store.dashboard')

{{ $chart->script() }}
{{ $chart02->script() }}
{{ $chart03->script() }}


@endif

<!-- jQuery -->
<script src="{{url('/')}}/design/admin/plugins/jquery/jquery.min.js"></script>

<link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

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
{{--<script src="{{url('/')}}/design/admin/dist/js/pages/dashboard3.js"></script>--}}
{{--js tree adn ditepiker--}}

<script src="{{url('design/admin/jstree/jstree.js')}}"></script>
<script src="{{url('design/admin/jstree/jstree.wholerow.js')}}"></script>
<script src="{{url('design/admin/jstree/jstree.checkbox.js')}}"></script>
<script src="{{url('design/admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('design/admin/dist/js/demo.js')}}"></script>
<script src="{{url('design/admin/dist/js/pages/dashboard3.js')}}"></script>
<!-- Select2 -->
<script src="{{url('/')}}/design/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{url('/')}}/design/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->

{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js"></script>--}}
<script src="{{asset('design/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('design/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

@livewireScripts
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">


<x-livewire-alert::flash />
<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>



@stack('js')
@stack('css')


<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
    $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        $('#txtDate').attr('min', maxDate);
    });

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    // Summernote
    $('#summernote').summernote({


        toolbar: [

            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    })
    $('.select2').select2({
        theme:'bootstrap4'
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $("#duallistbox").bootstrapDualListbox({
        // see next for specifications
    });



</script>

<script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
      $('#duallsitbox').bootstrapDualListbox();
    })
  </>


</body>
</html>

{{--<!-- ./wrapper -->--}}

{{--<link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')}}"></script>--}}
{{--<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>--}}


