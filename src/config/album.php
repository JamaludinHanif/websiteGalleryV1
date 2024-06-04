<?php
    session_start();
    include 'koneksi.php';

    if (isset($_POST['tambah'])) {
        $namaAlbum = $_POST['NamaAlbum'];
        $deskripsi = $_POST['Deskripsi'];
        $tanggal = date('Y-m-d');
        $userId = $_SESSION['UserId'];

        $sql = "INSERT INTO tbl_album VALUES (NULL, '$namaAlbum', '$deskripsi', '$tanggal', '$userId')";
        $query = mysqli_query($koneksi, $sql);

        echo "<script>
        alert('data berhasil disimpan')
        location.href = '../pages/myAlbum.php'
        </script>";
    }
?>