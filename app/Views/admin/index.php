<?= $this->extend('layout/admin-template') ?>


<?= $this->section('content') ?>

<!-- main content  -->
<div class="row">
    <div class="col-md-3 col-xl-3">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total PNS</div>
                    <div class="widget-subheading">Sampai tahun <?= date('Y') ?></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $totalPegawai ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xl-3">
        <div class="card mb-3 widget-content sky-gradient">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Satker</div>
                    <div class="widget-subheading">Sampai tahun <?= date('Y') ?></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers"><span><?= $totalSatker ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xl-3">
        <div class="card mb-3 widget-content neon-blue-gradient">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Bagian</div>
                    <div class="widget-subheading">Sampai tahun <?= date('Y') ?></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $totalBagian ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xl-3">
        <div class="card mb-3 widget-content flikr-gradent">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Subbag</div>
                    <div class="widget-subheading">Sampai tahun <?= date('Y') ?></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $totalSubbag ?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="card p-2">
        </div>
    </div>
</div>
<!-- main content  -->


<?= $this->endSection() ?>