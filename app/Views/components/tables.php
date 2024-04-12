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
<div class="row">
    <div class="container">
        <div class="form-group">
        <a type="button" class="btn btn-primary mt-3 float-right" style="margin-bottom: 10px;">
        <i class="fas fa-plus"></i>
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
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Hp</th>
                                <th>Jk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>A. Forsyth</td>
                                <td>67890</td>
                                <td>0987654321</td>
                                <td>Female</td>
                            </tr> -->
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