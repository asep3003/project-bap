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
        $gaji_harian = $_POST['gaji_harian'];
        $upah_lembur = $_POST['upah_lembur'];

        include '../koneksi.php';
        $ubah = mysqli_query($koneksi, "UPDATE tb_jabatan SET jabatan='$jabatan', gaji_harian='$gaji_harian', upah_lembur='$upah_lembur' WHERE id='$id'");

        if($ubah > 0 ) {
            echo "
                <script>
                    alert('Data berhasil diedit');
                    document.location.href = 'datajabatan.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit');
                    document.location.href = 'datajabatan.php';
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
    <title>Edit Posisi/Jabatan Karyawan</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <header>
        <a href="datajabatan.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
    </header>

    <main>
        <center>
            <h1>Edit Posisi/Jabatan Karyawan</h1>
            <hr>
            <form action="" method="post">
                <table>
                    <?php
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE id='$id'");
                        while ($a = mysqli_fetch_assoc($data)) {
                    ?>
                        <tr>
                            <td><label for="jabatan">Jabatan</label></td>
                            <td>:</td>
                            <td><input type="text" name="jabatan" id="jabatan" value="<?= $a['jabatan']; ?>"></td>
                            <td><input type="hidden" name="id" value="<?= $a['id']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="gaji_harian">Gaji Harian</label></td>
                            <td>:</td>
                            <td><input type="number" name="gaji_harian" id="gaji_harian" value="<?= $a['gaji_harian']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="upah_lembur">Upah Lembur</label></td>
                            <td>:</td>
                            <td><input type="number" name="upah_lembur" id="upah_lembur" value="<?= $a['upah_lembur']; ?>"></td>
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