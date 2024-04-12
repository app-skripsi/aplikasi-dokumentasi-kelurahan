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
                        <form action="<?= site_url('arsip/store') ?>" method="post">
                            <div class="form-group">
                                <label for="kode">Kode Arsip</label>
                                <input type="text" class="form-control" id="kode" name="kode" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Arsip</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Arsip</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Surat">Surat</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Laporan">Laporan</option>
                                    <option value="Dokumen Pribadi">Dokumen Pribadi</option>
                                    <option value="Dokumen Kepegawaian">Dokumen Kepegawaian</option>
                                    <option value="Dokumen Perizinan">Dokumen Perizinan</option>
                                    <option value="Arsip Historis">Arsip Historis</option>
                                    <option value="Dokumen Legal">Dokumen Legal</option>
                                    <option value="Dokumen Proyek">Dokumen Proyek</option>
                                    <option value="Dokumen Pendukung Administrasi">Dokumen Pendukung Administrasi</option>
                                    <option value="Dokumen Pendidikan">Dokumen Pendidikan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pembuatan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Arsip</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            </div>
                            <div class="form-group">
    <label for="pegawai_id">Pegawai</label>
    <select class="form-control" id="pegawai_id" name="pegawai_id" required>
        <?php foreach ($pegawai_list as $pegawai) : ?>
            <option value="<?= $pegawai['id'] ?>"><?= $pegawai['nama'] ?></option>
        <?php endforeach; ?>
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