<?php echo view('pages/layout/head'); ?>

<body>
    <main>
        <section class="min-vh-100 d-flex bg-primary align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                        <div class="card bg-primary shadow-soft border-light p-4">
                            <div class="card-header text-center pb-0">
                                <h2 class="h4">Sistem Arsip Digital (SIADI)</h2>
                                <h2 class="h4">Kelurahan Jatiwarna</h2>
                            </div>
                            <div class="card-body">
                                <?php if (!empty(session()->getFlashdata('sukses'))) { ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('sukses'); ?></div>
                                <?php } ?>
                                <?php if (!empty(session()->getFlashdata('haruslogin'))) { ?>
                                    <div class="alert alert-info"><?php echo session()->getFlashdata('haruslogin'); ?></div>
                                <?php } ?>
                                <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                                    <div class="alert alert-warning"><?php echo session()->getFlashdata('gagal'); ?></div>
                                <?php } ?>
                                <?php echo form_open('authentication'); ?>
                                <form class="p-3 mt-3">
                                    <div class="form-field d-flex align-items-center justify-content-center">
                                        <input type="text" name="username" id="username" placeholder="Username"
                                            class="shadow-sm">
                                    </div><br>
                                    <div class="form-field d-flex align-items-center justify-content-center">
                                        <input type="password" name="password" id="password" placeholder="Password"
                                            class="shadow-sm">
                                    </div><br>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-lg btn-primary">Login</button>
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                                <div class="mt-3 mb-4 text-center">
                                    <span class="font-weight-normal"></span>
                                </div>
                                <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                                    <span class="font-weight-normal"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php echo view('pages/layout/script'); ?>
</body>

</html>