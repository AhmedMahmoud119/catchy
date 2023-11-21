
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('metronic/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('metronic/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('metronic/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('metronic/assets/js/pages/widgets.js')}}"></script>
<!--end::Page Scripts-->



<script type="text/javascript">
    $('#date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true
    });


    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true,
        endDate: new Date()
    });
    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true,

    });
    $('#datepickers').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true,

    });

    $('.datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        language: 'en',
        todayHighlight: true,
        startDate: new Date()

    });
    $('#datepickerFilter').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true
    });
    $('#datepickerFilter2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'en',
        todayHighlight: true
    });
    /*-*-*-*-*-*-*-*-* city and country *-*-*-*-*-*-*-*-*/
    $(function () {
        $('#country_id-field').on('change', function () {
            $.ajax({
                url: "{{url('/mngrAdmin/get_cities/')}}" + "/" + $(this).val(),
                type: 'get',

                success: function (data) {
                    document.getElementById('city_id-field').innerHTML = "";
                    $.each(data, function (i, content) {
                        document.getElementById('city_id-field').innerHTML += "<option value='" + content.id + "'>" + content.city + "</option>";
                    });


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    })
    /*-*-*-*-*-*-*-*-* photo upload *-*-*-*-*-*-*-*-*/
    $(document).ready(function () {
        $('.uploadPhoto').change(function (e) {
            // var node=this;
            var imageContent = $(this).attr('name');
            var files = e.target.files;
            $.each(files, function (i, file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function (e) {
                    //console.log($.inArray(file['type'],['image/gif','image/jpeg','image/png'])!=-1);
                    if ($.inArray(file['type'], ['image/gif', 'image/jpeg', 'image/png']) != -1) {
                        var template = '<div class="imgDiv"><img src="' + e.target.result + '" style="height:100px;width: 100px;"/><button type="button" id="cancel" class="btn btn-danger cancel">&times;</button></div>';
                    } else {
                        var template = '<div class="imgDiv"><a href="' + e.target.result + '">' + file['name'] + '</a><button type="button" id="cancel" class="btn btn-danger cancel">&times;</button></div>';
                    }
                    if (file['type'] == 'application/pdf') {
                        // if($(node).attr('type'))

                    } else {

                    }

                    $('#' + imageContent + '_upload').html(template);
                }
            })
        })
    });
    $("div").delegate(".cancel", "click", function (e) {
        e.preventDefault();
        $(this).closest(".imgDiv").remove();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.clickable-row td:not(.exclude-td)', function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location = $(this).parent('.clickable-row').data("href");
    });
</script>
<script src="{{asset('assets2/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets2/ckeditor/style.js')}}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'imageUpload',
                    'insertTable',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            language: 'en'
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
