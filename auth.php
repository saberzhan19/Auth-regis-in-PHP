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
    <form action="vendor/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Write your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Write your password">
        <button type="submit">Text</button>
        <p>
            Do you have not account? <a href ="register.php">Registration</a>
        </p>
        <?php
            if (isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';//вывели 
            }
            unset($_SESSION['message']); //уничтожили и сообщение повторно не выводиться
        ?>
    </form>

</body>
</html>