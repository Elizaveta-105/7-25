<?php
session_start();

// проверка сессии пользователя, чтобы убедиться, что пользователь авторизован
if (!isset($_SESSION['username'])) {
    // если сессия не установлена, перенаправляем на страницу входа
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет пользователя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Личный кабинет</h2>
        <p>Привет, <?php echo $_SESSION['username']; ?>!</p>
        <!-- Навигационная панель с корзиной и другими элементами -->
        <nav>
            <ul>
                <li><a href="settings.php">Настройки пользователя</a></li>
                <li><a href="basket.php">Корзина</a></li>
                <li><a href="favorites.php">Персональные предложения</a></li>
                
            </ul>
        </nav>
    </div>
</body>
</html>
