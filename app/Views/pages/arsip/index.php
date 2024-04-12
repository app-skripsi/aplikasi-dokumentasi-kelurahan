<?php echo view('pages/layout/head'); ?>

<body>
  <?php echo view('pages/layout/header'); ?>
  <main>
    <div class="section-header pb-6 bg-primary overflow-hidden text-center border-bottom border-light">
      <div class="container z-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-info">
            <li class="breadcrumb-item "><a href="<?php echo base_url('/'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Arsip</li>
          </ol>
        </nav>

        <div class="row mb-4 justify-content-center">
          <div class="col-12 col-md-8 col-lg-7">
            <h1 class="display-3 mb-4">Data Arsip</h1>
            <p class="lead">Informasi data arsip pada kelurahan jatiwarna</p>
          </div>
        </div>
        <div class="row">
          <div class="container">
            <div class="form-group">
              <a href="<?php echo base_url("arsip/create") ?>" type="button"
                class="btn btn-primary mt-3 float-right btn-plus" style="margin-bottom: 10px;"><i
                  class="fas fa-plus"></i></a>
              </a>
              <a type="button" class="btn btn-primary mt-3 float-left" style="margin-left: 10px;"><em><em></em></em>
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
                  <?php foreach ($arsip as $key => $row) { ?>
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
                          <a href="<?php echo base_url('arsip/edit/' . $row['id']); ?>" class="btn btn-sm btn-success">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a href="<?php echo base_url('arsip/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger"
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
  </main>
  <?php echo view('pages/layout/footer'); ?>

  <?php echo view('pages/layout/script'); ?>

</body>

</html>