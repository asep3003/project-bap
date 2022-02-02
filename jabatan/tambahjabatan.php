<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
    }
?>

<?php 
	if(isset($_POST['tambahkan'])) {
		$jabatan = $_POST['jabatan'];
		$gaji_harian = $_POST['gaji_harian'];
		$upah_lembur = $_POST['upah_lembur'];

		include '../koneksi.php';

		$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE jabatan='$jabatan'"));
		if($cek > 0) {
			echo "<script>
					alert('Jabatan Sudah Tersedia');
					document.location.href = 'datajabatan.php';
				</script>";
		} else {
			mysqli_query($koneksi, "INSERT INTO tb_jabatan(jabatan,gaji_harian,upah_lembur) VALUES ('$jabatan','$gaji_harian','$upah_lembur')");
			echo "<script>
					alert('Data Berhasil Tersimpan');
					document.location.href = 'datajabatan.php';
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
    <title>Tambah Posisi Karyawan Perusahaan</title>
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
    		<h1>Tambah Posisi Karyawan Perusahaan</h1>
    		<hr>
    		<form action="" method="post">
    			<table>
    				<tr>
    					<td>Posisi/Jabatan</td>
    					<td>:</td>
    					<td><input type="text" name="jabatan" required></td>
    				</tr>
    				<tr>
    					<td>Gaji Pokok</td>
    					<td>:</td>
    					<td><input type="number" name="gaji_harian" required placeholder="Rp..."></td>
    				</tr>
    				<tr>
    					<td>Upah Lembur</td>
    					<td>:</td>
    					<td><input type="number" name="upah_lembur" required placeholder="Rp..."></td>
    				</tr>
    				<tr>
    					<td></td>
    					<td></td>
    					<td>
    						<button type="reset" class="reset">Reset</button>
    						<button type="submit" name="tambahkan">Tambahkan</button>
    					</td>
    				</tr>
    			</table>
    		</form>
    	</center>
    </main>
</body>
</html>