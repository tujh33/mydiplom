<?php 

require_once '../connection.php';
if (isset($_COOKIE["login"])) {
	$user_login = $_COOKIE['login'];
	var_dump($user_login);
	$qry_for_db = "SELECT * FROM `user` WHERE login = '$user_login'";	
	$find_user = mysqli_fetch_array(mysqli_query($connect ,$qry_for_db));
	print_arr($find_user);

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
</head>
<body>
	<?php 

	include $_SERVER['DOCUMENT_ROOT'].'/header.php';

	 ?>
	<form action="posts.php" method="POST">
		
		<input type="text" name="subject" placeholder="subject" required> <br>

		<input type="text" name="description" placeholder="description" required><br>

		<input type="submit" name="button_submit" value="Отправить"><br>

	</form>

	<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = [];
		foreach ($_POST as $value) {
			$data = $_POST;
		}
		$subject = htmlspecialchars($data['subject']);
		$description = htmlspecialchars($data['description']);
		$user = $find_user['id_user'];
		// var_dump($user);
		$query = "INSERT INTO posts VALUES(null,'$subject','$description', '$user')";
		$req_for_post = mysqli_query($connect , $query);

	}
	
	$user_for_post = "SELECT * FROM posts INNER JOIN user on id_user = user_id";
	$user_for_post_show = mysqli_query($connect , $user_for_post);
	// print_arr($user_for_post_show);

	while ($resu = mysqli_fetch_array($user_for_post_show)) {
		echo $resu['subject'] . "<br>";
		echo $resu['description'] . "<br>";
		$dd = $resu['name'];
		echo "<a href='../profile/profile.php?profile=$dd'>";
		echo $resu['name'] . "<br>";
		echo "</a>";

		// echo "<a href='../profile/profile.php?account=$resu['login']'";
	}

	 ?>
	 <a href="/">главная</a>
</body>
</html>			