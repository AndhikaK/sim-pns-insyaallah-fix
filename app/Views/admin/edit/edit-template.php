<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of modal dialogs styles and animations available.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="/assets/architectui/main.css" rel="stylesheet">
</head>

<body>


    <div class="row m-1 mt-3 mb-5">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="card-title">

                        <?= $this->include('layout/admin-alert') ?>

                        <h3><?= $title ?></h3>

                        <?= $this->renderSection('editContent') ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/assets/architectui/scripts/main.js"></script>
</body>

</html>