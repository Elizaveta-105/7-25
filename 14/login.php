<!DOCTYPE html>

<html>
    <head>
        <title>Вход</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
			$log = $_POST['num2'];
			$passw = $_POST['par3'];
			try
			{
                $mysqli = new mysqli("localhost","root","","reg",3306);
				$query = 'SELECT * FROM regg Where number="'.$log.'"';
                $result = mysqli_query($mysqli,$query);
				$user = mysqli_fetch_assoc($result);
				if (!empty($user))
				{
					if (password_verify($passw,$user['parol'])){
				//Создание сессии и переменных сессии:
						session_start();
						$_SESSION['auth']=true;
						$_SESSION['number']= $user['number'];
						Header("Location:index.html");
					}
					else echo "<script>alert('Верный логин и пароль');</script>";
					include("index2.html");
				}
				else {
					echo "<script>alert('Логин/пароль неверные');</script>";
					include("index2.html");
				}
			}
			catch (Exception $ex)
			{
				echo "Ошибка: ".$ex->getMessage();
			}
		?>
		
    </body>
</html>


