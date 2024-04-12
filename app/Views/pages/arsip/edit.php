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
                        <form action="<?= site_url('arsip/update/' . $arsip['id']); ?>" method="post">
                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    value="<?php echo isset($arsip['number']) ? $arsip['number'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode"
                                    value="<?php echo isset($arsip['kode']) ? $arsip['kode'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">HP</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo isset($arsip['nama']) ? $arsip['nama'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    value="<?php echo isset($arsip['type']) ? $arsip['type'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?php echo isset($arsip['date']) ? $arsip['date'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="record">record</label>
                                <input type="date" class="form-control" id="record" name="record"
                                    value="<?php echo isset($arsip['record']) ? $arsip['record'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pic">pic</label>
                                <input type="text" class="form-control" id="pic" name="pic"
                                    value="<?php echo isset($arsip['pic']) ? $arsip['pic'] : ''; ?>">
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