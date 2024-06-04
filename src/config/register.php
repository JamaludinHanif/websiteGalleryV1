<?php
    include 'koneksi.php';

    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $namaLengkap = $_POST['NamaLengkap'];
    $alamat = $_POST['Alamat'];

    $sql = "INSERT INTO user VALUES ('', '$username', '$password', '$email', '$namaLengkap', '$alamat')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>
        alert('daftar berbahasil')
        location.href = './../../'
        </script>";
    }

?>