<?php echo view('pages/layout/head'); ?>
<body>
<?php echo view('pages/layout/header'); ?>
     <main>
        <section class="section section-lg">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                    </ol>
                </nav>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card bg-primary shadow-soft border-light px-4 py-1 mb-6">
                            <div class="card-body text-center text-md-left">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="mb-3">SIADI (Sistem Arsip Digital)</h2>
                                        <p class="mb-4">
                                           Dalam rangka digitalisasi kelurahan jatiwarna meluncurkan aplikasi SIADI untuk mengoptimalkan
                                           pendataan arsip dan dokumen dikelurahan.
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-6 mt-4 mt-md-0 text-md-right">
                                        <img src="./assets/img/illustrations/dashboard_image.svg" alt="illustration">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo view('pages/layout/footer'); ?>
            </div>
        </section>
    </main>
<?php echo view('pages/layout/script'); ?>
</body>

</html>