<!DOCTYPE html>
<html>
<head>
    <title>Обработка регистрации</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $log = test_input($_POST['number']);
    $passw = test_input($_POST['password']);
    $passw2 = test_input($_POST['password2']);
    $mysqli = new mysqli("localhost", "root", "", "19", 3306);

    if ($mysqli->connect_error) {
        die("Ошибка подключения: " . $mysqli->connect_error);
    }

    $query = 'SELECT * FROM login WHERE number = ?';
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $log);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Ошибка выполнения запроса: " . $mysqli->error);
    }

    $user = $result->fetch_assoc();

    if (!empty($user)) {
        echo "<script>alert('Пользователь с таким номером телефона уже существует');</script>";
        include("index2.html");
    } else {
        if ($passw == $passw2) {
            $query2 = 'INSERT INTO login (number, password) VALUES (?, ?)';
            $stmt2 = $mysqli->prepare($query2);
            $stmt2->bind_param('ss', $log, $passw);

            if ($stmt2->execute()) {
                echo "<script>alert('Пользователь зарегистрирован.');</script>";
                include("index.html");
            } else {
                echo "<script>alert('Пользователь не зарегистрирован. Попробуйте еще раз');</script>";
                include("index4.html");
            }
        } else {
            echo "<script>alert('Пароли не совпадают');</script>";
            include("index4.html");
        }
    }

    $stmt->close();
    $mysqli->close();
    ?>
</body>
</html>
