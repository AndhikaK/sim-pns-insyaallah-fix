<?= $this->extend('layout/admin-template') ?>

<?= $this->section('content') ?>

<!-- content title here -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>
                <?= $title ?>
                <div class="page-title-subheading">
                    <?= $subTitle ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content title here -->

<!-- main content  -->
<!-- <div class="row">
    <div class="col "> -->
<div class="card">
    <div class="card-body px-4">
        <form action="<?= base_url('/admin/lihat_pegawai/filter') ?>" method="POST">

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
            </div>
            <!-- collapse filter -->
        </form>

        <div class="row  p-2">
            <div class="col-12">

                <?php if (count($dataPegawai) > 0) : ?>
                    <div class="table-responsive">
                        <h4><?= $keyword ? "Menampilkan hasil pencarian '$keyword'" : "" ?></h4>

                        <input type="text" list="pageListOption" class="input-perpage" id="perPage" name="perPage" onchange="setPerPage()" value="<?= $perPage ?>" autocomplete="off"> data
                        <datalist id="pageListOption">
                            <option value="10"></option>
                            <option value="20"></option>
                            <option value="50"></option>
                            <option value="100"></option>
                            <option value="semua"></option>
                        </datalist>

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
                                            <a href="<?= base_url('/admin/detail_pegawai/' . $pegawai['nip']) ?>" class="svg-col-blue"><img src="/assets/svg/info-24px.svg" alt=""></a>
                                            <a href="" data-color="red" data-toggle="modal" onclick="confirmDelete(<?= $i - 1 ?>)" data-target="#defaultModal" class="svg-col-pink"><img src="/assets/svg/delete-24px.svg" alt=""></a>
                                        </td>
                                        <?php foreach ($columns as $key => $col) : ?>
                                            <td id="<?= $col . $i - 1 ?>"><?= strtoupper($pegawai[$col == 'p.nip' ? 'nip' : $col]) ?></td>
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
                <?php endif ?>
            </div>

        </div>
    </div>
</div>
<!-- </div>
</div> -->
<!-- main content  -->

<!-- Modal Dialogs ====================================================================================================================== -->
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content  modal-col-pink">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="" id="confirm-delete" class="btn btn-link waves-effect">SAVE CHANGES</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialogs ====================================================================================================================== -->


<script>
    function confirmDelete(currentNum) {
        let namaPegawai = document.getElementById('nama_pegawai' + currentNum).innerText
        let nipPegawai = document.getElementById('p.nip' + currentNum).innerText
        let text = `Hapus ${namaPegawai} (${nipPegawai}) dari SIM-PNS?`
        document.querySelector('.modal-body').innerHTML = text
        document.querySelector('#confirm-delete').href = "<?= base_url('/admin/lihatpegawai/deletepegawai') ?>/" + nipPegawai
    }

    function setPerPage() {
        let perPage = document.getElementById('perPage').value
        window.location.href = "<?= base_url('/admin/lihat_pegawai') ?>?keyword=<?= $keyword ?>&page=<?= $page ?>&perPage=" + perPage;
    }
</script>


<?= $this->endSection() ?>