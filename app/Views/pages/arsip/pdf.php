<html>
<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Kode Arsip</th>
                    <th style="text-align: center">Nama Arsip</th>
                    <th style="text-align: center">Jenis Arsip</th>
                    <th style="text-align: center">Tanggal Pembuatan</th>
                    <th style="text-align: center">Lokasi Arsip</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arsip as $key => $row) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo $key + 1; ?></td>
                        <td style="text-align: center"><?php echo $row['kode_arsip']; ?></td>
                        <td style="text-align: center"><?php echo $row['nama_arsip']; ?></td>
                        <td style="text-align: center"><?php echo $row['jenis_arsip']; ?></td>
                        <td style="text-align: center"><?php echo $row['tanggal_pembuatan']; ?></td>
                        <td style="text-align: center"><?php echo $row['lokasi_arsip']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
