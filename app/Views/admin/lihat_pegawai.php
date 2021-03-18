<?= $this->extend('layout/admin-template') ?>

<?= $this->section('content') ?>


<!-- main content  -->
<div class="row">
    <div class="col ">
        <div class="card">
            <div class="card-body px-4">
                <form action="<?= base_url('/admin/lihat_pegawai') ?>" method="POST">

                    <!-- Search box -->
                    <div class="row p-2">
                        <div class="col pl-0">
                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan kata kunci ...">
                        </div>
                        <div class="col-2 px-0 filter-button d-flex justify-content-end">
                            <button class="btn btn-primary mr-2" type="submit">Search</button>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">filter</button>
                        </div>
                    </div>
                    <!-- Search box -->

                    <!-- collapse filter -->
                    <div class="collapse" id="collapseExample">
                        <div class="row ">
                            <div class="col-12 py-3">
                                <h4 class="card-title">Filter Kolom</h4>
                                <hr class="">
                                <div class="d-inline">
                                    <label class="checkbox check"> <input type="checkbox" name="nip" value="p.nip" <?= array_key_exists('nip', $columns) ? "checked" : "" ?>> <span>NIP</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="nik" value="nik" <?= array_key_exists('nik', $columns) ? "checked" : "" ?>> <span>NIK</span> </label>
                                    <label class="checkbox check"> <input type="checkbox" name="Nama_Pegawai" value="nama_pegawai" <?= array_key_exists('Nama_Pegawai', $columns) ? "checked" : "" ?>> <span>Nama Pegawai</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Pangkat" value="pangkat" <?= array_key_exists('Pangkat', $columns) ? "checked" : "" ?>> <span>Pangkat</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Jabatan" value="nama_jabatan" <?= array_key_exists('Jabatan', $columns) ? "checked" : "" ?>> <span>Jabatan</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Satker" value="nama_satker" <?= array_key_exists('Satker', $columns) ? "checked" : "" ?>> <span>Satker</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Bagian" value="nama_bagian" <?= array_key_exists('Bagian', $columns) ? "checked" : "" ?>> <span>Bagian</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Subbag" value="nama_subbag" <?= array_key_exists('Subbag', $columns) ? "checked" : "" ?>> <span>Subbag</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Tanggal_Pengangkatan" value="tanggal_pengangkatan" <?= array_key_exists('Tanggal_Pengangkatan', $columns) ? "checked" : "" ?>> <span>Tanggal Pengangkatan</span></label>

                                    <label class="checkbox check"> <input type="checkbox" name="Agama" value="agama" <?= array_key_exists('Agama', $columns) ? "checked" : "" ?>> <span>Agama</span></label>
                                    <label class="checkbox check"> <input type="checkbox" name="Tanggal_Lahir" value="ttl" <?= array_key_exists('Tanggal_Lahir', $columns) ? "checked" : "" ?>> <span>Tanggal Lahir</span> </label>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Filter Kategori</h4>
                        <hr class="">
                        <div class="row px-3">
                            <div class="col-4 p-2">
                                <select name="filter-nama_jabatan-[]" id="nama_jabatan" class="form-control select2 px-0 mx-0" multiple="multiple" style="width: 100%;"></select>
                            </div>
                            <div class="col-4 p-2">
                                <select name="filter-r_gol@id_golongan-[]" id="id_golongan" class="form-control select2 px-0 mx-0" multiple="multiple" style="width: 100%;"></select>
                            </div>
                            <div class="col-4 p-2">
                                <select name="filter-nama_satker-[]" id="nama_satker" class="form-control select2 px-0 mx-0" multiple="multiple" style="width: 100%;"></select>
                            </div>
                            <div class="col-4 p-2">
                                <select name="filter-nama_bagian-[]" id="nama_bagian" class="form-control select2" multiple="multiple" style="width: 100%;"></select>
                            </div>
                            <div class="col-4 p-2">
                                <select name="filter-nama_subbag-[]" id="nama_subbag" class="form-control select2" multiple="multiple" style="width: 100%;"></select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-primary mr-2" type="submit">Apply</button>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <!-- collapse filter -->
                </form>
                <div class="row  p-2">
                    <div class="col-12">

                        <?php if (count($dataPegawai) > 0) : ?>
                            <div class="table-responsive">
                                <h4><?= $keyword ? "Menampilkan hasil pencarian '$keyword'" : "" ?></h4>

                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="text" list="pageListOption" class="input-perpage" id="perPage" name="perPage" onchange="setPerPage()" value="<?= $perPage ?>" autocomplete="off"> data
                                        <datalist id="pageListOption">
                                            <option value="10"></option>
                                            <option value="20"></option>
                                            <option value="50"></option>
                                            <option value="100"></option>
                                            <option value="semua"></option>
                                        </datalist>
                                    </div>
                                    <div class="col-auto">
                                        <form action="<?= base_url('/Admin/lihatpegawai/exportQuery/') ?>" method="POST" class="inline">
                                            <a href="<?= base_url('/admin/lihatpegawai/import') ?>" class="btn btn-warning">Import</a>
                                            <input type="text" name="searchQuery" value="<?= $query ?>" hidden>
                                            <!-- <a href="" class="btn btn-primary">Export</a> -->
                                            <button class="btn btn-primary">Export</button>
                                        </form>
                                    </div>
                                </div>


                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Action</th>
                                            <?php foreach ($columns as $name => $value) : ?>
                                                <th><?= str_replace('_', " ", $name) ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $page = isset($_GET['page']) ? $_GET['page'] : 1 ?>
                                        <?php $initialCount = ($perPage * ($page - 1) + 1) ?>
                                        <?php $i = $initialCount ?>
                                        <?php foreach ($dataPegawai as $pegawai) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('/admin/detail_pegawai/' . $pegawai['nip']) ?>" class="svg-col-blue"><i class="pe-7s-info action-icon"></i></a>
                                                        <a href="" data-color="red" data-toggle="modal" onclick="confirmDelete(<?= $i - 1 ?>)" class="svg-col-pink text-danger"><i class="pe-7s-trash action-icon"></i></a>
                                                    </div>
                                                </td>
                                                <?php foreach ($columns as $key => $col) : ?>
                                                    <td id="<?= $col . $i - 1 ?>"><?= $pegawai[$col == 'p.nip' ? 'nip' : $col] != 'null' ? strtoupper($pegawai[$col == 'p.nip' ? 'nip' : $col]) : "" ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php $currentTotal = count($dataPegawai) + $initialCount - 1 ?>
                                <span>
                                    <?= "Menampilkan $initialCount - $currentTotal dari $total" ?>
                                </span>

                                <?= $pager->makeLinks(1, $perPage, $total, 'paging') ?>
                            </div>

                        <?php else : ?>
                            <div class=" mx-auto p-2 my-3 border border-primary rounded" style="width: 18rem;">
                                <i class="pe-7s-attention text-center text-primary card-img-top" style="font-size: 120px;"></i>
                                <p class="card-text text-center mt-2">Pencarian tidak ditemukan...</p>
                            </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content  -->

