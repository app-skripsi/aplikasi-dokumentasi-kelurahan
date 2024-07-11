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
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            Whoops! Ada kesalahan saat input data, yaitu:
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <div class="container">
                        <form action="<?= site_url('arsip/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kode_arsip">Kode Arsip</label>
                                <input type="text" class="form-control" id="kode_arsip" name="kode_arsip" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Arsip</label>
                                <input type="text" class="form-control" id="nama_arsip" name="nama_arsip" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jenis_id">Pilih Jenis </label>
                                <select class="form-control" id="jenis_id" name="jenis_id">
                                    <option value="">Pilih jenis</option> <!-- Tambahkan opsi ini -->

                                    <?php foreach ($jenis as $jenisItem) : ?>
                                        <option value="<?= $jenisItem['id']; ?>"><?= $jenisItem['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                                <input type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="download_file">Soft Copy Arsip</label>
                                <input class="form-control form-control-lg" type="file" id="download_file" name="download_file" placeholder="Upload File Soft Copy" />
                            </div>
                            <div class="form-group">
                                <label for="lokasi_arsip">Lokasi Arsip</label>
                                <input type="text" class="form-control" id="lokasi_arsip" name="lokasi_arsip" required>
                            </div>
                            <button type="button" class="btn btn-secondary"><a href="<?php echo base_url('arsip') ?>" style="color: white;"><i class="nav-icon fas fa-backward"></i></a></button>
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