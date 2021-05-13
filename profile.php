<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form>
        <img src="?= $_SESSION['user']['avatar'] ?" width="100" alt="">
        <h2><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="http://"><?= $_SESSION['user']['full_name'] ?></a>
    </form>

</body>
</html>

