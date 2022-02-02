<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // set session
                $_SESSION['login'] = true;
                header("location:../index.php");
                exit;
            }
        }

        $error = true;


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>

    <div class="login">
        <h1>Halaman Login</h1>

        <?php if (isset($error)) : ?>
            <p style="color:red; font-style:italic;">Username/Password Salah!</p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required autofocus>
            
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" name="login">LOGIN</button>

            <p class="link">Belum punya akun?<a href="registrasi.php"> Registrasi</a></p>
        </form>
    </div>

</body>
</html