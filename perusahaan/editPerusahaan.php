<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }
?>

<?php
    if (isset($_POST['ubah'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kecamatan = $_POST['kecamatan'];
        $telepon = $_POST['telepon'];
        $pos = $_POST['pos'];
        $email = $_POST['email'];

        include '../koneksi.php';
        $ubah = mysqli_query($koneksi, "UPDATE tb_perusahaan SET nama='$nama', alamat='$alamat', kecamatan='$kecamatan', telepon='$telepon', pos='$pos', email='$email' WHERE id='$id'");

        if($ubah > 0 ) {
            echo "
                <script>
                    alert('Data berhasil diedit');
                    document.location.href = 'dataperusahaan.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit');
                    document.location.href = 'dataperusahaan.php';
                </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <header>
        <a href="dataPerusahaan.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
    </header>

    <main>
        <center>
            <h1>Data Perusahaan</h1>
            <hr>
            <form action="" method="post">
                <table>
                    <?php
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_perusahaan");
                        while ($a = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?= $a['nama']; ?>" required></td>
                        <input type="hidden" name="id" value="<?= $a['id']; ?>">
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea name="alamat"><?= $a['alamat']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td><input type="text" name="kecamatan" placeholder="Cont: Bogor Timur" value="<?= $a['kecamatan']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><input type="number" name="telepon" placeholder="Cont: 08812xxxxxxx" value="<?= $a['telepon']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><input type="number" name="pos" placeholder="Cont: 12981" value="<?= $a['pos']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" placeholder="Cont: contohemail@gmail.com" value="<?= $a['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right"><button name="ubah">Edit</button></td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
        </center>
    </main>
</body>
</html>