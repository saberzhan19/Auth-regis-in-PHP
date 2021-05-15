<?php 
//здесь дейст происход на странице авторизаций
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    // $password = md5($_POST['password']);
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sad = "SELECT * FROM `samal` WHERE 'login' = '$login' && 'password' = '$password'";

    $check_user = mysqli_query($connect, $sad);
         

    if (mysqli_num_rows($check_user) > 0 ) {
    
        $user = mysqli_fetch_assoc($check_user);
    
        $_SESSION['login'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email']            
        ];
    
        header('Location: ../profile.php');
    
    } else {        
        $_SESSION['message'] = 'Login or Parol not matches';
        header('Location: ../auth.php');
    }
?>

<pre>
    <?php
        print_r($check_user);
        print_r($login);
    ?>
</pre>

    
    