<?php 
require "db.php";
$data = $_POST;
$showError = false;

if(isset($data['auth'])){
    $errors = array();
    $showError = True;
    //без этого каментарий о том, что заполненили поля, не работает, но все равно require красивее! 
    //Где написано укажите и заполнит в php, заменяят 1 слово в html 
    

    if(trim($data['login']) == ''){
        $errors[] = "Укажите логин";
    }
    if(trim($data['password']) == ''){
        $errors[] = "Укажите пароль";
    }

    //ищем пользователя в БД
    $user = R::findOne('users', 'login = ?', array($data['login']));

    if($user){
        if(password_verify($data['password'], $user->password)){
            $_SESSION['user'] = $user;
        }else{
            $errors[] = 'Неверный пароль';
        }
    }else{//если пользователь не был найден
        $errors[] = 'Пользователь не найден';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Registration and Authorization</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- Форма регистраций -->
    <!-- required в форме заполнение обязывает каждое поле, без нее нажав на кнопку пустые данные попадают БД -->

    <form action="auth.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Write your login" >
        <label>Password</label>
        <input type="password" name="password" placeholder="Write your password" >
        <button type="submit" name="auth">Text</button>
        <p>
            Do you have not account? <a href ="register.php">Registration</a>
        </p>
        
        <p><?php if($showError){echo showError($errors); } ?></p>

    </form>

</body>
</html>