<!-- Modal Dialogs ====================================================================================================================== -->

<!-- Modal Dialogs ====================================================================================================================== -->


<script>
    function confirmDelete(currentNum) {
        let namaPegawai = document.getElementById('nama_pegawai' + currentNum).innerText
        let nipPegawai = document.getElementById('p.nip' + currentNum).innerText
        let text = `Hapus ${namaPegawai} (${nipPegawai}) dari SIM-PNS?`
        // alert(text)
        let deleteData = confirm(text)
        // document.querySelector('.modal-body').innerHTML = text
        if (deleteData)
            window.location.href = "<?= base_url('/admin/delete_pegawai') ?>/" + nipPegawai;
    }

    function setPerPage() {
        let perPage = document.getElementById('perPage').value
        window.location.href = "<?= base_url('/admin/lihat_pegawai') ?>?keyword=<?= $keyword ?>&page=<?= 1 ?>&perPage=" + perPage;
    }
</script>

<script src="/assets/architectui/jquery/jquery-3.2.1.min.js"></script>
<script src="/assets/architectui/jquery/jquery-select2.js"></script>


<?php
$nama_satker = array();
$nama_jabatan = array();
$nama_bagian = array();
$nama_subbag = array();
foreach ($satker as $sat) {
    array_push($nama_satker, $sat['nama_satker']);
}
foreach ($bagian as $sat) {
    array_push($nama_bagian, $sat['nama_bagian']);
}
foreach ($subbag as $sat) {
    array_push($nama_subbag, $sat['nama_subbag']);
}
foreach ($jabatan as $sat) {
    array_push($nama_jabatan, $sat['nama_jabatan']);
}

?>
<script>
    let namaSatker = [<?php echo '"' . implode('","',  $nama_satker) . '"' ?>];
    let namaBagian = [<?php echo '"' . implode('","',  $nama_bagian) . '"' ?>];
    let namaSubbag = [<?php echo '"' . implode('","',  $nama_subbag) . '"' ?>];
    let namaJabatan = [<?php echo '"' . implode('","',  $nama_jabatan) . '"' ?>];


    $('#nama_jabatan').select2({
        data: namaJabatan,
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Jabatan",
    });

    $('#id_golongan').select2({
        data: ["IIID", "IID"],
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Golongan",
    });

    $('#nama_satker').select2({
        data: namaSatker,
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Satker",
    });

    $('#nama_bagian').select2({
        data: namaBagian,
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Bagian",
    });

    $('#nama_subbag').select2({
        data: namaSubbag,
        tags: true,
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Subbag",
    });
</script>


<?= $this->endSection() ?>