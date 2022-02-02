<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }
?>


<?php
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $total_masuk_kerja = $_POST['total_masuk_kerja'];
        $makan = $_POST['makan'];
        $transport = $_POST['transport'];
        $total_lembur = $_POST['total_lembur'];

        if ($jabatan == "Pilih Nama") {
            echo "<script>
                    alert('Silahkan pilih nama terlebih dahulu');
                    document.location.href = 'tambahGaji.php'
                </script>";
            exit;
        }

        include '../koneksi.php';
        $gaji_harian = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE jabatan='$jabatan'");
        while ($g_harian = mysqli_fetch_assoc($gaji_harian)) {
            $pokok = $total_masuk_kerja * $g_harian['gaji_harian'];
            $upah_lembur = $total_lembur * $g_harian['upah_lembur'];
        }

        $total_gaji = $makan + $transport + $pokok + $upah_lembur;

        $tambah = mysqli_query($koneksi, "INSERT INTO tb_gaji(nama,jabatan,pokok,makan,transport,total_masuk_kerja,lemburan,upah_lembur,total_gaji)
                                VALUES ('$nama','$jabatan','$pokok','$makan','$transport','$total_masuk_kerja','$total_lembur','$upah_lembur','$total_gaji')");
        if ($tambah > 0) {
            echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'dataGaji.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan');
                    document.location.href = 'dataGaji.php';
                </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gaji</title>
    <link rel="stylesheet" href="../css/style3.css">
    <script>
        function auto_select_jabatan(str) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange= function(){
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('jabatan').innerHTML = this.responseText;
                }
            }
            
            xmlhttp.open("GET","functionSelect.php?value="+str, true);
            xmlhttp.send();
        }
    </script>
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
            <h1>Tambah Gaji</h1>
            <hr>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <select  id="SelectA" onchange="auto_select_jabatan(this.value);" name="nama">
                                <option disabled>Pilih Nama</option>
                                <?php 
                                    include '../koneksi.php';
                                    $nama = mysqli_query($koneksi, "SELECT nama FROM tb_karyawan");
                                    while ($nma = mysqli_fetch_assoc($nama)) {
                                ?>
                                <option value="<?php echo $nma['nama']; ?>"><?php echo $nma['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>
                            <div id="jabatan" disabled>
                                <select name="jabatan">
                                    <option>Pilih Nama</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Masuk Kerja</td>
                        <td>:</td>
                        <td><input type="number" name="total_masuk_kerja" placeholder="Contoh : 5 Hari" required></td>
                    </tr>
                    <tr>
                        <td>Uang Makan</td>
                        <td>:</td>
                        <td><input type="number" name="makan" placeholder="Rp ..." required></td>
                    </tr>
                    <tr>
                        <td>Uang Transport</td>
                        <td>:</td>
                        <td><input type="number" name="transport" placeholder="Rp ..." required></td>
                    </tr>
                    <tr>
                        <td>Total Lembur</td>
                        <td>:</td>
                        <td><input type="number" name="total_lembur" placeholder="Contoh : 5 Jam" required></td>
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