@php
$user = auth()->user();
@endphp
<script>
    $(document).ready(function() {
        var user = @json($user);

        // Adding  data in through the api...
        $('body').on('submit','.apiform', function(e) {
            e.preventDefault();
            alert();
            var form = $(this);
            var apiname = form.attr('action');
            var apiurl = "{{ end_url('') }}" + apiname;
            var formData = new FormData(this);
            var bearerToken = "{{session('user')}}";

            $.ajax({
                url: apiurl,
                type: 'POST',
                data: formData,
                headers: {
                    'Authorization': 'Bearer ' + bearerToken
                },
                contentType: false,
                processData: false,
                beforeSend: function() {},
                success: function(response) {

                    if (response.status === 'success') {
                        alert('working');
                    } else if (response.status === 'error') {

                    }
                },
                error: function(xhr, status, error) {
                    console.log(status);

                }
            });
        });

        // function dismissModal(modle_id) {
        //     $('#addclient').modal('hide');
        //     $('#formData')[0].reset();
        // }

        // $('input').on('input', function() {
        //     $(this).removeClass('error');
        //     $(this).next('.error-label').remove();
        // });

        // function showAlert(title, message, type) {

        //     swal({
        //         title: title,
        //         text: message,
        //         icon: type,
        //         showClass: {
        //             popup: 'swal2-show',
        //             backdrop: 'swal2-backdrop-show',
        //             icon: 'swal2-icon-show'
        //         },
        //         hideClass: {
        //             popup: 'swal2-hide',
        //             backdrop: 'swal2-backdrop-hide',
        //             icon: 'swal2-icon-hide'
        //         },
        //         onOpen: function() {
        //             $('.swal2-popup').css('animation', 'swal2-show 0.5s');
        //         },
        //         onClose: function() {
        //             $('.swal2-popup').css('animation', 'swal2-hide 0.5s');
        //         }
        //     });

        // }

        // function showloading(title, message) {
        //     login_alert = swal({
        //         title: title,
        //         content: {
        //             element: "div",
        //             attributes: {
        //                 class: "custom-spinner"
        //             }
        //         },
        //         text: message,
        //         buttons: false,
        //         closeOnClickOutside: false,
        //         closeOnEsc: false,
        //         onOpen: function() {
        //             $('.custom-spinner').addClass('spinner-border spinner-border-sm text-primary');
        //         },
        //         onClose: function() {
        //             $('.custom-spinner').removeClass('spinner-border spinner-border-sm text-primary');
        //         }
        //     });

        //     return login_alert;
        // }
    });
</script>