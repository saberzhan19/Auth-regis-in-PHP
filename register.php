<?php
require "db.php";
$data = $_POST;
$showError = false;//для вывода списка ошибок

//Забавное примечание! Благодаря папки ReadBean, которая была скачано сайта, например я создал БД, а она в свою очеред все остальное(таблицу со всеми данными), в регистраций я вписал данные, они ушли в БД!

//здесь отслежывают,проверить была ли отправлена форма
if(isset($data['register'])){
    $errors = array();
    $showError = True;

    // и по очериди проверять каждое поле для того чтобы в каждой форме писали необходимое а не ставили символы например в поле имени
    if(trim($data['full_name']) == ''){//и если тремирование (от слова trim) равна ==
        $errors[] = "Укажите имя";
    }
    if(trim($data['login']) == ''){
        $errors[] = "Укажите логин";
    }
    if(trim($data['email']) == ''){
        $errors[] = "Укажите почту";
    }
    if(trim($data['password']) == ''){
        $errors[] = "Напишите пароль";
    }
        
    if(trim($data['password']) != trim($data['password_confirm'])){
        $errors[] = "Не верный пароль!";
    }

    //Чтобы еще раз пользователь не зарегестрировалься
    //R::count проверяет наличие записи в БД
    if(R::count('users','email = ?', array($data['email'])) > 0){
        $errors[] = 'Пользователь с таким Email уже зарегистрирован!';
    }
    //и делаем проверку если у нас нету ошибок, то мы выполняем запись в БД
    if(empty($errors)){
        $user = R::dispense('users'); //dispense команда на запись БД
        $user->full_name = $data['full_name'];
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        //ОТПРАВЛЯЕМ сформированный список
        R::store($user);

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

    <form action="register.php" method="POST" enctype="multipart/form-data" >
        <label>Fullname</label>
        <input type="text" name="full_name" placeholder="Write your fullname" >
        <label>Login</label>
        <input type="text" name="login" placeholder="Write your login" >
        <label>Email</label>
        <input type="email" name="email" placeholder="Write your email" >
        <label>Avatar</label>
        <input type="file" name="avatar">
        <label>Password</label>
        <input type="password" name="password" placeholder="Write your password" >
        <label>Password_confirm</label>
        <input type="password" name="password_confirm" placeholder="Write your password confirm" >
        <button type="submit" name="register">Text</button>
        <p>
            Do you have yet account? <a href ="auth.php">Authorization</a>
        </p>
        
        <!-- здесь будут выводиться ошибки, если конечно они есть, если нет, то ничего не выведет -->
        <p><?php if($showError){echo showError($errors); } ?></p>
        <!-- забавно в html я писал в конце require, как бы обязывая заполнить поле, команда сверху в 1 поле все обьединяет -->
        
    </form>

</body>
</html>