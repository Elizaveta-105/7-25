<?php
session_start();

// подключение к базе данных
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if(empty($login) || empty($pass))
{
    $_SESSION['error_message'] = "Заполните все поля";
    // перенаправление обратно на форму входа
    header("Location: index.php");
    exit();
} else {
    $sql = "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0)
    {
        // данные верны, устанавление сессии для пользователя
        $_SESSION['username'] = $login;
        // перенаправление на страницу личного кабинета
        header("Location: personal_cabinet.php");
        exit();
        // while($row = $result->fetch_assoc()){
        //     echo "Добро пожаловать, " . $row['login'];
        // }
    } else {
        $_SESSION['error_message'] = "Неверные данные авторизации! Попробйте снова.";
        // перенаправление обратно на форму входа
        header("Location: index.php");
        exit();
        // echo "Нет такого пользователя";
    }
}

// данные верны, и устанавливаем сессию для пользователя
// $_SESSION['username'] = $login;

// перенаправление на страницу личного кабинета
// header("Location: personal_cabinet.php");
// exit();
?>
