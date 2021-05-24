<?php 

$full_name = filter_var(trim($_POST['full_name']),FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass_confirm = filter_var(trim($_POST['pass_confirm']),FILTER_SANITIZE_STRING);

if(mb_strlen($full_name) < 3 || mb_strlen($full_name) > 120) {
    echo "Not access long name";
    exit();
}
if(mb_strlen($login) < 3 || mb_strlen($login) > 90) {
    echo "Not access long login";
    exit();
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo "Not accessable long password(from 2 till 6 symbols)";
}

$pass = password_hash($pass, PASSWORD_DEFAULT);

$mysql = new mysqlalala('localhost', 'root', 'root', 'cva');

$mysql->query("INSERT INTO `deepWave` (`full_name`, `login`, `email`, `pass`, `pass_confirm) VALUES ('$full_name', '$login', '$email', '$pass', '$pass_confirm')");

$mysql-> close();

header('Location: register.php');

?>