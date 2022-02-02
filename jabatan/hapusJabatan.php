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
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_jabatan WHERE id='$id'");
    
    if ($hapus > 0) {
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'datajabatan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'datajabatan.php';
        </script>";
    }

?>