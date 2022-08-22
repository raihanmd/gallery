<?php

require "function.php";


if(isset($_POST["submit"])){



    //cek keberhasilan
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>
    ";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="gambar" id="gambar">
        <button class="button" type="submit" name="submit"></button>
    </form>
    <script src="main.js"></script>
</body>
</html>