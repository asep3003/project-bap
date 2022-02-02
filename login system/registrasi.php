<?php
    require 'functions.php';

    if (isset($_POST['register'])) {
        
        if (registrasi($_POST) > 0 ) {
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                    document.location.href = '../index.php';
                    </script>";
        } else {
            echo mysqli_error($conn);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

    <div class="registrasi">
        <h1>Halaman Registrasi</h1>
        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required autofocus>

            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>
                    
            <label for="password2">Konfirmasi password :</label>
            <input type="password" name="password2" id="password2" required>

            <button type="submit" name="register">REGISTRASI</button>
            <p class="link">Sudah punya akun?<a href="login.php"> Login</a></p>
        </form>
    </div>

</body>
</html>