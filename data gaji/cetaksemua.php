<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }

        // buat rupiah
    function buatrupiah($angka) {
        $hasil = "Rp " .
        number_format($angka,0,',','.');
        return $hasil; 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-size: 12px;
        }
    </style>
</head>
<body>

   
    <table style="width: 0;">
        <tr>
            <td><img src="../img/logo.png" width="90px;"></td>
        
            <?php
                include '../koneksi.php';
                $perusahaan = mysqli_query($koneksi, "SELECT * FROM tb_perusahaan");
                while ($p = mysqli_fetch_assoc($perusahaan)) {
            ?>
            <td>
                <font size="2">Applikasi Penggajian Karyawan</font><br>
                <font size="4"><b><?= $p['nama']; ?></b></font><br>
                <font size="2"><?= $p['alamat']; ?> <?= $p['kecamatan']; ?>, <?= $p['pos']; ?></font><br>
                <font size="2">(+62) <?= $p['telepon']; ?> Email : <?= $p['email']; ?></font>
            </td>
        </tr>       
        <?php } ?>
    </table>
    <br>
    <hr>

    <p>Laporan Data Gaji Karyawan</p>

   <table border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Total Masuk Kerja</th>
                <th>Gaji Pokok</th>
                <th>Uang Makan</th>
                <th>Uang Transport</th>
                <th>Total Lembur</th>
                <th>Upah Lembur</th>
                <th>Total Gaji</th>
            </tr>
            <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM tb_gaji");
                while ($a = mysqli_fetch_assoc($data)) {
            ?>
            <tr align="center">
                <td><?= $no++; ?>.</td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['jabatan']; ?></td>
                <td><?= $a['total_masuk_kerja']; ?> Hari</td>
                <td><?= buatrupiah($a['pokok']); ?></td>
                <td><?= buatrupiah($a['makan']); ?></td>
                <td><?= buatrupiah($a['transport']); ?></td>
                <td><?= $a['lemburan'] ?> Jam</td>
                <td><?= buatrupiah($a['upah_lembur']); ?></td>
                <td><?= buatrupiah($a['total_gaji']); ?></td>
            </tr>
            <?php } ?>
        </table>
    <center>
        <br>
        <br>
        <br>
        <div style="text-align: center;"> 
            <a href="datagaji.php" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg>
            </a>
            <a href="" class="button" onclick="window.print();" name="print" style="background-color: #f44336;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                </svg>
            </a>
        </div>
    </center>
    <!-- <script>
        window.print();
    </script> -->
</body>
</html>