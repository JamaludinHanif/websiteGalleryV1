<?php
    session_start();
    include 'koneksi.php';

    $fotoId = $_POST['fotoId'];
    $userId = $_SESSION['UserId'];
    $isiKomentar = $_POST['komentarFoto'];
    $tanggalKomentar = date('Y-m-d');

    $sql = "INSERT INTO tbl_komentarfoto VALUES (NULL, '$fotoId', '$userId', '$isiKomentar', '$tanggalKomentar')";
    $query = mysqli_query($koneksi, $sql);

    echo "<script>
    alert('komentar berhasil disimpan')
    location.href = '../pages/beranda.php'
    </script>";
?>