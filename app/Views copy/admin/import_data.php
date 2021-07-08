<?= $this->extend('layout/admin-template') ?>


<?= $this->section('content') ?>

<!-- main content  -->
<div class="row">

    <div class="col-6">
        <div class="card mb-3">
            <h5 class="card-header bg-primary text-white">Import Data Pegawai</h5>
            <div class="row p-3">
                <form action="<?= base_url('/admin/lihatpegawai/importpegawai') ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-12 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="import-pegawai">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="/format-import/format_import_pegawai.xlsx" class="btn btn-primary" download="">Format Excel</a>
                        <button class="btn btn-success">IMPORT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card mb-3">
            <h5 class="card-header bg-warning text-white">Import Riwayat Pekerjaan</h5>
            <div class="row p-3">
                <form action="<?= base_url('/admin/lihatpegawai/importrwypekerjaan') ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-12 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="import-pekerjaan">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="/format-import/format_import_riwayat_pekerjaan.xlsx" class="btn btn-primary">Format Excel</a>
                        <button class="btn btn-success">IMPORT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card mb-3">
            <h5 class="card-header bg-success text-white">Import Riwayat Golongan</h5>
            <div class="row p-3">
                <form action="<?= base_url('/admin/lihatpegawai/importrwygolongan') ?>" method="POST" enctype="multipart/form-data">

                    <div class="col-12 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="import-rwy-golongan">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="/format-import/format_import_riwayat_golongan.xlsx" class="btn btn-primary">Format Excel</a>
                        <button class="btn btn-success">IMPORT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card mb-3">
            <h5 class="card-header bg-secondary text-white">Import Data Keluarga</h5>
            <div class="row p-3">
                <form action="<?= base_url('/admin/lihatpegawai/importkeluarga') ?>" method="POST" enctype="multipart/form-data">

                    <div class="col-12 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="import-keluarga">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="/format-import/format_import_keluarga.xlsx" class="btn btn-primary">Format Excel</a>
                        <button class="btn btn-success">IMPORT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- main content  -->


<?= $this->endSection() ?>