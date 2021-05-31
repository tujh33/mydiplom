<?php 
// include 'php/connection.php';
	$db ='projectapp';
	$server = 'localhost';
	$name = 'root';
	$pass = '';
	$connect = mysqli_connect($server , $name , $pass , $db );

function print_arr($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}
function reg_in(){
	?> 
			<label>Форма регистрации</label>

			<form action="//projectapp:8080/php/auth/auth.php?acc=register" name="registration" method="POST">

				<input type="text" name="name" placeholder="Имя" required> <br>

				<input type="text" name="login" placeholder="Логин" required> <br>

				<input type="password" name="password" placeholder="Пароль" required><br>

				<input type="email" name="email" placeholder="Емейл" required><br>

				<button type="submit">
					Зарегистрироваться
				</button><br>

			</form>

	<?
	}
	function log_in(){
	?>
	 <label>Форма логина</label>
		 <!-- форма логина -->
		 <form action="//projectapp:8080/php/auth/auth.php?acc=login" method="POST">
		 	
		 	<input type="text" name="login" placeholder="Логин" required> <br>

			<input type="password" name="password" placeholder="Пароль" required><br>
		<button type="submit">
			Войти
		</button><br>

		 </form>
	<?
}		 	

function check_user(){
	global $connect;
	if (!isset($_COOKIE['name'])){
		?>

		<a class="popup-open" href="#">Логин</a>
	<div class="popup-fade">
		<div class="popup">
			<a class="popup-close" href="#">Закрыть</a>
			<? log_in() ?>
		</div>		
	</div>

	<a class="popup-open-reg" href="#">Регистрация</a>
	<div class="popup-fade-reg">
		<div class="popup-reg">
			<a class="popup-close" href="#">Закрыть</a>
			<? reg_in() ?>
		</div>		
	</div>

		<?
	} else {
		
		$user = $_COOKIE['name'];
		$user_qry = "SELECT * FROM user WHERE name = '$user'";
		$user_qry_get = mysqli_query($connect , $user_qry);
		?> 
		<div class="navbar__inner_el">Тех.поддержка</div>
		<div class="navbar__inner_el">Контакты</div>
		<div class="navbar__inner_el">
			<div class="user_menu">
				
				
					<?
					while ($resu = mysqli_fetch_array($user_qry_get)) {
						?>	<div class="user_menu_money"><?echo $resu['money'] . '₽';?></div>	<?
						?><div class="user_menu_img_ava"><img src="<? echo $resu['avatar'] ?>"></div><?
						
					}
					?>
				
				<div class="user_menu_name">
					<?	echo $_COOKIE['login']; ?>
				</div>
				<div class="user_menu_exit">
					<a href="http://projectapp:8080/php/auth/delCookie.php">Выйти</a>
				</div>
			</div>
			
				
			</div>	
		
		<?
	}
}

