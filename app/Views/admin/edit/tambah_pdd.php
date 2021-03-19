<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5">
    <h5 class="pt-5"><?= $title ?></h5>

    <?= $this->include('layout/admin-alert') ?>

    <div class="row">
        <div class="col-4">
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle mb-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= ucwords(strtolower($pdd)) ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href=" <?= base_url("/admin/edit_pdd/$nip/dikum") ?> ">Dikum</a>
                    <a class="dropdown-item" href=" <?= base_url("/admin/edit_pdd/$nip/dikbangspes") ?> ">Dikbangspes</a>
                    <a class="dropdown-item" href=" <?= base_url("/admin/edit_pdd/$nip/dikbangum") ?> ">Dikbangum</a>
                    <a class="dropdown-item" href=" <?= base_url("/admin/edit_pdd/$nip/dikpol") ?>">Dikpol</a>
                </div>
            </div>
        </div>
    </div>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("/admin/editdetail/tambahitempdd/$nip/$pdd") ?>" method="POST" class="">
            <?php foreach ($colForm as $name => $value) : ?>
                <div class="form-group row">
                    <label for="<?= $value ?>" class="col col-form-label"><?= $name ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= $value ?>">
                    </div>
                </div>
            <?php endforeach ?>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="border border-dark rounded p-3 bg-white">
        <table class="table m-0 p-0">
            <thead>
                <th>Action</th>
                <th>Tahun Kelulusan</th>
                <th>Pendidikan</th>
            </thead>

            <?php if (count($riwayatPDD) > 0) : ?>
                <tbody class="tbody-rwy">
                    <?php foreach ($riwayatPDD as $item) : ?>
                        <tr>
                            <?php if ($idItem == $item['id_riwayat_' . $pdd]) : ?>
                                <form action="<?= base_url("/admin/editdetail/editdatapdd/$nip/$pdd/" . $item["id_riwayat_" . $pdd]) ?>" method="POST">
                                    <td>
                                        <button class="icon-button">
                                            simpan
                                            <!-- <img src="/asset/svg/check-circle-solid.svg" class="fa-icon-success fa-icon" alt=""> -->
                                        </button>
                                        <a href="<?= base_url("/admin/editdetail/tambahpdd/$nip/$pdd/") ?>" class="">
                                            <!-- <img src="/asset/svg/window-close-solid.svg" class="fa-icon-danger fa-icon" alt=""> -->
                                            batal
                                        </a>
                                    </td>
                                    <?php foreach ($colForm as $name => $value) : ?>
                                        <td><input type="text" name="<?= $value ?>" value="<?= $item[$value] ?>"></td>
                                    <?php endforeach ?>

                                </form>
                            <?php else : ?>
                                <td>
                                    <a href="<?= base_url("/admin/edit_pdd/$nip/$pdd/" . $item['id_riwayat_' . $pdd]) ?>" class="">
                                        <!-- <img src="/asset/svg/edit-solid.svg" class="fa-icon-primary fa-icon" alt=""> -->
                                        edit
                                    </a>
                                    <a href="<?= base_url("/admin/editdetail/deletedatapdd/$nip/$pdd/" . $item['id_riwayat_' . $pdd]) ?>" class="">
                                        <!--  <img src="/asset/svg/trash-solid.svg" class="fa-icon-danger fa-icon" alt=""> -->
                                        hapus
                                    </a>
                                </td>
                                <?php foreach ($colForm as $name => $value) : ?>
                                    <td><?= $item[$value] ?></td>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            <?php else : ?>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            <?php endif ?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>