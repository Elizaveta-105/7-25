<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новостной сайт</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>Последние новости</h1>
        <div class="tabs">
            <a href="#profile">Профиль</a>
            <a href="#settings">Настройки</a>
        </div>
    </div>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "news_db";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get news from the database
        $sql = "SELECT * FROM news ORDER BY date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="news">';
                echo '<h2>'.$row["title"].'</h2>';
                echo '<p>'.$row["content"].'</p>';
                echo '<p><small>'.$row["date"].'</small></p>';
                echo '</div>';
            }
        } else {
            echo "No news available";
        }

        $conn->close();
        ?>
    </div>
    <div class="contact">
        <h2>Контакты</h2>
        <p>news@mail.ru</p>
        <p>+79134567877</p>
        <p>пр. Комсомольский 2</p>
        <p><small>04.07.2024</small></p>
    </div>
</div>
</body>
</html>