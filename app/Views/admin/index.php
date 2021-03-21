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
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<!-- main content  -->

<script type="text/javascript" src="/assets/architectui/scripts/main.js"></script>

<script>
    var ctx = document.getElementById('myChart');

    let labels = <?= json_encode(array_keys($labels)) ?>;
    let dataSets = <?= json_encode(array_values($labels)) ?>;
    let backColor = []
    for (i = 0; i < labels.length; i++) {
        backColor.push('#' + Math.floor(Math.random() * 16777215).toString(16))
    }

    console.log(backColor)
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: dataSets,
                backgroundColor: backColor,
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Sebaran Pegawai Berdasarkan Satker'
            }
        }
    });
</script>

<?= $this->endSection() ?>