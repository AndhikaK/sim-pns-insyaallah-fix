<!-- sidebar -->
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li>
                    <a href="<?= base_url('/admin') ?>" class="<?= $menuPos == 'beranda' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-culture <?= $menuPos == 'beranda' ? 'icon-gradient bg-premium-dark' : '' ?>"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/admin/lihat_pegawai') ?>" class="<?= $menuPos == 'lihat-pegawai' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-ribbon <?= $menuPos == 'lihat-pegawai' ? 'icon-gradient bg-premium-dark' : '' ?>"></i>
                        Lihat Pegawai
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/admin/tambah_pegawai') ?>" class="<?= $menuPos == 'input-pegawai' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-add-user <?= $menuPos == 'input-pegawai' ? 'icon-gradient bg-premium-dark' : '' ?>"></i>
                        Input Data
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/login/signOut') ?>">
                        <i class="metismenu-icon pe-7s-right-arrow"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar -->