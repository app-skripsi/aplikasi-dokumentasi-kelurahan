<?php echo view('pages/layout/head'); ?>
<body>
<?php echo view('pages/layout/header'); ?>
<main>
<div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
    <div class="container z-2">
    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-info">
                        <li class="breadcrumb-item "><a href="<?php echo base_url('/');?>">Home</a></li>
                         <li class="breadcrumb-item">Data Pegawai</li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-8 col-lg-7">
                <h1 class="display-3 mb-4">Data Pegawai</h1>
                <p class="lead">Informasi data pegawai pada kelurahan jatiwarna</p>
            </div>
        </div>
        <?php if(session()->get('level') == 2) { ?>
                                <a href="<?php echo base_url('users/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>
<div class="row">
    <div class="container">
        <div class="form-group ">
        <a href="<?php echo base_url('/pegawai/create') ?>"  type="button" class="btn btn-primary mt-3 float-right btn-plus" style="margin-bottom: 10px;">Add New</a>
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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pegawai as $key => $row) { ?>
                    <tr>
                      <td style="text-align: center">
                        <?php echo $key + 1; ?>
                      </td>
                      <td style="text-align: center">
                        <?php echo $row['nama']; ?>
                      </td>
                      <td style="text-align: center">
                        <?php echo $row['nip']; ?>
                      </td>
                      <td style="text-align: center">
                        <?php echo $row['jabatan']; ?>
                      </td>
                      <td style="text-align: center">
                        <div class="btn-group">
                          <a href="<?php echo base_url('pegawai/edit/' . $row['id']); ?>" class="btn btn-sm btn-success">
                          Update
                          </a>
                          <a href="<?php echo base_url('pegawai/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                           Force
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
</script>
</body>

</html>