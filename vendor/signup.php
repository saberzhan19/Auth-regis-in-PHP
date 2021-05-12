<?php 

    session_start();//$_SESSION для работы подключаем
    require_once 'connect.php';//Подключаемся к пути, где подключина БД

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    //проверка пароли на совпадение
    if ($password === $password_confirm) {
        
    } else {
        $_SESSION['message'] = 'Parol not matches';//Супер глобальный от $_SESSION сообщение будет доступно везде
        header('Location: ../register.php');
        // die('parol not matches');
    }
?>

<!-- снизу все отдельно проверяем как массив -->
<!-- <pre>
      <?php 
          // print_r($_POST['email']);//как обычному массиву обратиться, аможно ко всем написав - print_r($_POST);
          echo $_POST['email'];//можно и так
      ?>
</pre> -->

<!-- <pre>
    <?php
        print_r($_FILES);//ИЗОБРАЖЕНИЕ передаеться так
    ?>
</pre> -->