<?php 
	$db ='projectapp';
	$server = 'localhost';
	$name = 'root';
	$pass = '';
	$connect = mysqli_connect($server , $name , $pass , $db );
	if (!$connect) {
		echo mysqli_errno($connect);
	} 
 ?>