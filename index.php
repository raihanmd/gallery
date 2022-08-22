<?php

require "function.php";

$pictures = query("SELECT * FROM picture")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
        <?php $i = 1; ?>
        <?php foreach($pictures as $row) : ?>
        <img src="img/<?= $row["gambar"]?>">
        <?php $i++; ?>
        <?php endforeach; ?>
</body>
</html>