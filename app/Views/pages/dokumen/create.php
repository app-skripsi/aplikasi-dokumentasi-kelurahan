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
                        <form action="<?= site_url('dokumen/store') ?>" method="post">
                            <div class="form-group">
                                <label for="nama_dokumen" >Nama Dokumen</label>
                                <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" required>
                            </div>
                            <div class="form-group">
                                <label for="tipe_dokumen">Tipe Dokumen</label>
                                <select class="form-control" id="tipe_dokumen" name="tipe_dokumen" required>
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                    <option value="Confidential">Confidential</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_dokumen">Jenis Dokumen</label>
                                <select class="form-control" id="jenis_dokumen" name="jenis_dokumen" required>
                                    <option value="Dokumen Pribadi">Dokumen Pribadi</option>
                                    <option value="Dokumen Kepegawaian">Dokumen Kepegawaian</option>
                                    <option value="Dokumen Perizinan">Dokumen Perizinan</option>
                                    <option value="Dokumen Legal">Dokumen Legal</option>
                                    <option value="Dokumen Proyek">Dokumen Proyek</option>
                                    <option value="Dokumen Pendukung Administrasi">Dokumen Pendukung Administrasi</option>
                                    <option value="Dokumen Pendidikan">Dokumen Pendidikan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lokasi_dokumen">Lokasi Dokumen</label>
                                <input type="text" class="form-control" id="lokasi_dokumen" name="lokasi_dokumen" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_upload">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                            </div>
                            <!-- <div class="form-group">
                            <label for="image">Upload Pdf / Gambar Dokumen</label>
                                <input type="file"class="form-control" id="doc" name="doc" accept="image/*, .pdf" required>
                            </div> -->
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