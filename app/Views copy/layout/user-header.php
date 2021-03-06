<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">

        </div>
    </div>
    <div class="app-header__mobile-menu">

    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn mr-3">
                                    <img width="42" class="rounded-circle" src="/profil/sdm-polri.png" alt="">
                                </a>

                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <?= ucwords(strtolower($detailPegawai['nama_pegawai'])) ?>
                            </div>
                            <div class="widget-subheading">
                                <?= ucwords(strtolower($riwayatPekerjaan[0]['nama_jabatan'])) ?>
                            </div>
                        </div>
                        <a href="<?= base_url('/login/signOut') ?>" class="btn border btn-logout">LOGOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>