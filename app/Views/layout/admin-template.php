<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?= $title ?> | SIM-PNS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="icon" href="/profil/sdm-polri.png" type="image/icon type">
    <link href="/assets/architectui/main.css" rel="stylesheet">
    <link href="/assets/architectui/css/my-style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/architectui/css/select2.css" />
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <!-- header -->
        <?= $this->include('layout/admin-header') ?>
        <!-- header -->


        <div class="app-main">

            <!-- sidebar menu -->
            <?= $this->include('layout/admin-sidebar') ?>
            <!-- sidebar menu -->

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <!-- content title here -->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div>
                                    <?= $title ?>
                                    <div class="page-title-subheading">
                                        <?= $subTitle ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content title here -->

                    <!-- alert -->
                    <?= $this->include('layout/admin-alert') ?>
                    <!-- alert -->

                    <!-- section -->
                    <?= $this->renderSection('content') ?>
                    <!-- section -->

                </div>

                <!-- footer -->
                <div class="app-wrapper-footer">

                </div>
                <!-- footer -->

            </div>
        </div>

    </div>

    <script type="text/javascript" src="/assets/architectui/scripts/main.js"></script>

    <script>
        function previewImg() {
            let profil = document.querySelector('#file-input');
            let profilPreview = document.querySelector('#img-preview');

            let fileProfil = new FileReader();
            fileProfil.readAsDataURL(profil.files[0]);
            fileProfil.onload = function(e) {
                profilPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>