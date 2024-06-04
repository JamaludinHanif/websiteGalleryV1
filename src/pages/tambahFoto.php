<?php

    session_start();
    $UserId = $_SESSION['UserId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="w-1/2 mx-auto">

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

    <div class="h-14"></div>

<form class="mt-28 mb-20" action="../config/foto.php" method="POST" enctype="multipart/form-data">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-xl font-semibold leading-7 text-blue-800">Tambah Foto</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Upload Foto mu dengan mengisi form dibawah ini.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <!-- judul foto -->
        <div class="sm:col-span-4">
          <label for="JudulFoto" class="block text-sm font-medium leading-6 text-gray-900">Judul Foto</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" required name="JudulFoto" id="JudulFoto" autocomplete="JudulFoto" class="block w-full flex-1 border-0 bg-transparent py-3 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Masukan Nama Foto kamu">
            </div>
          </div>
        </div>

        <!-- deskripsi foto -->
        <div class="col-span-full">
          <label for="DeskripsiFoto" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Foto</label>
          <div class="mt-2">
            <textarea id="DeskripsiFoto" required name="DeskripsiFoto" rows="3" class="block w-full py-3 px-3 rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Tulis deskripsi foto mu</p>
        </div>

        <!-- pilih album -->
        <div class="sm:col-span-3">
          <label for="AlbumId" class="block text-sm font-medium leading-6 text-gray-900">Pilih album kamu</label>
          <div class="mt-2">
            <select id="AlbumId" name="AlbumId" autocomplete="AlbumId" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <?php
                    include '../config/koneksi.php';
                    
                    // select data
                    $sql = "SELECT * FROM tbl_album WHERE UserId = $UserId";
                    $query = mysqli_query($koneksi, $sql);

                    while ($data = mysqli_fetch_array($query)) { 
                ?>
                    <option value="<?= $data['AlbumId'] ?>" ><?= $data['NamaAlbum'] ?></option>
                <?php
                    }
                ?>
            </select>
          </div>
        </div>
        
        <div class="col-span-full">
          <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="file-upload" name="LokasiFile" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <button type="submit" name="tambah" class="rounded-md bg-indigo-600 px-8  py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
</form>

</body>
</html>
