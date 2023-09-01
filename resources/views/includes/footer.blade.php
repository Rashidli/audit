
</div>
<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>


<!-- apexcharts -->
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>


<script>

    $(document).ready(function (){
        $('#corporate_name').change(function(){
            var voen_number = $(this).find(':selected').attr('data-voen');
            $('#voen').val(voen_number);
        });

        $('.js-example-basic-single').select2();

        $('.group-checkbox').on('click', function() {

            // $(this).prop('checked', !$(this).prop('checked'));
            var groupBoolean =  $(this).prop('checked');
            var groupValue = $(this).data('group');

            $('input[type="checkbox"][data-group="' + groupValue + '"]').each(function() {

                if(groupBoolean){
                    $(this).prop('checked', true);
                }else{
                    $(this).prop('checked', false);
                }

            });

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


            var allowedExtensions = ['xlsx', 'xltx', 'xls', 'xlsb', 'xlsm'];
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
