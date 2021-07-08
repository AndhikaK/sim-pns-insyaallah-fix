<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/architectui/css/printDetail.css">

    <?= $this->include('/admin/edit/print_style')
    ?>


</head>

<body>
    <h1 class="text-center">Detail Pegawai</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 img-container">
                <img src="/profil/<?= $detailPegawai['profil'] ? $detailPegawai['profil'] : 'sdm-polri.png' ?>" class="col-12 p-1 px-2 img-preview" alt="" id="img-preview">

            </div>
            <div class="col-10">
                <table>
                    <tr>
                        <th>NIP</th>
                        <td><?= $detailPegawai['nip'] ?></td>
                        <th>Tanggal Lahir</th>
                        <td><?= $detailPegawai['ttl'] ?></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td><?= $detailPegawai['nik'] ?></td>
                        <th>Alamat</th>
                        <td><?= $detailPegawai['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $detailPegawai['nama_pegawai'] ?></td>
                        <th>Jenis Kelamin</th>
                        <td><?= $detailPegawai['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengangakatan</th>
                        <td><?= $detailPegawai['tanggal_pengangkatan'] ?></td>
                        <th>Agama</th>
                        <td><?= $detailPegawai['agama'] ?></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td><?= $detailPegawai['tempat_lahir'] ?></td>
                    </tr>

                </table>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <h4>Riwayat Pekerjaan</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <?php foreach ($colRwyPekerjaan as $colName => $colValue) : ?>
                                <th class="border"><?= $colName ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatPekerjaan) > 0) : ?>
                            <?php foreach ($riwayatPekerjaan as $item) : ?>
                                <tr class="border">
                                    <?php foreach ($colRwyPekerjaan as $colName => $colValue) : ?>
                                        <td class="border"><?= $item[$colValue] ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <?php foreach ($colRwyPekerjaan as $colName => $colValue) : ?>
                                    <th class="border">-</th>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4>Riwayat Golongan</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <?php foreach ($colRwyGolongan as $colName => $colValue) : ?>
                                <th class="border"><?= $colName ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatGolongan) > 0) : ?>
                            <?php foreach ($riwayatGolongan as $item) : ?>
                                <tr class="border">
                                    <?php foreach ($colRwyGolongan as $colName => $colValue) : ?>
                                        <td class="border"><?= $item[$colValue] ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <?php foreach ($colRwyGolongan as $colName => $colValue) : ?>
                                    <th class="border">-</th>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-6 mr-2">
                <h4>Riwayat Dikbangspes</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <th class="border">Tahun Kelulusan</th>
                            <th class="border">Dikbangspes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatDikbangspes) > 0) : ?>
                            <?php foreach ($riwayatDikbangspes as $item) : ?>
                                <tr class="table-light">
                                    <td class="border"><?= $item['tahun_lulus'] ?></td>
                                    <td class="border"><?= $item['nama_dikbangspes'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="border">-</td>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>Riwayat Dikbangum</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <th class="border">Tahun Kelulusan</th>
                            <th class="border">Dikbangum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatDikbangum) > 0) : ?>
                            <?php foreach ($riwayatDikbangum as $item) : ?>
                                <tr class="table-light">
                                    <td class="border"><?= $item['tahun_lulus'] ?></td>
                                    <td class="border"><?= $item['nama_dikbangum'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="border">-</td>
                                <td class="border">-</td>

                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mr-2">
                <h4>Riwayat Dikum</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <th class="border">Tahun Kelulusan</th>
                            <th class="border">Dikum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatDikum) > 0) : ?>
                            <?php foreach ($riwayatDikum as $item) : ?>
                                <tr class="table-light">
                                    <td class="border"><?= $item['tahun_lulus'] ?></td>
                                    <td class="border"><?= $item['jenjang'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="border">-</td>
                                <td class="border">-</td>

                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>Riwayat Dikpol</h4>
                <table>
                    <thead>
                        <tr class="border">
                            <th class="border">Tahun Kelulusan</th>
                            <th class="border">Dikpol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($riwayatDikpol) > 0) : ?>
                            <?php foreach ($riwayatDikpol as $item) : ?>
                                <tr class="table-light">
                                    <td class="border"><?= $item['tahun_lulus'] ?></td>
                                    <td class="border"><?= $item['nama_dikpol'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="border">-</td>
                                <td class="border">-</td>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <?php foreach ($colKeluarga as $colName => $colValue) : ?>
                                <th class="border"><?= $colName ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($dataKeluarga) > 0) : ?>
                            <?php foreach ($dataKeluarga as $item) : ?>
                                <tr>
                                    <?php foreach ($colKeluarga as $colName => $colValue) : ?>
                                        <td class="border"><?= $item[$colValue] ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <?php foreach ($colKeluarga as $col) : ?>
                                    <td class="border">-</td>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>