<header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation"
        class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-transparent navbar-theme-primary">
        <div class="container position-relative">
            <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4"
                href="<?php echo base_url('/dashboard'); ?>">
                <img class="navbar-brand-dark" src="<?php echo base_url('./assets/img/brand/dark.svg');  ?>" alt="Logo light">
                <img class="navbar-brand-light" src="<?php echo base_url('./assets/img/brand/dark.svg'); ?>" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="<?php echo base_url('/dashboard'); ?>"
                                class="navbar-brand shadow-soft py-2 px-3 rounded border border-light">
                                <img src="<?php echo base_url('./assets/img/brand/dark.svg'); ?>" alt="Themesberg logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse"
                                data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="col-md-3 col-lg-auto mb-2 mb-lg-0">
                        <a href="<?php echo base_url('/dashboard'); ?>" class="btn btn-primary animate-up-2 w-100">Home</a>
                    </li>
                    <li class="col-md-3 col-lg-auto mb-2 mb-lg-0">
                        <a href="<?php echo base_url('/arsip'); ?>" class="btn btn-primary animate-up-2 w-100">Dokumentasi
                            Arsip</a>
                    </li>
                    <li class="col-md-3 col-lg-auto mb-2 mb-lg-0">
                        <a href="<?php echo base_url('/dokumen'); ?>" class="btn btn-primary animate-up-2 w-100">Dokumentasi
                            Dokumen</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">
                    <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg"
                        class="rounded-circle" alt="User Avatar" style="width: 30px; height: 30px;">
                    <span class="d-block mt-1"><?= session()->get('nama_user'); ?> | <?php if (session()->get('level') == 1) {
                                                                                                                        echo 'Admin';
                                                                                                                    } elseif (session()->get('level') == 2) {
                                                                                                                        echo 'Ketua';
                                                                                                                    } else {
                                                                                                                        echo 'Guest';
                                                                                                                    } ?></span></span>
                </button>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg"
                        class="rounded-circle" alt="User Avatar" style="width: 80px; height: 80px;">
                </div>
                <p class="mt-3">Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('/') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
</div>