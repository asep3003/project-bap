<?php
    // koneksi database
    $conn = mysqli_connect("localhost","root","","db_penggajian");

    // fungsi query
    function query($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // fungsi registrasi
    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);

        // cek username sudah ada apa belum
        $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username='$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah tersedia!');
                    </script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                    alert('Konfirmasi password tidak sesuai');
                    </script>";
            return false;
        }
        
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO tb_user VALUES('','$username', '$password')");

        return mysqli_affected_rows($conn);
    }
?>