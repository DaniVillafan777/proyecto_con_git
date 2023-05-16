<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon.ico') ?>">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/css/bootstrap.min.css') ?>">
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/css/owl.carousel.min.css') ?>">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/css/owl.theme.default.min.css')?>">    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/css/css/style.css') ?>">
    <script src="<?= base_url('assets/js/js/jquery.min.js') ?>" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Prixima BS5 Template</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- TOP NAV -->
    <?= $this->include('layout/header') ?>

    <!-- BOTTOM NAV -->
    <?= $this->include('layout/menu') ?>
    <section>
        <div class="container">
            <?= $this->renderSection('contenido') ?>
        </div>
    </section> 

    <?= $this->include('layout/footer') ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>NUEVO REGISTRO</h3>
                </div>
                <div class="modal-body p-0">
                    <div class="container-fluid" id="mdl-contenido">
                    </div>
                </div>
                <!-- <div class="modal-footer"></div> -->
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/js/app.js') ?>"></script>
</body>

</html>