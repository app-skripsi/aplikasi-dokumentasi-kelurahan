<?php echo view('pages/layout/head'); ?>

<body>
    <?php echo view('pages/layout/header'); ?>
    <main>
        <div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
            <div class="container z-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <li class="breadcrumb-item "><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/dokumen'); ?>">Data Dokumen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>

                <div class="row mb-4 justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <hr>
                        <h1 class="display-3 mb-4">Form Data Dokumen</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <form action="<?= site_url('dokumen/update/' . $dokumen['id']); ?>" method="post">
                            <?php echo form_hidden('id', $dokumen['id']); ?>
                            <div class="form-group">
                                <?php echo form_label('Nama Dokumen', 'nama_dokumen'); ?>
                                <?php echo form_input(
                                    'nama_dokumen',
                                    $dokumen['nama_dokumen'],
                                    ['class' => 'form-control']
                                ); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <?php echo form_label('Lokasi Dokumen', 'lokasi_dokumen'); ?>
                                <?php echo form_input(
                                    'lokasi_dokumen',
                                    $dokumen['lokasi_dokumen'],
                                    ['class' => 'form-control']
                                );

                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Tipe Dokumen', 'tipe_dokumen'); ?>
                                <?php
                                $options = array(
                                    'Public' => 'Public',
                                    'Private' => 'Private',
                                    'Confidential' => 'Confidential'
                                );
                                echo form_dropdown('tipe_dokumen', $options, $dokumen['tipe_dokumen'], 'class="form-control"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Jenis', 'jenis_id'); ?>
                                <?php echo form_dropdown('jenis_id', $jenis, $dokumen['jenis_id'], ['class' => 'form-control']); ?>
                            </div><br>
                            <div class="form-group">
                                <?php echo form_label('Tanggal', 'tanggal_upload'); ?>
                                <?php echo form_input(
                                    'tanggal_upload',
                                    $dokumen['tanggal_upload'],
                                    ['class' => 'form-control', 'type' => 'date']
                                );

                                ?>
                            </div>

                            <a href="<?php echo base_url('dokumen'); ?>" class="btn btn-outline-info"> <i
                                    class="nav-icon fas fa-backward"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"> <i class="nav-icon fas fa-save"></i> Perbarui
                                Data</button>
                        </form>
                    </div>
                </div><br>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>