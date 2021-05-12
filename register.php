<?php
    session_start();
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

    <form action="vendor/signup.php" method="POST" enctype="multipart/form-data">
        <label>Fullname</label>
        <input type="text" name="full_name" placeholder="Write your fullname">
        <label>Login</label>
        <input type="text" name="login" placeholder="Write your login">
        <label>Email</label>
        <input type="email" name="email" placeholder="Write your email">
        <label>Avatar</label>
        <input type="file" name="avatar">
        <label>Password</label>
        <input type="password" name="password" placeholder="Write your password">
        <label>Password_confirm</label>
        <input type="password" name="password_confirm" placeholder="Write your password confirm">
        <button type="submit">Text</button>
        <p>
            Do you have yet account? <a href ="auth.php">Authorization</a>
        </p>
        <?php
            if (isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';//вывели 
            }
            unset($_SESSION['message']); //уничтожили и сообщение повторно не выводиться
        ?>
    </form>

</body>
</html>