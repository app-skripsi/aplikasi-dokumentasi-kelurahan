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
                            <a href="<?php echo base_url("dokumen/create") ?>" type="button" class="btn btn-primary mt-3 float-right btn-plus" style="margin-bottom: 10px;"><i class="fas fa-plus"></i></a>
                            </a>
                            <a href="<?php echo base_url("dokumen/xls") ?>" type="button" class="btn btn-primary mt-3 float-left" style="margin-left: 10px;"><em><em></em></em>
                                <i class="fas fa-file-excel"></i>
                            </a>
                            <a href="<?php echo base_url("dokumen/pdf ") ?>" type="button" class="btn btn-primary mt-3 float-left" style="margin-left: 10px;" target="_blank">
                                <i class="fas fa-file-pdf"></i>
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
                                        <th style="text-align: center">Nama Dokumen</th>
                                        <th style="text-align: center">Jenis</th>
                                        <th style="text-align: center">Tipe</th>
                                        <th style="text-align: center">Unduh Berkas</th>
                                        <th style="text-align: center">Lokasi</th>
                                        <th style="text-align: center">Tanggal</th>
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
                                                <?php echo $row['nama_dokumen']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['tipe_dokumen']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['nama']; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('uploads/dokumen/' . $row['download_file']); ?>" data-caption="Soft Copy Data" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['lokasi_dokumen']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['tanggal_upload']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php echo $row['pic']; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('dokumen/edit/' . $row['id']); ?>" class="btn btn-sm btn-success edit-btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('dokumen/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger delete-btn">
                                                        <i class="fas fa-trash-alt"></i>
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
    </main>
    <?php echo view('pages/layout/footer'); ?>

    <?php echo view('pages/layout/script'); ?>

</body>

</html>