function send_post(){
	global $connect;
	if (isset($_COOKIE["login"])) {
		$user_login = $_COOKIE['login'];
		$qry_for_db = "SELECT * FROM `user` WHERE login = '$user_login'";		
		$find_user = mysqli_fetch_array(mysqli_query($connect ,$qry_for_db));
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = [];
		foreach ($_POST as $value) {
			$data = $_POST;
		}
		$subject = htmlspecialchars($data['subject']);
		$query_for_find_game = "SELECT id_game FROM games WHERE name = '$subject'";
		$query_find_gm = mysqli_fetch_array(mysqli_query($connect , $query_for_find_game));
		$game_id = $query_find_gm['id_game'];
		// var_dump($game_id);
		$type = htmlspecialchars($data['type']);
		$price = htmlspecialchars($data['price']);
		$description = htmlspecialchars($data['description']);
		$user = $find_user['id_user'];
		$query = "INSERT INTO posts VALUES(null,'$game_id','$subject','$type','$description','$price','$user')";
		$req_for_post = mysqli_query($connect , $query);
		var_dump($req_for_post);
		}
	}	
}
function add_lot(){
		global $connect;

         $find_game_qry = "SELECT * FROM games";
		 $find_game = mysqli_query($connect , $find_game_qry);
		 // print_arr($find_game);

          ?>

         <form action="http://projectapp:8080/php/game_result.php" method="POST">
         	<select name="subject">
         		<? 
         		while ($resu = mysqli_fetch_array($find_game)) {
         			$name = $resu['name'];
         			$game_id = $resu['id_game'];
         			?>
					<option value='<? echo $name ?>'> <? echo $name ?>
         			</option>
         			<?
         		}
         		?>
         	</select>
         	<select name="type">
         		<option value="Аккаунт">Аккаунт</option>
         		<option value="Услуга">Услуга</option>
         		<option value="Валюта">Валюта</option>
         	</select>
            <input type="text" name="description" placeholder="Описание" required><br>
            <input type="text" name="price" placeholder="Цена" required><br>
            <input type="submit" name="button_submit" value="Отправить"><br>
         </form>

		 <?php send_post() ?> <?
}
function show_post(){
	global $connect;

	$user_for_post = "SELECT * FROM posts INNER JOIN user on id_user = user_id";
	$user_for_post_show = mysqli_query($connect , $user_for_post);
	// print_arr($user_for_post_show);

	while ($resu = mysqli_fetch_array($user_for_post_show)) {

		?> 
		
		<?
		echo $resu['subject'] . "<br>";
		echo $resu['type'] . "<br>";
		echo $resu['description'] . "<br>";
		echo $resu['price'] . "р <br>";
		$dd = $resu['name'];
		echo "<a href='//projectapp:8080/php/profile/profile.php?profile=$dd'>";
		echo $resu['name'] . "<br>";
		echo "</a>";

		// echo "<a href='../profile/profile.php?account=$resu['login']'";
	} 
}
function show_game(){
	global $connect;
	$show_game_qry = "SELECT photo , name FROM games";
	$show_game = mysqli_query($connect , $show_game_qry);

	while ($resu = mysqli_fetch_array($show_game)) {
		$photo = $resu['photo'];
		$name = $resu['name'];

		?> 
		<!-- <form action="php/type.php" method="GET"> -->
			<div class="game_prev" style="flex-wrap: wrap">
				<!-- <a href="php/type.php?game=<? echo $name?>" class="gp_link" onclick="<? $_SESSION['game'] = $name; ?>"></a> -->
				<div class="game_prev_logo">
					<img src=<? echo $photo ?>>
				</div>
				<div class="game_prev_name">
					<? echo $name ?>
				</div>

				<div class="game_choice" style="flex-basis: 100%;">
					<div class="game_ch_el">
						<?php game_result($name , 'Аккаунт') ?>
					</div>
					<div class="game_ch_el">
						<?php game_result($name , 'Услуга') ?>
					</div>
					<div class="game_ch_el">
						<?php game_result($name , 'Валюта') ?>
					</div>
				</div>
			</div>
		<!-- </form> -->
		<?
	}
}

function game_result($game , $usluga){
	
	?> <a href="php/game_result.php?game=<? echo $game ?>&usluga=<? echo $usluga ?>"><? echo $usluga; ?></a> <?
	
}	

function select_game_and_type(){
	global $connect;
	$find_game_qry = "SELECT * FROM games";
	$find_game = mysqli_query($connect , $find_game_qry);
		 // print_arr($find_game);

          ?>

         <form action="http://projectapp:8080/php/game_result.php" method="GET">
         	<select name="game">
         		<? 
         		while ($resu = mysqli_fetch_array($find_game)) {
         			$name = $resu['name'];
         			$game_id = $resu['id_game'];
         			?>
					<option value='<? echo $name ?>'> <? echo $name ?>
         			</option>
         			<?
         		}
         		?>
         	</select>
         	<select name="usluga">
         		<option value="Аккаунт">Аккаунт</option>
         		<option value="Услуга">Услуга</option>
         		<option value="Валюта">Валюта</option>
         	</select>


		    <button type="submit" id="panel_button" name="search" value="Найти">Найти</button> 


         </form>
         <?
}


