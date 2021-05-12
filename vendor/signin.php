<?php 
//здесь дейст происход на странице авторизаций
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    // $password = md5($_POST['password']);
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $check_user = mysqli_query($connect, "SELECT * FROM `samal` WHERE 'login' = '$login' AND 'password' = '$password'");
    echo mysqli_num_rows($check_user);
    /* if (mysqli_num_rows($check_user) > 0) {

    } else {
        $_SESSION['message'] = 'Login or Parol not matches';
        header('Location: ../auth.php');
    } */