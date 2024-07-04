<!DOCTYPE html>
<html>
<head>
    <title>Задание</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
    $log = $_POST['number2'];
    $passw = $_POST['password3'];
    try {
        $mysqli = new mysqli("localhost", "root", "", "19", 3306);
        if ($mysqli->connect_error) {
            throw new Exception("Ошибка подключения: " . $mysqli->connect_error);
        }

        $query = 'SELECT * FROM login WHERE number = ?';
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $log);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            throw new Exception("Ошибка выполнения запроса: " . $mysqli->error);
        }

        $user = $result->fetch_assoc();
        
        // Отладочный вывод для проверки содержимого $user
        echo "<pre>";
        print_r($user);
        echo "</pre>";

        if (!empty($user)) {
            if (isset($user['password']) && $passw == $user['password']) {
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['number'] = $user['number'];
                header("Location: index.html");
            } else {
                echo "<script>alert('Неверный логин/пароль');</script>";
                include("index2.html");
            }
        } else {
            echo "<script>alert('Логин/пароль неверные');</script>";
            include("index2.html");
        }
    } catch (Exception $ex) {
        echo "Ошибка: " . $ex->getMessage();
    }
    ?>
</body>
</html>
