<!-- success alert -->
<?php if (session()->getFlashData('success-delete')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success p-2">Berhasil!</span> <?= session()->getFlashData('success-delete') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-add')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success p-2">Berhasil!</span> <?= session()->getFlashData('success-add') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-edit')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success p-2">Berhasil!</span> <?= session()->getFlashData('success-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- success alert -->



<!-- failded alert -->
<?php if (session()->getFlashData('failed-delete')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-danger p-2">Gagal!</span> <?= session()->getFlashData('failed-delete') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-add')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-danger p-2">Gagal!</span> <?= session()->getFlashData('failed-add') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-edit')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-danger p-2">Gagal!</span> <?= session()->getFlashData('failed-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- failded alert -->