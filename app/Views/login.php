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
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?= base_url('Login/signInAttempt') ?>" method="POST">
                    <!-- <span class="login-logo">
                        <img src="/assets/architectui/images/logo-2.png" alt="">
                    </span> -->
                    <span class="login100-form-title p-b-26">
                        LOGIN
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nip">
                        <span class="focus-input100" data-placeholder="NIP"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                            <!-- <i class=" pe-7s-ribbon"></i> -->

                        </span>
                        <input class="input100" type="password" name="password">
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