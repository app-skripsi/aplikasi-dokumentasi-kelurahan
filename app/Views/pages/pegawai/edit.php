<?php echo view('pages/layout/head'); ?>

<body>
    <?php echo view('pages/layout/header'); ?>
    <main>
        <div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
            <div class="container z-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <li class="breadcrumb-item "><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/pegawai'); ?>">Data Pegawai</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>

                <div class="row mb-4 justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <hr>
                        <h1 class="display-3 mb-4">Form Data Pegawai</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <form action="<?= site_url('pegawai/update/' . $pegawai['id']); ?>" method="post">
                        <?php echo form_hidden('id', $pegawai['id']); ?>
                        <div class="form-group">
                                <?php echo form_label('Nama pegawai', 'nama'); ?>
                                <?php echo form_input(
                                  'nama',
                                  $pegawai['nama'],
                                  ['class' => 'form-control']
                                ); ?>
                              </div>
                              <br>
                              <div class="form-group">
                                <?php echo form_label('NIP', 'nip'); ?>
                                <?php echo form_input(
                                  'nip',
                                  $pegawai['nip'],

                                  ['class' => 'form-control']
                                );

                                ?>
                              </div>
                              <div class="form-group">
                                <?php echo form_label('Jabatan', 'jabatan'); ?>
                                <?php
                                $options = array(
                                    'Kepala Kelurahan' => 'Kepala Kelurahan',
                                    'Sekretaris Kelurahan' => 'Sekretaris Kelurahan',
                                    'Kepala Bagian Pemerintahan' => 'Kepala Bagian Pemerintahan',
                                    'Staf Administrasi Kelurahan' => 'Staf Administrasi Kelurahan'
                                );
                                echo form_dropdown('jabatan', $options, $pegawai['jabatan'], 'class="form-control"');
                                ?>
                            </div>
                            <a href="<?php echo base_url('pegawai'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"> <i class="nav-icon fas fa-save"></i> Perbarui Data</button>
                        </form>
                    </div>
                </div><br>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>