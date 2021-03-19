<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIM-PNS</title>
    <link rel="stylesheet" href="/assets/architectui/css/login.css">
    <link href="/assets/architectui/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/architectui/css/material-design-iconic-font.min.css">
</head>

<body>

    <?= $this->include('layout/admin-alert') ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="ganti_pass" action="<?= base_url('/admin/account/gantipassword') ?>" method="POST">
                    <!-- <span class="login-logo">
                        <img src="/assets/architectui/images/logo-2.png" alt="">
                    </span> -->
                    <span class="login100-form-title p-b-26">
                        Ganti Password
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                            <!-- <i class=" pe-7s-ribbon"></i> -->

                        </span>
                        <input class="input100" type="password" name="oldPass" id="oldPass">
                        <span class="focus-input100" data-placeholder="Password lama"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                            <!-- <i class=" pe-7s-ribbon"></i> -->

                        </span>
                        <input class="input100" type="password" name="confirmPass" id="confirmPass">
                        <span class="focus-input100" data-placeholder="Password Baru"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                            <!-- <i class=" pe-7s-ribbon"></i> -->

                        </span>
                        <input class="input100" type="password" name="confirmPass2" id="confirmPass2">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/assets/architectui/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/architectui/scripts/login.js"></script>

</body>

</html>



<script>
    let form = document.querySelector('#ganti_pass')
    let oldPass = "<?= $passLama ?>";
    let oldPassInput = document.querySelector('#oldPass');
    let confirmPassInput = document.querySelector('#confirmPass');
    let confirmPassInput2 = document.querySelector('#confirmPass2');

    form.addEventListener('submit', function(event) {
        if (oldPassInput.value != oldPass) {
            alert('Passwod lama tidak sesuai')
            event.preventDefault();
            event.stopPropagation();

            return false
        }

        if (confirmPassInput.value != confirmPassInput2.value || confirmPassInput.value === '') {
            alert('Konfirmasi password tidak sama')
            event.preventDefault();
            event.stopPropagation();

            return false
        }
    })
</script>