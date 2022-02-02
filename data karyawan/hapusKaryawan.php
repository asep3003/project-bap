<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }
?>

<?php
    include '../koneksi.php';

    $id = $_GET['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id='$id'");
    
    if ($hapus > 0) {
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'dataKaryawan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'dataKaryawan.php';
        </script>";
    }

?>