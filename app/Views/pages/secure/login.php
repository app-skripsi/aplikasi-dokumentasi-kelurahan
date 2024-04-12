<?php echo view('pages/layout/head'); ?>

<body>
    <main>
        <!-- Section -->
        <section class="min-vh-100 d-flex bg-primary align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                        <div class="card bg-primary shadow-soft border-light p-4">
                            <div class="card-header text-center pb-0">
                                <h2 class="h4">Sistem Arsip Digital (SIADI)</h2>
                                <h2 class="h4">Kelurahan  Jatiwarna</h2>
                            </div>
                            <div class="card-body">
                                <form action="#" class="mt-4">
                                    <!-- Form -->
                                    <div class="form-group">
                                        <label for="exampleInputIcon3">Username</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-user-alt"></span></span>
                                            </div>
                                            <input class="form-control" id="exampleInputIcon3" placeholder="ketika username disini ..." type="text" aria-label="email adress">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="form-group">
                                        <!-- Form -->
                                        <div class="form-group">
                                            <label for="exampleInputPassword6">Password</label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                                </div>
                                                <input class="form-control" id="exampleInputPassword6" placeholder="Password" type="password" aria-label="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </form>
                                <div class="mt-3 mb-4 text-center">
                                    <span class="font-weight-normal"></span>
                                </div>
                                <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                                    <span class="font-weight-normal">

                                    </span>
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