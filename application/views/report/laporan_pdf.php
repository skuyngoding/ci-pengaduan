<!DOCTYPE html>
<html><head>
    <title>Cetak Laporan Pengaduan</title>
    <style>
        body {
            font-family: arial, sans-serif;
            margin: 1cm 1cm 1cm 1cm;
        }

        h2 {
            margin-top: auto;
            text-align: center;
            position: fixed;
            left: 0px;
            right: 0px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            padding: 4px;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
        }

    </style>
</head><body>
    
    <h2>Daftar Laporan Pengaduan</h2>
    
    <div class="cetak">
        Tanggal di cetak: <?= date('d/m/Y'); ?>
    </div>

    <table>
        <tr>
            <th style="width: 6%">No.</th>
            <th style="width: 20%">Judul</th>
            <th style="width: 40%">Isi</th>
            <th style="width: 14%">Tanggal Pengaduan</th>
            <th style="width: 20%">Nama Instansi</th>
        </tr>

        <?php if (!empty($data)) : ?>
        <?php foreach($data as $num => $row) : ?>
        <tr>
            <td style="width: 6%"><?= $num+1 ?></td>
            <td style="width: 20%"><?= $row['judul_pengaduan']; ?></td>
            <td style="width: 40%"><?= $row['isi_pengaduan']; ?></td>
            <td style="width: 14%"><?= $row['tgl_pengaduan']; ?></td>
            <td style="width: 20%"><?= $row['nama_instansi']; ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>Tidak ada data!</h3>
    <?php endif; ?>
    </table>

</body></html>
