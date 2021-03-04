    <script>
        let $type = "<?php echo session('notification_type'); ?>";
        let $message = "<?php echo session('notification_message'); ?>";
        if($type != null){
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "6000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };

            switch($type){
                case 'info':
                    toastr.info($message);
                    break;

                case 'warning':
                    toastr.warning($message);
                    break;

                case 'success':
                    toastr.success($message);
                    break;

                case 'danger'://error replaced by danger
                    toastr.error($message);
                    break;
            }
            //unset_session after displaying message
        }
    </script>

    <?php
       //unset notification sessions
       session('notification_type','');
       session('notification_message','');
    ?>
