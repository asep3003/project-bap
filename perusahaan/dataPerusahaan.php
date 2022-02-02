<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location:../login system/login.php");
        exit;
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
		<a href="../index.php" class="nav-link">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
				<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
			</svg>
			HOME
		</a>
	</header>

	<main>
		<center>
			<h1>Data Perusahaan</h1>
			<hr>
			<table>
				<?php
					include '../koneksi.php';
					$data = mysqli_query($koneksi, "SELECT * FROM tb_perusahaan");
					while ($a = mysqli_fetch_assoc($data)) {
				?>
				<tr>
					<td>Nama Perusahaan</td>
					<td>:</td>
					<td><?= $a['nama']; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?= $a['alamat']; ?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td><?= $a['kecamatan']; ?></td>
				</tr>
				<tr>
					<td>No. Telepon</td>
					<td>:</td>
					<td><?= $a['telepon']; ?></td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?= $a['pos']; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?= $a['email']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<a href="editPerusahaan.php">
							<button name="edit">Edit</button>
						</a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</main>
</body>
</html>