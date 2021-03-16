<?= $this->extend('admin/edit/edit-template') ?>

<?= $this->section('editContent') ?>

<form action="<?= base_url('/admin/editdetail/updatebio') ?>" method="POST">
    <?= csrf_field(); ?>
    <div class="row">
        <div class="col gap-3">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIP</label>
                <input type="text" class="form-control" value="<?= $dataPegawai['nip'] ?>" id="nip" name="nip" placeholder="" required autocomplete="off" readonly>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="text" class="form-control" value="<?= $dataPegawai['nik'] ?>" id="nik" name="nik" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" class="form-control" value="<?= $dataPegawai['nama_pegawai'] ?>" id="nama_pegawai" name="nama_pegawai" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ALAMAT</label>
                <input type="text" class="form-control" value="<?= $dataPegawai['alamat'] ?>" id="alamat" name="alamat" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal Lahir</label>
                <div class="row">
                    <div class="col-12">
                        <input type="text" class="form-control" value="<?= $dataPegawai['tempat_lahir'] ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir..." required autocomplete="off">
                    </div>
                    <div class="col-12">
                        <input class="form-control" value="<?= $dataPegawai['ttl'] ?>" type="date" value="yyyy-MM-dd" name="ttl" id="ttl">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Pengangkatan</label>
                <input class="form-control" value="<?= $dataPegawai['tanggal_pengangkatan'] ?>" type="date" value="yyyy-MM-dd" name="tanggal_pengangkatan" id="tanggal_pengangkatan">
            </div>

            <div class="mb-3">
                <label for="exampleDataList" class="form-label">JENIS KELAMIN</label>
                <input class="form-control" value="<?= $dataPegawai['jenis_kelamin'] ?>" list="listGenderOption" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Gender..." required autocomplete="off">
                <datalist id="listGenderOption">
                    <option value="LAKI-LAKI"></option>
                    <option value="PEREMPUAN"></option>
                </datalist>
            </div>

            <div class="mb-3">
                <label for="exampleDataList" class="form-label">AGAMA</label>
                <input class="form-control" value="<?= $dataPegawai['agama'] ?>" list="listAgamaOption" id="agama" name="agama" placeholder="Masukkan Agama..." required autocomplete="off">
                <datalist id="listAgamaOption">
                    <option value="ISLAM"></option>
                    <option value="PROTESTAN"></option>
                    <option value="KATOLIK"></option>
                    <option value="HINDU"></option>
                    <option value="BUDHA"></option>
                    <option value="KONG HU CHU"></option>
                </datalist>
            </div>



        </div>
    </div>
    <button class="btn btn-primary" type="submit">SIMPAN DATA</button>
</form>

<?= $this->endSection() ?>