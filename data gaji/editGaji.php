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
        $jabatan = $_POST['jabatan'];
        $total_masuk_kerja = $_POST['total_masuk_kerja'];
        $makan = $_POST['makan'];
        $transport = $_POST['transport'];
        $lemburan = $_POST['lemburan'];

        include '../koneksi.php';
        $gaji_harian = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE jabatan='$jabatan'");
        while ($g_harian = mysqli_fetch_assoc($gaji_harian)) {
            $pokok = $total_masuk_kerja * $g_harian['gaji_harian'];
            $upah_lembur = $lemburan * $g_harian['upah_lembur'];
        }

        $total_gaji = $pokok + $makan + $transport + $upah_lembur;

        $ubah = mysqli_query($koneksi, "UPDATE tb_gaji SET total_masuk_kerja='$total_masuk_kerja', pokok='$pokok', makan='$makan', transport='$transport', lemburan='$lemburan', upah_lembur='$upah_lembur', total_gaji='$total_gaji' WHERE id='$id'");

        if($ubah > 0 ) {
            echo "
                <script>
                    alert('Data berhasil diedit');
                    document.location.href = 'dataGaji.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit');
                    document.location.href = 'dataGaji.php';
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
    <title>Edit Gaji</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <header>
        <a href="dataGaji.php" class="nav-link"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
    </header>

    <main>
        <center>
            <h1>Edit Gaji</h1>
            <hr>
            <form action="" method="post">
                <table>
                    <?php
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_gaji WHERE id='$id'");
                        while ($a = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" id="nama" value="<?= $a['nama']; ?>" disabled>
                            <input type="hidden" name="id" value="<?= $a['id']; ?>">
                            <input type="hidden" name="jabatan" value="<?= $a['jabatan']; ?>">
                        </td>
                    </tr> 
                    <tr>
                        <td><label for="total_masuk_kerja">Total Masuk Kerja</label></td>
                        <td>:</td>
                        <td><input type="number" name="total_masuk_kerja" id="total_masuk_kerja" value="<?= $a['total_masuk_kerja']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="makan">Uang Makan</label></td>
                        <td>:</td>
                        <td><input type="number" name="makan" id="makan" value="<?= $a['makan']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="transport">Uang Transport</label></td>
                        <td>:</td>
                        <td><input type="number" name="transport" id="transport" value="<?= $a['transport']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="lemburan">Total Lembur</label></td>
                        <td>:</td>
                        <td><input type="number" name="lemburan" id="lemburan" value="<?= $a['lemburan']; ?>" required></td>
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