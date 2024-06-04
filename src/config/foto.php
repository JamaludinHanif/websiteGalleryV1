<?php
    session_start();
    include 'koneksi.php';

    if (isset($_POST['tambah'])) {
        $judulFoto = $_POST['JudulFoto'];
        $deskripsiFoto = $_POST['DeskripsiFoto'];
        $tanggalUnggah = date('Y-m-d');
        $albumId = $_POST['AlbumId'];
        $userId = $_SESSION['UserId'];
        $foto = $_FILES['LokasiFile']['name'];
        $tmp = $_FILES['LokasiFile']['tmp_name'];
        $lokasi = '../assets/img/';
        $namaFoto = rand().'-'.$foto;

        move_uploaded_file($tmp, $lokasi.$namaFoto);

        $sql = "INSERT INTO tbl_foto VALUES (NULL, '$judulFoto', '$deskripsiFoto', '$tanggalUnggah', '$namaFoto', '$albumId', $userId)";
        $query = mysqli_query($koneksi, $sql);

        echo "<script>
        alert('data berhasil disimpan')
        location.href = '../pages/myGallery.php'
        </script>";
    }
?>