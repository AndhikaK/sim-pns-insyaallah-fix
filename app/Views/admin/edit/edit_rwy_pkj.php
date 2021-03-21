<?= $this->extend('layout/admin-template-sm-window') ?>

<?= $this->section('content') ?>

<div class="container pb-5 pt-5">
    <h5><?= $title ?></h5>
    <?= $this->include('layout/admin-alert') ?>

    <div class="border border-dark rounded p-3 mb-2 bg-white">
        <form action="<?= base_url("admin/editdetail/tambahRwyPekerjaan/$nip") ?>" class="">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. SK</label>
                        <input type="text" class="form-control" id="no_sk" name="no_sk" placeholder="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Satker</label>
                        <input type="text" class="form-control" list="satkerListOption" id="id_satker" name="id_satker" placeholder="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bagian</label>
                        <input type="text" class="form-control" list="bagianListOption" id="id_bagian" name="id_bagian" placeholder="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Subbag</label>
                        <input type="text" class="form-control" list="subbagListOption" id="id_subbag" name="id_subbag" placeholder="" required autocomplete="off">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" list="jabatanListOption" id="id_jabatan" name="id_jabatan" placeholder="" required autocomplete="off">
                    </div>
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
            <table class="table table-stripped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <?php foreach ($colRwyPekerjaan as $name => $value) : ?>
                            <th><?= strtoupper($name) ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($riwayatPekerjaan as $item) : ?>
                        <tr>
                            <form action="<?= base_url('/admin/editdetail/saveRwyPekerjaan') ?>" method="POST">
                                <td><?= $i++ ?></td>
                                <td class="d-inline-flex">
                                    <?php if ($edit != 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) : ?>
                                        <a href="<?= base_url('/admin/rwy_pekerjaan/' . $nip . '/edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) ?>" class="svg-col-blue"><i class="pe-7s-pen action-icon"></i></a>
                                        <a href="<?= count($riwayatPekerjaan) < 2 ? "#" : base_url('/admin/editdetail/deleterwypekerjaan/' . $item['id_riwayat_pekerjaan']) ?>" class="svg-col-blue text-danger"><i class="pe-7s-trash action-icon"></i></a>

                                        <?php /* ?>
                                        <a href="<?= base_url('/admin/rwy_pekerjaan/' . $nip . '/edit-rwy-pkj-' . $item['id_riwayat_pekerjaan']) ?>" class="uk-icon-link uk-margin-small-right text-primary" uk-icon="file-edit"></a>
                                        <a href="<?= count($riwayatPekerjaan) < 2 ? "#" : base_url('/admin/editdetail/deleterwypekerjaan/' . $item['id_riwayat_pekerjaan']) ?>" class="uk-icon-link text-danger" uk-icon="trash"></a>
                                        <?php */ ?>
                                    <?php elseif ($edit) : ?>
                                        <button class="clean-button"><i class="pe-7s-diskette action-icon"></i></button>
                                        <a href="<?= base_url('/admin/rwy_pekerjaan/' . $nip) ?>" class="svg-col-blue text-danger"><i class="pe-7s-close action-icon"></i></a>

                                        <?php /* ?>
                                        <button type="submit" uk-icon="check" class="text-success"></button>
                                        <a href="<?= base_url('/admin/rwy_pekerjaan/' . $nip) ?>" uk-icon="close" class="text-danger"></a>
                                        <?php */ ?>
                                    <?php endif; ?>
                                </td>
                                <?php foreach ($colRwyPekerjaan as $name => $value) : ?>
                                    <td>
                                        <?php if ($name == "jabatan" || $name == 'satker' || $name == 'bagian' || $name == 'subbag') : ?>
                                            <input type="text" list="<?= $name . 'ListOption' ?>" name="<?= 'id_' . $name ?>" value="<?= $item['id_' . $name] . " - " . $item['nama_' . $name] ?>" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled"  ?> autocomplete="off">
                                        <?php elseif (str_contains($name, 'periode')) : ?>
                                            <input class="form-control" type="date" value="<?= $item[$value] ?>" name="<?= $value ?>" id="ttl" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled" ?> autocomplete="off">
                                        <?php else : ?>
                                            <input type="text" name="<?= $value ?>" value="<?= strtoupper($item[$value]) ?>" <?= $edit == 'edit-rwy-pkj-' . $item['id_riwayat_pekerjaan'] ? "" : "disabled"  ?>>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach ?>
                                <input type="text" name="id_riwayat_pekerjaan" value="<?= $item['id_riwayat_pekerjaan'] ?>" hidden>
                                <input type="text" name="nip" value="<?= $nip ?>" hidden>
                            </form>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- datalist for input -->
    <datalist id="jabatanListOption">
        <?php foreach ($jabatan as $item) : ?>
            <option value="<?= $item['id_jabatan'] . " - " . $item['nama_jabatan'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="satkerListOption">
        <?php foreach ($satker as $item) : ?>
            <option value="<?= $item['id_satker'] . " - " . $item['nama_satker'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="bagianListOption">
        <?php foreach ($bagian as $item) : ?>
            <option value="<?= $item['id_bagian'] . " - " . $item['nama_bagian'] ?>"></option>
        <?php endforeach ?>
    </datalist>

    <datalist id="subbagListOption">
        <?php foreach ($subbag as $item) : ?>
            <option value="<?= $item['id_subbag'] . " - " . $item['nama_subbag'] ?>"></option>
        <?php endforeach ?>
    </datalist>
    <!-- datalist for input -->

</div>

<?= $this->endSection() ?>