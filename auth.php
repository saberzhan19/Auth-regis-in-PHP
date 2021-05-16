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

    <form action="vendor/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Write your login" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Write your password" required>
        <button type="submit">Text</button>
        <p>
            Do you have not account? <a href ="register.php">Registration</a>
        </p>
        
    </form>

</body>
</html>