<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5">
    <h5 class="pt-5"><?= $title ?></h5>

    <?= $this->include('layout/admin-alert') ?>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("admin/editdetail/tambahkeluarga/$nip") ?>" class="">
            <?php foreach ($colForm as $name => $value) : ?>
                <div class="form-group row">
                    <label for="<?= $value ?>" class="col col-form-label"><?= $name ?></label>
                    <div class="col-sm-8">
                        <?php if (str_contains($value, 'tanggal')) : ?>
                            <input type="date" class="form-control form-control-sm" name="<?= $value ?>">
                        <?php else : ?>
                            <input type="text" class="form-control form-control-sm" id="<?= $value ?>" name="<?= $value ?>">
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>

            <input type="text" value="<?= $nip ?>" name="nip" hidden>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="border border-dark rounded p-3 bg-white">
        <table class="table m-0 p-0 table-responsive table-riwayat">
            <thead>
                <th>Action</th>
                <?php foreach ($colForm as $name => $value) : ?>
                    <th><?= $name ?></th>
                <?php endforeach ?>
            </thead>

            <?php if (count($dataKeluarga) > 0) : ?>
                <tbody class="tbody-rwy">
                    <?php foreach ($dataKeluarga as $item) : ?>
                        <tr>
                            <?php if ($idItem == $item['id_keluarga']) : ?>
                                <form action="<?= base_url("/admin/editdetail/editkeluarga/$nip/" . $item['id_keluarga']) ?>" method="POST">
                                    <td>
                                        <button class="clean-button"><i class="pe-7s-diskette action-icon"></i></button>
                                        <a href="<?= base_url("/admin/keluarga/$nip/") ?>" class="svg-col-blue text-danger"><i class="pe-7s-close action-icon"></i></a>

                                        <?php /* ?>
                                        <button class="icon-button">
                                            <!-- <img src="/asset/svg/check-circle-solid.svg" class="fa-icon-success fa-icon" alt=""> -->
                                            simpan
                                        </button>
                                        <a href="<?= base_url("/admin/keluarga/$nip/") ?>" class="">
                                            <!-- <img src="/asset/svg/window-close-solid.svg" class="fa-icon-danger fa-icon" alt=""> -->
                                            batal
                                        </a>
                                        <?php */ ?>
                                    </td>
                                    <?php foreach ($colForm as $name => $value) : ?>
                                        <td class="pb-2"><input type="<?= str_contains($value, 'tanggal') ? 'date' : 'text' ?>" name="<?= $value ?>" value="<?= $item[$value] ?>"></td>
                                    <?php endforeach ?>

                                </form>
                            <?php else : ?>
                                <td>
                                    <a href="<?= base_url("/admin/keluarga/$nip/" . $item['id_keluarga']) ?>" class="svg-col-blue"><i class="pe-7s-pen action-icon"></i></a>
                                    <a href="<?= base_url("/admin/editdetail/deletekeluarga/$nip/" . $item['id_keluarga']) ?>" class="svg-col-blue text-danger"><i class="pe-7s-trash action-icon"></i></a>

                                    <?php /* ?>
                                    <a href="<?= base_url("/admin/keluarga/$nip/" . $item['id_keluarga']) ?>" class="">
                                        <!-- <img src="/asset/svg/edit-solid.svg" class="fa-icon-primary fa-icon" alt=""> -->
                                        edit
                                    </a>
                                    <a href="<?= base_url("/admin/editdetail/deletekeluarga/$nip/" . $item['id_keluarga']) ?>" class="">
                                        <!-- <img src="/asset/svg/trash-solid.svg" class="fa-icon-danger fa-icon" alt=""> -->
                                        delete
                                    </a>
                                    <?php */ ?>
                                </td>
                                <?php foreach ($colForm as $name => $value) : ?>
                                    <td class="pb-2"><?= $item[$value] ?></td>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            <?php else : ?>
                <tbody>
                    <td>-</td>
                </tbody>
            <?php endif ?>
        </table>
    </div>
</div>
<?= $this->endSection() ?>