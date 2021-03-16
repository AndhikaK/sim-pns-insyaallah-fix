<?= $this->extend('admin/edit/edit-template') ?>

<?= $this->section('editContent') ?>
<div id="accordion" class="accordion-wrapper mb-3">
    <!-- pendidikan umum -->
    <div class="card">

        <div id="headingOne" class="card-header">
            <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Pendidikan Umum</h5>
            </button>
        </div>
        <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
            <div class="card-body">
                <!-- content -->
                <div class="row">
                    <div class="border border-dark rounded p-3 bg-white">
                        <table class="uk-table m-0 p-0">
                            <thead>
                                <th>Action</th>
                                <th>Tahun Kelulusan</th>
                                <th>Pendidikan</th>
                            </thead>

                            <?php if (count($riwayatDikum) > 0) : ?>
                                <tbody class="tbody-rwy">
                                    <?php foreach ($riwayatDikum as $item) : ?>
                                        <tr>

                                            <?php if ($idItem == $item['id_riwayat_dikum']) : ?>
                                                <form action="<?= base_url("/admin/detailpegawai/editdatapdd/$nip" . $item["id_riwayat_dikum"]) ?>" method="POST">
                                                    <td>
                                                        <button class="icon-button">
                                                            <img src="/asset/svg/check-circle-solid.svg" class="fa-icon-success fa-icon" alt="">
                                                        </button>
                                                        <a href="<?= base_url("/admin/detailpegawai/tambahpdd/$nip") ?>" class="">
                                                            <img src="/asset/svg/window-close-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                                        </a>
                                                    </td>
                                                    <?php foreach ($colDikum as $name => $value) : ?>
                                                        <td><input type="text" name="<?= $value ?>" value="<?= $item[$value] ?>"></td>
                                                    <?php endforeach ?>

                                                </form>
                                            <?php else : ?>
                                                <td>
                                                    <a href="<?= base_url("/admin/detailpegawai/tambahpdd/$nip" . $item['id_riwayat_dikum']) ?>" class="">
                                                        <img src="/asset/svg/edit-solid.svg" class="fa-icon-primary fa-icon" alt="">
                                                    </a>
                                                    <a href="<?= base_url("/admin/detailpegawai/deletedatapdd/$nip" . $item['id_riwayat_dikum']) ?>" class="">
                                                        <img src="/asset/svg/trash-solid.svg" class="fa-icon-danger fa-icon" alt="">
                                                    </a>
                                                </td>
                                                <?php foreach ($colDikum as $name => $value) : ?>
                                                    <td><?= $item[$value] ?></td>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else : ?>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- content -->
        </div>
    </div>
    <!-- pendidikan umum -->

</div>
<div class="card">
    <div id="headingTwo" class="b-radius-0 card-header">
        <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
            <h5 class="m-0 p-0">Collapsible Group Item
                #2</h5>
        </button>
    </div>
    <div data-parent="#accordion" id="collapseOne2" class="collapse">
        <div class="card-body">2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
            nesciunt
            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
            VHS.
        </div>
    </div>
</div>
<div class="card">
    <div id="headingThree" class="card-header">
        <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
            <h5 class="m-0 p-0">Collapsible Group
                Item #3</h5>
        </button>
    </div>
    <div data-parent="#accordion" id="collapseOne3" class="collapse">
        <div class="card-body">3. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
            nesciunt
            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
            VHS.
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>