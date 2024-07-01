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
                                <label for="nama_dokumen">Nama Dokumen</label>
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
                                <label class="form-label" for="jenis_id">Pilih Jenis </label>
                                <select class="form-control" id="jenis_id" name="jenis_id">
                                    <option value="">Pilih jenis</option> <!-- Tambahkan opsi ini -->

                                    <?php foreach ($jenis as $jenisItem): ?>
                                        <option value="<?= $jenisItem['id']; ?>"><?= $jenisItem['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lokasi_dokumen">Lokasi Dokumen</label>
                                <input type="text" class="form-control" id="lokasi_dokumen" name="lokasi_dokumen"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_upload">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="download_file">Soft Copy Dokumen</label>
                                <input class="form-control form-control-lg" type="file" id="download_file"
                                    name="download_file" placeholder="Upload File Soft Copy" />
                            </div>
                            <button type="button" class="btn btn-secondary"><a href="<?= base_url('dokumen') ?>"
                                    style="color: white;"><i class="nav-icon fas fa-backward"></i></a></button>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i></button>
                        </form>
                    </div>
                </div><br>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>