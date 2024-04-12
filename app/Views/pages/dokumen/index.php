<?php echo view('pages/layout/head'); ?>

<body>
    <?php echo view('pages/layout/header'); ?>
    <main>
        <div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
            <div class="container z-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <li class="breadcrumb-item "><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item">Data Dokumen</li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>

                <div class="row mb-4 justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <h1 class="display-3 mb-4">Data Dokumen</h1>
                        <p class="lead">Informasi data dokumen pada kelurahan jatiwarna</p>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <a type="button" class="btn btn-primary mt-3 float-right btn-plus"
                                style="margin-bottom: 10px;"><i class="fas fa-plus"></i></a>
                            </a>
                            <a type="button" class="btn btn-primary mt-3 float-left"
                                style="margin-left: 10px;"><em><em></em></em>
                                <i class="fas fa-file-excel"></i> Export Excel
                            </a>
                            <a type="button" class="btn btn-primary mt-3 float-left" style="margin-left: 10px;">
                                <i class="fas fa-file-pdf"></i> Export PDF
                            </a>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10 col-lg-6">
                        <div class="table-responsive-sm shadow-soft rounded">
                            <table id="pegawaiTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Number</th>
                                        <th style="text-align: center">Kode</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Type</th>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">Record</th>
                                        <th style="text-align: center">Pic</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dokumen as $key => $row) { ?>
                                        <tr>
                                            <td style="text-align: center">
                                                <?php echo $key + 1; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['number']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['kode']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['nama']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['type']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['date']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['record']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['pic']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('dokumen/edit/' . $row['id']); ?>"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('dokumen/delete/' . $row['id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('arsip/create') ?>" method="post">
                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input type="text" class="form-control" id="number" name="number">
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                                <div class="form-group">
                                    <label for="nama">HP</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" id="type" name="type">
                                </div>
                                <div class="form-group">
                                    <label for="date">date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="form-group">
                                    <label for="record">record</label>
                                    <input type="date" class="form-control" id="record" name="record">
                                </div>
                                <div class="form-group">
                                    <label for="pic">pic</label>
                                    <input type="text" class="form-control" id="pic" name="pic">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>