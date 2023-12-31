
</div>
<!-- END layout-wrapper -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- apexcharts -->
{{--<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>--}}

<!-- jquery.vectormap map -->
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

{{--<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
{{--<script src="{{asset('assets/js/select2.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function (){

        $('#excel_export').click(function (){


            var filters = {
                group_id: $('select[name="group_id"]').val(),
                auditor_title: $('select[name="auditor_title"]').val(),
                order_status: $('select[name="order_status"]').val(),
                mixin_single: $('select[name="mixin_single"]').val(),
                start_date: $('input[name="start_date"]').val(),
                end_date: $('input[name="end_date"]').val(),
                text: $('input[name="text"]').val()
            };

            var queryParams = $.param(filters);

            window.location.href = '/report_export?' + queryParams;


        })

        // $("#create_order_auditor").submit(function(event) {
        //     var serviceType = $("select[name='service_type']").val();
        //
        //     if (serviceType === null || serviceType === "----") {
        //         alert("Xidmət növünü seçin.");
        //
        //         event.preventDefault();
        //     }
        // });


        $('.js-example-basic-single').select2();

        $('.js-example-basic-multiple').select2();

        $('#my-checkbox').change(function() {
            if ($(this).is(':checked')) {
                $('#custom-input').removeAttr('name');
            } else {
                $('#custom-input').attr('name', 'custom_input_driver').val(0);
            }
        });

        $('#my-checkbox1').change(function() {
            if ($(this).is(':checked')) {
                $('#custom-input3').removeAttr('name');
            } else {
                $('#custom-input3').attr('name', 'custom_input_worker').val(0);
            }
        });

        $('#my-checkbox4').change(function() {
            if ($(this).is(':checked')) {
                $('#custom-input4').removeAttr('name');
            } else {
                $('#custom-input4').attr('name', 'custom_input_operator').val(0);
            }
        });

        $('#my-checkbox2').change(function() {
            if ($(this).is(':checked')) {
                $('#custom-input2').removeAttr('name');
            } else {
                $('#custom-input2').attr('name', 'custom_input_master').val(0);
            }
        });

        $('#my-checkbox5').change(function() {
            if ($(this).is(':checked')) {
                $('#custom-input4').removeAttr('name');
            } else {
                $('#custom-input4').attr('name', 'custom_input_satisfied').val(0);
            }
        });

    });

    $(function () {
        $(document).ready(function () {

             $('#fileUploadForm').ajaxForm({

                 beforeSubmit: function (formData, jqForm, options) {

                     if (!isValidFile()) {
                         return false;
                     }
                     return true;

                 },

                 beforeSend: function () {

                     var percentage = '0';

                 },

                 complete: function (xhr) {
                     if (xhr.status === 200) {
                         sessionStorage.setItem('showSuccess', 'true');
                         location.reload();
                     }
                 },


                 uploadProgress: function (event, position, total, percentComplete){

                     if (isValidFile()) {

                         $('.progress_button').css('pointer-events','none');
                         $('.progress_display').css('display','block');
                         var percentage = percentComplete;
                         $('.progress .progress-bar').css("width", percentage+'%', function() {
                             return $(this).attr("aria-valuenow", percentage) + "%";
                         })

                     }

                 },


             });


        });
        function isValidFile() {

            var fileInput = $('#fileInput');
            var file = fileInput[0].files[0];

            if (!file) {
                alert('Please select a file to upload.');
                return false;
            }


            var allowedExtensions = ['xlsx'];
            var fileExtension = file.name.split('.').pop().toLowerCase();

            if ($.inArray(fileExtension, allowedExtensions) === -1) {
                alert('Invalid file type. Please select a valid file.');
                return false;
            }

            return true;

        }
    });

    $(document).ready(function() {

        if (sessionStorage.getItem('showSuccess')) {
            $('#successMessage').fadeIn();
            sessionStorage.removeItem('showSuccess');
        }

    });

</script>
</body>

</html>
