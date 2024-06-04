<?php
    session_start();
    $Username = $_SESSION['Username'];
    $fotoId = $_GET['fotoid'];
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
<body class="h-screen w-full">
    <div class="h-screen w-full flex justify-center items-center">
        <div class="bg-white w-1/3 shadow-lg rounded-lg border">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base mb-5 font-semibold leading-6 text-gray-900">Komentar Foto</h3>
                <?php
                    include '../config/koneksi.php';
                            
                    // select data
                    $sql = "SELECT * FROM tbl_komentarfoto WHERE FotoId = $fotoId";
                    $query = mysqli_query($koneksi, $sql);
                    
                    while ($data = mysqli_fetch_array($query)) { 
                ?>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                        <p class="pt-1 pb-0.5 border-b inline-block"><?= $data['IsiKomentar']; ?></p>
                    </div>
                <?php
                    }
                ?>
                <form action="../config/komentar.php" method="POST" class="mt-5 justify-center sm:flex sm:items-center">
                    <div class="w-full sm:max-w-xs">
                        <input type="hidden" name="fotoId" value="<?= $fotoId; ?>">
                        <input type="text" name="komentarFoto" id="KomentarFoto" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukan Komentar Kalian">
                    </div>
                    <button type="submit" class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:ml-3 sm:mt-0 sm:w-auto">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>