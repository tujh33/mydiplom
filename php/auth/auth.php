<?php 
header('Location: http://projectapp:8080');
require_once '../connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [];
				foreach ($_POST as $value) {
					$data = $_POST;
				}
	switch ($_GET['acc']) {
		case 'register':
			?><?
				$login = htmlspecialchars($data['login']);
				$name = htmlspecialchars($data['name']);
				$password = htmlspecialchars($data['password']);
				$email = htmlspecialchars($data['email']);
				$avatar = '/php/user_avatar/default.png';
				$query = "INSERT INTO user VALUES(null,'$avatar','$login','$name','$password','$email',0)";
				$sendToDB = mysqli_query($connect , $query);
				if ($sendToDB) {
					session_start();
					setcookie("name" , $name , time() + (3600 * 24 * 30) , '/');
					setcookie("login" , $login , time() + (3600 * 24 * 30) , '/');
					setcookie("password" , $password , time() + (3600 * 24 * 30) , '/');				
				} else {
					echo "Какая-то ошибка";
				}	
			break;
		case 'login':

			$login = htmlspecialchars($data['login']);
			$password = htmlspecialchars($data['password']);
			$query = "SELECT * FROM `user` WHERE login = '$login' AND password = '$password'";
			$check = mysqli_query($connect , $query);
			$res = mysqli_fetch_array($check);
			$name = $res['name'];
			// var_dump($res);
			if ($res !== NULL) {
				session_start();
				setcookie("name" , $name , time() + (3600 * 24 * 30) , '/');
				setcookie("login" , $login , time() + (3600 * 24 * 30) , '/');
				setcookie("password" , $password , time() + (3600 * 24 * 30) , '/');
			} else {
				echo "что-то не так";
			}
			break;

		}
}
exit; 
// var_dump($res);
 ?>
 <a href="/">главная</a>