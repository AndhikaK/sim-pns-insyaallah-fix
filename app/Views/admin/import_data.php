<?= $this->extend('layout/admin-template') ?>


<?= $this->section('content') ?>

<!-- main content  -->
<div class="row">
    <div class="col-12">
        <div class="card p-3">
            <form action="<?= base_url('/admin/lihatpegawai/importpegawai') ?>" method="POST" enctype="multipart/form-data">
                <h5>Import Data Pegawai</h5>
                <input type="file" name="import-pegawai">
                <button>import</button>
            </form>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card p-3">
            <form action="<?= base_url('/admin/lihatpegawai/importrwypekerjaan') ?>" method="POST" enctype="multipart/form-data">
                <h5>Import Riwayat Pekerjaan</h5>
                <input type="file" name="import-pekerjaan">
                <button>import</button>
            </form>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card p-3">
            <form action="<?= base_url('/admin/lihatpegawai/importrwygolongan') ?>" method="POST" enctype="multipart/form-data">
                <h5>Import Riwayat Golongan</h5>
                <input type="file" name="import-rwy-golongan">
                <button>import</button>
            </form>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card p-3">
            <form action="<?= base_url('/admin/lihatpegawai/importkeluarga') ?>" method="POST" enctype="multipart/form-data">
                <h5>Import Data Keluarga</h5>
                <input type="file" name="import-keluarga">
                <button>import</button>
            </form>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card p-3">
            <form action="<?= base_url('/admin/lihatpegawai/importpegawai') ?>" method="POST" enctype="multipart/form-data">
                <h5>Import Data Pegawai</h5>
                <input type="file" name="import-pegawai">
                <button>import</button>
            </form>
        </div>
    </div>
</div>
<!-- main content  -->


<?= $this->endSection() ?>