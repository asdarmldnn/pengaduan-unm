<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- MDB icon -->
    <link rel="icon" href="<?= base_url() ?>assets/admin/img/logo.png" type="image/x-icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
    <!--===============================================================================================-->
    <style>
        /* loading */
        .modal2 {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('<?= base_url(); ?>assets/loading/loading4.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
             the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
             modal element will be visible */
        body.loading .modal2 {
            display: block;
        }
    </style>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
</head>

<body>


    <div class="container-login100" style="background-image: url('<?= base_url() ?>assets/login/images/bg-2.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form id="form_login" class="login100-form validate-form">
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
                    <input class="input100" type="text" name="username" id="username" placeholder="username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="password" id="password" placeholder="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button onclick="login(); return false;" class="login100-form-btn">
                        Sign In
                    </button>
                </div>

                <div class="text-center p-t-57 p-b-20">
                    <a href="#">
                        <span class="txt1">
                            Lupa Password ?
                        </span>
                    </a>
                </div>

                <!-- <div class="flex-c p-b-112">
                    <a href="#" class="login100-social-item">
                        <i class="fa fa-facebook-f"></i>
                    </a>

                    <a href="#" class="login100-social-item">
                        <img src="<?= base_url() ?>assets/login/images/icons/icon-google.png" alt="GOOGLE">
                    </a>
                </div> -->

                <!-- <div class="text-center">
                    <a href="#" class="txt2 hov1">
                        Sign Up
                    </a>
                </div> -->
            </form>


        </div>
    </div>



    <div id="dropDownSelect1"></div>


    <div class="modal2">
        <!-- Place at bottom of page -->
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/login/js/main.js"></script>
    <script src="<?= base_url() ?>assets/sweertalert/sweetalert2.all.min.js"></script>


    <script>
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");

            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }

        });

        function login() {
            if ($('#username').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Username masih kosong',

                });
                return false;
            } else if ($('#password').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Password masih kosong',

                });
                return false;
            }

            var formData = new FormData($('#form_login')[0]);
            $.ajax({
                type: "POST",
                url: '<?= base_url('login/auth'); ?>',
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {

                    if (data.status == true) {

                        var url = "<?php echo site_url(); ?>welcome.html";
                        var res_url = encodeURI(url);
                        window.location = res_url;

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Username / password salah',

                        });
                    }
                }
            });
        }
    </script>

</body>

</html>