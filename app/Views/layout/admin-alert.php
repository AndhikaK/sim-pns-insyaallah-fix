<!-- success alert -->
<?php if (session()->getFlashData('success-delete')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hapus data berhasil!</strong> <?= session()->getFlashData('success-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-add')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah data berhasil!</strong> <?= session()->getFlashData('success-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('success-edit')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Edit berhasil!</strong> <?= session()->getFlashData('success-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- success alert -->



<!-- failded alert -->
<?php if (session()->getFlashData('failed-delete')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hapus data gagal!</strong> <?= session()->getFlashData('failed-delete') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-add')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah data gagal!</strong> <?= session()->getFlashData('failed-add') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed-edit')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Edit data gagal!</strong> <?= session()->getFlashData('failed-edit') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- failded alert -->