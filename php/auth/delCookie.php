<?php 
header('Location: /');
setcookie("name" , $name , time() - (99999999*99999999) , '/');
setcookie("login" , $login , time() - (99999999*99999999) , '/');
setcookie("password" , $password , time() - (99999999*99999999) , '/');
exit;
 ?>
