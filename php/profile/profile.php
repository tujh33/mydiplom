<?php 
require_once '../connection.php';
if (isset($_GET['profile'])) {
	$name_profile = $_GET['profile'];
	$profile_qry = "SELECT * FROM user WHERE name = '$name_profile'";
	$profile_qry_to_db = mysqli_query($connect , $profile_qry);
	while ($resu = mysqli_fetch_array($profile_qry_to_db)) {
		?>
		<img src="<?echo $resu['avatar']?>">
		 <?
		echo $resu['name'] . "<br>";
		echo $resu['email'] . "<br>";
	}
}
 ?>
   <a href="/">вернуться</a>