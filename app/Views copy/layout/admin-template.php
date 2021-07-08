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

    <?php if ($title != 'Beranda') : ?>
        <script type="text/javascript" src="/assets/architectui/scripts/main.js"></script>
    <?php endif ?>

    <script>
        function previewImg() {
            let profil = document.querySelector('.file-input-coba');
            let profilPreview = document.querySelector('#img-preview');
            let btnUploadProfil = document.querySelector('#upload-profil');

            let fileProfil = new FileReader();
            fileProfil.readAsDataURL(profil.files[0]);
            fileProfil.onload = function(e) {
                profilPreview.src = e.target.result;
            }

            btnUploadProfil.style.display = 'block'
        }
    </script>

    <!-- <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script> -->
</body>

</html>