<html>

<head>
    <style>
        .table-header,
        .table-cell {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-header {
            background-color: #f2f2f2;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Add space between rows */
        }

        @media (max-width: 768px) {

            .table-header,
            .table-cell {
                font-size: 12px;
                /* Adjust font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-header" style="text-align: center">No</th>
                    <th class="table-header" style="text-align: center">Nama Dokumen</th>
                    <th class="table-header" style="text-align: center">Jenis Dokumen</th>
                    <th class="table-header" style="text-align: center">Tipe Dokumen</th>
                    <th class="table-header" style="text-align: center">Lokasi</th>
                    <th class="table-header" style="text-align: center">Tanggal</th>
                    <th class="table-header" style="text-align: center">Pic</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dokumen as $key => $row) { ?>
                    <tr>
                        <td class="table-cell" style="text-align: center"><?php echo $key + 1; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['nama_dokumen']; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['tipe_dokumen']; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['nama']; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['lokasi_dokumen']; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['tanggal_upload']; ?></td>
                        <td class="table-cell" style="text-align: center"><?php echo $row['pic']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>