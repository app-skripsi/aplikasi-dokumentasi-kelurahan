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
                        <form action="<?= site_url('pegawai/store') ?>" method="post">
                            <div class="form-group">
                                <label for="nama" >Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Kepala Kelurahan">Kepala Kelurahan</option>
                                    <option value="Sekretaris Kelurahan">Sekretaris Kelurahan</option>
                                    <option value="Kepala Bagian Pemerintahan">Kepala Bagian Pemerintahan</option>
                                    <option value="Staf Administrasi Kelurahan">Staf Administrasi Kelurahan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div><br>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>