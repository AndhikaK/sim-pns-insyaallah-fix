<?= $this->extend('layout/admin-template') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/css/uikit.min.css" />
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit-icons.min.js"></script>

<div class="container-fluid rounded bg-white p-5">

    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $master ?>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href=" <?= base_url('/admin/data_master/jabatan') ?> ">Jabatan</a>
            <a class="dropdown-item" href=" <?= base_url('/admin/data_master/golongan') ?> ">Pangkat dan Golongan</a>
            <a class="dropdown-item" href=" <?= base_url('/admin/data_master/satker') ?> ">Satuan Kerja</a>
            <a class="dropdown-item" href=" <?= base_url('/admin/data_master/bagian') ?>">Bagian</a>
            <a class="dropdown-item" href=" <?= base_url('/admin/data_master/subbag') ?> ">Subbag</a>
        </div>
    </div>



    <button class="btn btn-success mb-3" type="button" data-toggle="collapse" data-target="#collapse-filter" aria-expanded="false" aria-controls="collapse-filter">
        Tambah data
    </button>

    <div class="collapse col-12 mt-2 mb-4" id="collapse-filter">
        <form method="POST" action="<?= base_url('/admin/datamaster/savemasterdata') . '/' . $master ?>">

            <?php foreach ($colTable as $col) : ?>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label col-form-label-sm"> <?= strtoupper(str_replace("_", " ", $col)) ?> </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="<?= $col ?>" name="<?= $col ?>" required>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>


    <!-- table data master -->
    <table class="table table-responsive">
        <thead class="thead-dark">
            <tr>
                <th>Action</th>
                <?php foreach ($colTable as $col) : ?>
                    <th><?= strtoupper(str_replace('_', " ", $col)) ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTable as $item) : ?>
                <tr>
                    <form action="<?= base_url('/admin/datamaster/updatedata') ?>" method="POST">
                        <td>
                            <?php if ($edit != 'edit-' . $item['id_' . $master]) : ?>
                                <a href="<?= base_url('/admin/data_master/' . $master . '/edit-' . $item['id_' . $master]) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                <a href="<?= base_url('/admin/datamaster/deletedata/' . $master . '/' . $item['id_' . $master]) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
                            <?php elseif ($edit) : ?>
                                <button type="submit" uk-icon="check" class="text-success"></button>
                                <a href="<?= base_url('/admin/data_master/' . $master) ?>" uk-icon="close" class="text-danger"></a>
                            <?php endif; ?>
                        </td>

                        <?php foreach ($colTable as $col) : ?>
                            <td>
                                <?php if (str_contains($col, 'id')) : ?>
                                    <input type="text" value="<?= $item[$col] ?>" name="<?= $col ?>" <?= $edit == 'edit-' . $item['id_' . $master] ? "readonly" : "disabled" ?>>
                                <?php else : ?>
                                    <input type="text" value="<?= $item[$col] ?>" name="<?= $col ?>" <?= $edit == 'edit-' . $item['id_' . $master] ? "" : "disabled" ?>>
                                <?php endif ?>

                            </td>
                        <?php endforeach ?>
                        <input type="text" name="table" value="<?= $master ?>" hidden>
                    </form>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- table data master -->
</div>

<?= $this->endSection() ?>