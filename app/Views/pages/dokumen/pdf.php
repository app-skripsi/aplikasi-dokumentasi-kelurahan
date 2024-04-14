<html>
<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Dokumen</th>
                    <th style="text-align: center">Jenis</th>
                    <th style="text-align: center">Tipe</th>
                    <th style="text-align: center">Lokasi</th>
                    <th style="text-align: center">Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dokumen as $key => $row) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo $key + 1; ?></td>
                        <td style="text-align: center"><?php echo $row['nama_dokumen']; ?></td>
                        <td style="text-align: center"><?php echo $row['tipe_dokumen']; ?></td>
                        <td style="text-align: center"><?php echo $row['jenis_dokumen']; ?></td>
                        <td style="text-align: center"><?php echo $row['lokasi_dokumen']; ?></td>
                        <td style="text-align: center"><?php echo $row['tanggal_upload']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
