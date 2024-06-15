<?php echo view('pages/layout/head'); ?>

<body>
    <?php echo view('pages/layout/header'); ?>
    <main>
        <div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
            <div class="container z-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <li class="breadcrumb-item "><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/arsip'); ?>">Data Arsip</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>

                <div class="row mb-4 justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <hr>
                        <h1 class="display-3 mb-4">Form Data Arsip</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <form action="<?= site_url('arsip/update/' . $arsip['id']); ?>" method="post">
                            <?php echo form_hidden('id', $arsip['id']); ?>
                            <div class="form-group">
                                <?php echo form_label('Nama arsip', 'nama_arsip'); ?>
                                <?php echo form_input(
                                    'nama_arsip',
                                    $arsip['nama_arsip'],
                                    ['class' => 'form-control']
                                ); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <?php echo form_label('Kode Arsip', 'kode_arsip'); ?>
                                <?php echo form_input(
                                    'kode_arsip',
                                    $arsip['kode_arsip'],
                                    ['class' => 'form-control']
                                );

                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Tanggal Pembuatan', 'tanggal_pembuatan'); ?>
                                <?php echo form_input(
                                    'tanggal_pembuatan',
                                    $arsip['tanggal_pembuatan'],
                                    ['class' => 'form-control', 'type' => 'date']
                                );

                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Lokasi Arsip', 'lokasi_arsip'); ?>
                                <?php echo form_input(
                                    'lokasi_arsip',
                                    $arsip['lokasi_arsip'],
                                    ['class' => 'form-control']
                                );

                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Jenis', 'jenis_id'); ?>
                                <?php echo form_dropdown('jenis_id', $jenis, $arsip['jenis_id'], ['class' => 'form-control']); ?>
                            </div><br>
                            <a href="<?php echo base_url('arsip'); ?>" class="btn btn-outline-info"> <i
                                    class="nav-icon fas fa-backward"></i></a>
                            <button type="submit" class="btn btn-primary"> <i class="nav-icon fas fa-save"></i></button>
                        </form>
                    </div>
                </div><br>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>