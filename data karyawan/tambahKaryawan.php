<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }
?>

<?php
    if (isset($_POST['tambah'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $rekening = $_POST['rekening'];
        $alamat = $_POST['alamat'];

        include '../koneksi.php';
        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nik='$nik'"));
        if($cek > 0) {
            echo "<script>
                    alert('NIK Sudah Terdaftar');
                    document.location.href = 'dataKaryawan.php';
                </script>";
        } else {
             mysqli_query($koneksi, "INSERT INTO tb_karyawan(nik,nama,jk,agama,jabatan,telepon,email,alamat,rekening) 
             VALUES ('$nik', '$nama', '$jk', '$agama', '$jabatan', '$telepon', '$email', '$alamat', '$rekening')");
            echo "<script>
                    alert('Data Berhasil Tersimpan');
                    document.location.href = 'dataKaryawan.php';
                </script>";
        }

        // $tambah = mysqli_query($koneksi, "INSERT INTO tb_karyawan(nik,nama,jk,agama,jabatan,telepon,email,alamat,rekening) 
        //             VALUES ('$nik', '$nama', '$jk', '$agama', '$jabatan', '$telepon', '$email', '$alamat', '$rekening')");
        // if ($tambah > 0) {
        //     echo "<script>
        //             alert('Data berhasil ditambahkan');
        //             document.location.href = 'dataKaryawan.php';
        //         </script>";
        // } else {
        //     echo "<script>
        //             alert('Data gagal ditambahkan');
        //             document.location.href = 'dataKaryawan.php';
        //         </script>";
        // }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <header>
        <a href="dataKaryawan.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
    </header>

    <main>
        <center>
            <h1>Tambah Daya Karyawan</h1>
            <hr>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><input type="number" name="nik" required class="input"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" required class="input"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jk" class="radio-btn" value="Pria" required>Pria
                            <input type="radio" name="jk" class="radio-btn" value="Wanita" required>Wanita
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select name="agama">
                                <option disabled>Pilih agama</option>
                                <option>Islam</option>
                                <option>Konghuchu</option>
                                <option>Budha</option>
                                <option>Hindu</option>
                                <option>Kristen Protesta</option>
                                <option>Kristen Katolik</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>
                            <select name="jabatan">
                                <option disabled>Pilih jabatan</option>
                                <?php 
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi, "SELECT jabatan FROM tb_jabatan");
                                    while ($a = mysqli_fetch_assoc($data)) {
                                ?>
                                <option value="<?php echo $a['jabatan']; ?>"><?php echo $a['jabatan']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><input type="number" name="telepon" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td>No. Rekening</td>
                        <td>:</td>
                        <td><input type="text" name="rekening" required></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea name="alamat" required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="reset" class="reset">Reset</button>
                            <button type="submit" name="tambah" class="tambah">Tambahkan</button>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </main>
</body>
</html>