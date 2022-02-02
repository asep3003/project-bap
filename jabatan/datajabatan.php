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
    <title>Data Jabatan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <header>
        <a href="../index.php"  class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg>
            HOME
        </a>
    </header>

    <main>
        <h1>Data Jabatan</h1>
        <div style="text-align: left;">
            <a href="tambahjabatan.php" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Tambah Jabatan Karyawan
            </a>
        </div>
        <table border="1" cellspacing="0" cellpadding="2">
        <tr>
            <th>No.</th>
            <th>Posisi/Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Upah Lembur</th>
            <th>Aksi</th>
        </tr>
        <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
                while ($a = mysqli_fetch_assoc($data)) {
            ?>
        <tr>
            <td><?= $no++; ?>.</td>
            <td><?= $a['jabatan']; ?></td>
            <td><?= buatrupiah($a['gaji_harian']); ?></td>
            <td><?= buatrupiah($a['upah_lembur']); ?></td>
            <td>
                <a href="editjabatan.php?id=<?= $a['id']; ?>" class="aksi edit">Edit</a>
                <a href="hapusJabatan.php?id=<?= $a['id']; ?>" class="aksi hapus" onclick="return confirm('Lanjutkan hapus?')" >Hapus</a>
            </td>
        </tr>
        <?php } ?>
        </table>
    </main>

    


    
</body>
</html>