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
        
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];//time время длбавили, чтоб ничего не поторялось
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)){// ! знак если проверяет на ошибки
            $_SESSION['message'] = 'Parol not message';
            header('Location: ../register.php'); // перенаправляет          
        }        
        //загружаем картинку в браузере и в папке uploads сверху

        $password = password_hash($password, PASSWORD_DEFAULT);//зашифровали пароль в БД 

        //теперь соединяемся с БД, так зарегестрировали пользователя полностью 
        //такое код можно посмотреть в БД - Вставить - Предпросмотр SQL и копируешь код, но во 2 скобке Null нужно изменить, не обязательно все
        mysqli_query($connect, "INSERT INTO `samal` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
        $_SESSION['message'] = 'Success! You are registrated!';
        header('Location: ../auth.php');


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