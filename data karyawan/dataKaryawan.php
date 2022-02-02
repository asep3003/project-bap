<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:login ../system/login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        @media print {
            a, .aksi {
                display: none;
            }
        }
        body {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <header>
        <a href="../index.php" class="nav-link">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg>
            HOME
        </a>
    </header>

    <main>
        <h1>Data Karyawan</h1>
        <div style="text-align: left;">
            <a href="tambahKaryawan.php" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Tambah Data Karyawan
            </a>
             <a href="cetakKaryawan.php" class="button" name="print" style="background-color: grey;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                </svg>
                Cetak Semua Data
            </a>
        </div>
        <br>
        <table border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Jabatan</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>No Rekening</th>
                <th>Alamat</th>
                <th class="aksi">Aksi</th>
            </tr>
            <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                while ($a = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $no++; ?>.</td>
                <td><?php echo $a['nik']; ?></td>
                <td><?php echo $a['nama']; ?></td>
                <td><?php echo $a['jk']; ?></td>
                <td><?php echo $a['agama']; ?></td>
                <td><?php echo $a['jabatan']; ?></td>
                <td><?php echo $a['telepon']; ?></td>
                <td><?php echo $a['email']; ?></td>
                <td><?php echo $a['rekening']; ?></td>
                <td><?php echo $a['alamat']; ?></td>
               <td>  
                    <a href="editKaryawan.php?id=<?= $a['id']; ?>" class="aksi edit">Edit</a> 
                    <a href="hapusKaryawan.php?id=<?= $a['id']; ?>" onclick="return confirm('Lanjutkan hapus?')" class="aksi hapus">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>