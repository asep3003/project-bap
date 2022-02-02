<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }                

    include '../koneksi.php';

    $value = $_GET["value"];
    $nama = mysqli_real_escape_string($koneksi, $value);
    $sql = "SELECT nama, jabatan FROM tb_karyawan WHERE nama='$nama'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result)>0) {

        echo "<select name='jabatan'>";
        while ($rows= mysqli_fetch_assoc($result)) {
            echo "<option>".$rows["jabatan"]."</option>";
        }
        echo "</select>";
    } else {
        echo "<select>
                <option>Pilih Nama</option>
            </select>";
    }
?>