function game_result_show($game , $usluga){

	global $connect;

	$user_for_post = "SELECT * FROM posts INNER JOIN user on id_user = user_id WHERE subject = '$game' AND type = '$usluga'";
	$user_for_post_show = mysqli_query($connect , $user_for_post);

	while ($resu = mysqli_fetch_array($user_for_post_show)) {
		?> 
			
					<div class="block_posts_elements_el">
						<div class="user_block">
							<div class="el_avatar">
								<img src="<?echo $resu['avatar']?>">
								
							</div>
							<div class="el_user">
								<? 
								$dd = $resu['name'];
								echo "<a href='php/profile/profile.php?profile=$dd'>";
								echo $resu['name'];
								echo "</a>"; ?>
							</div>
						</div>

						<div class="product_block">
							<div class="el_game">
								<div class="gm">
									Игра
								</div> 
								<? echo $resu['subject'] ?>
							</div>
							<div class="el_desc">
								<div class="dsc">
									Описание
								</div>
								<? echo $resu['description'] ?>
							</div>
							<div class="el_type">
								<div class="typ">
									Тип
								</div>
								<? echo $resu['type'] ?>
							</div>
							<div class="el_price">
								<div class="prc">
									Цена
								</div>
								<? echo $resu['price'] . '₽' ?>
							</div>
						</div>
						<div class="button_block">
							<div class="button_el">
								<button type="submit" value="Посмотреть профиль">Посмотреть профиль</button>
							</div>
							<div class="button_el">
								<a href="/php/buy.php?id=<?=$resu['id_post']?>"><button type="submit" value="Купить">Купить</button></a>
							</div>
						</div>
					</div>	
					
		<?
		
	} 

}
function pay(){
	global $connect;
	$get_id = $_GET['id'];
	// var_dump($get_id);
	$pay_qry = "SELECT * FROM posts WHERE id_post = '$get_id'";
	$pay_qry_send = mysqli_query($connect , $pay_qry);
	// var_dump($pay_qry_send);
	?><form action="buy.php?id=<?= $get_id ?>" method="POST"><?
	while ($resu = mysqli_fetch_array($pay_qry_send)) {
		$sub = $resu['subject'];
		$type = $resu['type'];
		$desc = $resu['description'];
		$price = $resu['price'];
		// echo $resu['subject'] . '<br>';
		// echo $resu['type'] . '<br>';
		// echo $resu['description'] . '<br>';
		// echo $resu['price'] . '<br>';
		?>	
		<input type="text" name='subject' value="<?= $sub ?>" hidden>
		<input type="text" name='type' value="<?= $type ?>" hidden>
		<input type="text" name='description' value="<?= $desc ?>" hidden>
		<input type="text" name='price' value="<?= $price ?>" hidden>
		<input type="submit" value="Оплатить">
		<?
		// var_dump($get_id);
	}
	?></form><?

	if ($_POST['subject']) {
		foreach ($_POST as $value) {
			echo $value;
		}
	}
}


// будущая функция загрузки аватара
function upload_avatar(){
	$path = 'php/user_avatar/'; // директория для загрузки
	$ext = array_pop(explode('.',$_FILES['myfile']['name'])); // расширение
	$new_name = time().'.'.$ext; // новое имя с расширением
	$full_path = $path.$new_name; // полный путь с новым именем и расширением

	if($_FILES['myfile']['error'] == 0){
	    if(move_uploaded_file($_FILES['myfile']['tmp_name'], $full_path)){
	        // Если файл успешно загружен, то вносим в БД (надеюсь, что вы знаете как)
	        // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
	    }
	}
}
 ?>