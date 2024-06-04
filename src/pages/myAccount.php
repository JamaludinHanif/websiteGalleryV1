<?php
    session_start();
    $Username = $_SESSION['Username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="h-screen w-full">
    <div class="h-screen w-full flex justify-center items-center">
        <div class="text-center">
            <p class="font-bold text-blue-700">
                Hii <?= $Username ?>
            </p>
            <a href="../config/logout.php">Logout</a>
        </div>
    </div>
</body>
</html>