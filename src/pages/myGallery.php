<?php

    session_start();
    $UserId = $_SESSION['UserId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">]
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
            <img class="h-8 w-auto" src="../img/dudul.jpg" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="beranda.php" class="text-sm font-semibold leading-6 text-gray-900">Beranda</a>
            <a href="myAlbum.php" class="text-sm font-semibold leading-6 text-gray-900">My Album</a>
            <a href="myGallery.php" class="text-sm font-semibold leading-6 text-gray-900">My Gallery</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <div class="px-2.5 py-2.5 bg-indigo-600 rounded-md cursor-pointer">
            <a href="myAccount.php" class="text-sm font-semibold leading-6 text-white">My Account dan pengaturan</a>
            </div>
        </div>
        </nav>
    </header>

  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <p class="font-bold text-xl mt-5">My Gallery </p>
    <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
    <?php
        include '../config/koneksi.php';
                            
        // select data
        $sql = "SELECT * FROM tbl_foto WHERE UserId = $UserId";
        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_array($query)) { 
    ?>
      <div>
        <div class="relative">
          <div class="relative mt-10 h-72 w-full overflow-hidden rounded-lg">
            <img src="../assets/img/<?= $data['LokasiFile'] ?>" alt="hanif ganteng" class="h-full w-full object-cover object-center">
          </div>
          <div class="relative mt-4">
            <h3 class="text-sm font-bold text-gray-900"><?= $data['JudulFoto'] ?></h3>
            <p class="mt-1 text-sm text-gray-500 line-clamp-1"><?= $data['DeskripsiFoto'] ?></p>
          </div>
          <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
            <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
            <?php
                $fotoId = $data['FotoId'];
                $queryLike = mysqli_query($koneksi, "SELECT * FROM tbl_likefoto WHERE FotoId = '$fotoId'");
                $jumlahLike = mysqli_num_rows($queryLike);  
            ?>
            <p class="relative text-lg font-semibold text-white">❤️<?=$jumlahLike ?></p>
          </div>
        </div>
        <div class="mt-6">
          <a href="komentar.php?fotoid=<?= $data['FotoId']; ?>" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">💬 Komentar</a>
        </div>
      </div>
    <?php
    }
    ?>
    <a href="tambahFoto.php">
    <div class="mt-10 h-64 flex items-center justify-center rounded-md w-full border-4 border-blue-500">
        <p class="text-2xl font-extrabold">Tambah Foto</p>
    </div>
    </a>
    </div>
  </div>
</div>

</body>
</html>