<?php
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
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

    <form enctype="multipart/form-data">
        <img src= "<?= $_SESSION['login']['avatar'] ?>" width="300" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['login']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['login']['full_name'] ?></a>
        <a href="" class="Logout">Exit</a>
    </form>

</body>
</html>

