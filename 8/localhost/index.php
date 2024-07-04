<?php
session_start();

// проверяем наличие сообщения об ошибке
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']); // очищаем сообщение после отображения

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Регистрация</h2>
         <!-- регистрация -->
        <form action="register.php" method="post">
            <input type="text" placeholder="login" name="login">
            <input type="text" placeholder="password" name="pass">
            <input type="text" placeholder="repeat password" name="repeatpass">
            <input type="text" placeholder="email" name="email">
            <button type="submit">Зарегистрироваться</button>
        </form>
    <div class="container">
        <h2>Авторизация</h2>

        <?php if (!empty($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- авторизация -->
        <form action="login.php" method="post">
            <input type="text" placeholder="login" name="login">
            <input type="text" placeholder="password" name="pass">
            <button type="submit">Войти</button>
        </form>
    </div>
    </div>
</body>
</html>