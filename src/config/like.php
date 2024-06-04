<?php

    session_start();
    include 'koneksi.php';
    $fotoId = $_GET['fotoid'];
    $userId = $_SESSION['UserId'];
    $tanggalLike = date('Y-m-d');

    $cekLike = mysqli_query($koneksi, "SELECT * FROM tbl_likefoto WHERE FotoId = '$fotoId' AND UserId = '$userId'");

    if (mysqli_num_rows($cekLike) == 1) {
        while ($data = mysqli_fetch_array($cekLike)) {
            $likeId = $data['LikeId'];
            $sql = "DELETE FROM tbl_likefoto WHERE LikeId = $likeId";
            $query = mysqli_query($koneksi, $sql);

            echo "<script>
            location.href = '../pages/beranda.php'
            </script>";
        }
    } else {
        $sql = "INSERT INTO tbl_likefoto VALUES (NULL, '$fotoId', '$userId', '$tanggalLike')";
        $query = mysqli_query($koneksi, $sql);

        echo "<script>
        location.href = '../pages/beranda.php'
        </script>";
    }

?>