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
    <p class="font-bold text-xl mt-5">My Album</p>
    <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
    <?php
        error_reporting(1);
        session_start();
        $UserId = $_SESSION['UserId'];
        include '../config/koneksi.php';

        // hapus data
        $AlbumId = $_GET['id'];
        $sqlHapus = "DELETE FROM tbl_album WHERE AlbumId = $AlbumId";
        if ($AlbumId) {
            $hapus = mysqli_query($koneksi, $sqlHapus);
            if ($hapus) {
                echo "<script>
                alert('album berhasil dihapus')
                </script>";
            }
        }
        
        // select data
        $sql = "SELECT * FROM tbl_album WHERE UserId = $UserId";
        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_array($query)) { 
    ?>
    <div class="mt-10 h-64 rounded-md w-full border shadow-lg">
        <div class="p-2 bg-blue-400">
            <p class="text-lg font-bold text-white text-center"><?= $data['NamaAlbum'] ?></p>
        </div>
        <div class="p-2">
            <p class="font-semibold text-black mt-2">Deskripsi :</p>
            <p class="text-black line-clamp-3"><?= $data['Deskripsi'] ?></p>
            <p class="mt-3 text-sm text-blue-500">dibuat pada tanggal : <span class="font-bold"><?= $data['TanggalDibuat'] ?></span></p>
            <div class="flex justify-between items-center">
                <div class="mt-4 w-2/5 cursor-pointer rounded-lg text-center mx-auto px-1 text-white font-semibold text-sm py-0.5 bg-blue-700">
                    <a href="isiAlbum.php?albumid=<?= $data['AlbumId'] ?>&namaalbum=<?= $data['NamaAlbum'] ?>">Lihat Album</a>
                </div>
                <div style="backgroundcolor: red" class="w-2/5 mt-4 cursor-pointer rounded-lg text-center mx-auto px-1 text-white font-semibold text-sm py-0.5 bg-red-700">
                    <a href="myAlbum.php?id=<?= $data['AlbumId'] ?>">Hapus</a>
                </div>
            </div>

        </div>
    </div>
    <?php
    }
    ?>
    <a href="buatAlbum.php">
    <div class="mt-10 h-64 flex items-center justify-center rounded-md w-full border-4 border-blue-500">
        <p class="text-2xl font-extrabold">Buat Album</p>

    </div>
    </a>
    </div>
  </div>
</div>

</body>
</html>