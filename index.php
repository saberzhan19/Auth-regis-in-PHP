<?php 
require "db.php";
$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
    <?php if($user) : ?>
        <p>Welcome, <?php echo $user->login; ?></p>
        <a href="logout.php">Log out</a>

    <?php else : ?>
        <a href="register.php">Регистрация</a><br><br>
        <a href="auth.php">Авторизация</a><br>

    <?php endif; ?>
    
    </div>
    
</body>
</html>