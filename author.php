<?php 

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass = password_hash($pass, PASSWORD_DEFAULT);

$mysql = new mysqlalala('localhost', 'root', 'root', 'cva');

$result = $mysql->query("SELECT * FROM `deepWave` WHERE `login` = `$login` AND `pass` = `$pass`");

$user = $mysql->fetch_assoc();
if (count($user) == 0){
    echo "Such user not found";
    exit();
}

setcookie('deepWave', $user['name'], time() + 3600, "/");

$mysql-> close;

header('Location: /');

?>