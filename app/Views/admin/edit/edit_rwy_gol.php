<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5 pt-5">
    <h5><?= $title ?></h5>
    <?= $this->include('layout/admin-alert') ?>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("admin/editdetail/tambahriwayatgol/$nip") ?>" class="">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. SK</label>
                        <input type="text" class="form-control" id="no_sk" name="no_sk" placeholder="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Golongan - Pangkat</label>
                        <input type="text" class="form-control" list="golonganListOption" id="id_golongan" name="id_golongan" placeholder="" required autocomplete="off">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Periode Mulai</label>
                        <input type="date" class="form-control" id="periode_mulai" name="periode_mulai" placeholder="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Periode_selesai</label>
                        <input type="date" class="form-control" id="periode_selesai" name="periode_selesai" placeholder="" required autocomplete="off">
                    </div>
                </div>
            </div>

            <input type="text" value="<?= $nip ?>" name="nip" hidden>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="row p-3 mb-2 bg-white">
        <div class="table-responsive">
            <table class="table table-sm table-responsive table-riwayat mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <?php foreach ($colRwyGolongan as $name => $value) : ?>
                            <th><?= strtoupper($name) ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($riwayatGolongan as $item) : ?>
                        <tr>
                            <form action="<?= base_url('/admin/editdetail/saveRwyGolongan') ?>" method="POST">
                                <td><?= $i++ ?></td>
                                <td class="d-inline-flex">
                                    <?php if ($edit != 'edit-rwy-gol-' . $item['id_riwayat_golongan']) : ?>
                                        <a href="<?= base_url('/admin/rwy_golongan/' . $nip . '/edit-rwy-gol-' . $item['id_riwayat_golongan']) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                        <a href="<?= count($riwayatGolongan) < 2 ? "#" : base_url('/admin/editdetail/deleterwygolongan/' . $item['id_riwayat_golongan']) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
                                    <?php elseif ($edit) : ?>
                                        <button type="submit" uk-icon="check" class="text-success"></button>
                                        <a href="<?= base_url('/admin/rwy_golongan/' . $nip) ?>" uk-icon="close" class="text-danger"></a>
                                    <?php endif; ?>
                                </td>
                                <?php foreach ($colRwyGolongan as $name => $value) : ?>
                                    <td>
                                        <?php if ($name == "jabatan" || $name == 'satker' || $name == 'bagian' || $name == 'subbag') : ?>
                                            <input type="text" list="<?= $name . 'ListOption' ?>" name="<?= 'id_' . $name ?>" value="<?= $item['id_' . $name] . " - " . $item['nama_' . $name] ?>" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled"  ?> autocomplete="off">
                                        <?php elseif (str_contains($name, 'periode')) : ?>
                                            <input class="form-control" type="date" value="<?= $item[$value] ?>" name="<?= $value ?>" id="ttl" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled" ?> autocomplete="off">
                                        <?php else : ?>
                                            <input type="text" name="<?= $value ?>" value="<?= strtoupper($item[$value]) ?>" <?= $edit == 'edit-rwy-gol-' . $item['id_riwayat_golongan'] ? "" : "disabled"  ?>>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach ?>
                                <input type="text" name="id_riwayat_golongan" value="<?= $item['id_riwayat_golongan'] ?>" hidden>
                                <input type="text" name="nip" value="<?= $nip ?>" hidden>
                            </form>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- datalist for input -->
    <datalist id="golonganListOption">
        <?php foreach ($golongan as $item) : ?>
            <option value="<?= $item['id_golongan'] . " - " . $item['pangkat'] ?>"></option>
        <?php endforeach ?>
    </datalist>
    <!-- datalist for input -->

</div>

<?= $this->endSection() ?>