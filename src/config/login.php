<?php

    session_start();
    include 'koneksi.php';

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
    $query = mysqli_query($koneksi, $sql);

    $cekRows = mysqli_num_rows($query);

    if ($cekRows > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['Username'] = $data['Username'];
        $_SESSION['UserId'] = $data['UserId'];
        $_SESSION['status'] = 'login';
        echo "<script>
        alert('login berhasil')
        location.href = '../pages/home2.php'
        </script>";
    } else {
        echo "<script>
        alert('Login gagal, *password dan username salah')
        location.href = './../../'
        </script>";
    }

?>