<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-PNS</title>

    <link href="/assets/architectui/main.css" rel="stylesheet">
    <link href="/assets/architectui/css/my-style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/architectui/css/select2.css" />
</head>

<body>

    <?= $this->include('layout/user-header') ?>

    <div class="card m-4">
        <div class="row mb-5">
            <div class="col-12">
                <div class=" p-3">
                    <!-- Biodata -->
                    <div class="row justify-content-end">
                        <a href=""><button class="btn btn-warning mr-2"><i class="pe-7s-print"></i> Print</button></a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="/profil/<?= $detailPegawai['profil'] ? $detailPegawai['profil'] : 'sdm-polri.png' ?>" class="col-12 img-preview" id="img-preview" width="400">
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="nip" class="col col-form-label-sm form-label-small label-bio">NIP/NRP</label>
                                <div class="col-8">
                                    <input type="text" class="form-control form-bio" id="nip" name="nip" value="<?= $detailPegawai['nip'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_pegawai" class="col col-form-label-sm form-label-small label-bio">Nama Pegawai</label>
                                <div class="col-8">
                                    <input type="text" class="form-control form-bio" id="nama_pegawai" name="nama_pegawai" value="<?= $detailPegawai['nama_pegawai'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_pengangkatan" class="col col-form-label-sm form-label-small label-bio">TGL. Pengangkatan</label>
                                <div class="col-8">
                                    <input class="form-control form-bio" type="date" value="<?= $detailPegawai['tanggal_pengangkatan'] ?>" name="tanggal_pengangkatan" id="tanggal_pengangkatan" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col col-form-label-sm form-label-small label-bio">Tempat, Tanggal Lahir</label>
                                <div class="col-8">
                                    <input type="text" class="form-control form-bio col-auto" id="tempat_lahir" name="tempat_lahir" value="<?= $detailPegawai['tempat_lahir'] ?>" disabled autocomplete="off">
                                    <input class="form-control form-bio col-auto" type="date" value="<?= $detailPegawai['ttl'] ?>" name="ttl" id="ttl" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col col-form-label-sm form-label-small label-bio">Alamat</label>
                                <div class="col-8">
                                    <input type="text" class="form-control form-bio" id="alamat" name="alamat" value="<?= $detailPegawai['alamat'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin" class="col col-form-label-sm form-label-small label-bio">Jenis Kelamin</label>
                                <div class="col-8">
                                    <input type="text" list="genderListOption" class="form-control form-bio" id="jenis_kelamin" name="jenis_kelamin" value="<?= $detailPegawai['jenis_kelamin'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col col-form-label-sm form-label-small label-bio">Agama</label>
                                <div class="col-8">
                                    <input type="text" list="agamaListOption" class="form-control form-bio" id="agama" name="agama" value="<?= $detailPegawai['agama'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="nik" class="col col-form-label-sm form-label-small label-bio">NIK</label>
                                <div class="col-8">
                                    <input type="text" class="form-control form-bio" id="nik" name="nik" value="<?= $detailPegawai['nik'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_golongan" class="col col-form-label-sm form-label-small label-bio">Golongan dan Pangkat</label>
                                <div class="col-8">
                                    <input type="text" list="golonganListOption" class="form-control form-bio" id="id_golongan" name="id_golongan" value="<?= ($edit == 'edit-bio' ? $riwayatGolongan[0]['id_golongan'] . " - " : "") . $riwayatGolongan[0]['pangkat'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_jabatan" class="col col-form-label-sm form-label-small label-bio">Jabatan</label>
                                <div class="col-8">
                                    <input type="text" list="jabatanListOption" class="form-control form-bio" id="id_jabatan" name="id_jabatan" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_jabatan'] . " - " : "") . $riwayatPekerjaan[0]['nama_jabatan'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_satker" class="col col-form-label-sm form-label-small label-bio">Satuan Kerja</label>
                                <div class="col-8">
                                    <input type="text" list="satkerListOption" class="form-control form-bio" id="id_satker" name="id_satker" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_satker'] . " - " : "") . $riwayatPekerjaan[0]['nama_satker'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_bagian" class="col col-form-label-sm form-label-small label-bio">Bagian</label>
                                <div class="col-8">
                                    <input type="text" list="bagianListOption" class="form-control form-bio" id="id_bagian" name="id_bagian" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_bagian'] . " - " : "") . $riwayatPekerjaan[0]['nama_bagian'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_subbag" class="col col-form-label-sm form-label-small label-bio">Subbag</label>
                                <div class="col-8">
                                    <input type="text" list="subbagListOption" class="form-control form-bio" id="id_subbag" name="id_subbag" value="<?= ($edit == 'edit-bio' ? $riwayatPekerjaan[0]['id_subbag'] . " - " : "") . $riwayatPekerjaan[0]['nama_subbag'] ?>" disabled autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- biodata -->
                    <hr>
                    <!-- riwayat pekerjaan -->
                    <div class="row">
                        <div class="col text-center">
                            <h4>Riwayat Pekerjaan</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <?php foreach ($colRwyPekerjaan as $colName => $colValue) : ?>
                                            <th><?= $colName ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatPekerjaan as $item) : ?>
                                        <tr>
                                            <?php foreach ($colRwyPekerjaan as $colName => $colValue) : ?>
                                                <td><?= $item[$colValue] ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- riwayat pekerjaan -->
                    <hr>
                    <!-- riwayat golongan  -->
                    <div class="row">
                        <div class="col text-center">
                            <h4>Riwayat Golongan</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <?php foreach ($colRwyGolongan as $colName => $colValue) : ?>
                                            <th><?= $colName ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatGolongan as $item) : ?>
                                        <tr>
                                            <?php foreach ($colRwyGolongan as $colName => $colValue) : ?>
                                                <td><?= $item[$colValue] ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- riwayat golongan -->
                    <hr>
                    <!-- Pendidikan -->
                    <div class="row">
                        <div class="col text-center">
                            <h4>Pendidikan</h4>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-6 px-0 border border-light">
                            <div class="bg-primary p-2 text-white">Pendidikan Umum</div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <th>Tahun Kelulusan</th>
                                        <th>Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatDikum as $item) : ?>
                                        <tr class="table-light">
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['jenjang'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 px-0 border border-light">
                            <div class="bg-primary p-2 text-white">Pendidikan Pengembangan Umum</div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <th>Tahun Kelulusan</th>
                                        <th>Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatDikbangum as $item) : ?>
                                        <tr class="table-light">
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikbangum'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 px-0 border border-light">
                            <div class="bg-primary p-2 text-white">Pendidikan Pengembangan Spesialis</div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <th>Tahun Kelulusan</th>
                                        <th>Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatDikbangspes as $item) : ?>
                                        <tr class="table-light">
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikbangspes'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 px-0 border border-light">
                            <div class="bg-primary p-2 text-white">Pendidikan Kepolisian</div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <th>Tahun Kelulusan</th>
                                        <th>Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayatDikpol as $item) : ?>
                                        <tr class="table-light">
                                            <td><?= $item['tahun_lulus'] ?></td>
                                            <td><?= $item['nama_dikpol'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pendidikan -->
                    <hr>
                    <!-- keluarga -->
                    <div class="row">
                        <div class="col text-center">
                            <h4>Data Keluarga</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-active">
                                        <?php foreach ($colKeluarga as $colName => $colValue) : ?>
                                            <th><?= $colName ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataKeluarga as $item) : ?>
                                        <tr>
                                            <?php foreach ($colKeluarga as $colName => $colValue) : ?>
                                                <td><?= $item[$colValue] ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- keluarga -->

            </div>
        </div>
    </div>

    <script type="text/javascript" src="/assets/architectui/scripts/main.js"></script>
</body>

</html>