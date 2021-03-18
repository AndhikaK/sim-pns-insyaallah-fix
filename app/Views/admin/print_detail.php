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
    </div>
</body>

</html>