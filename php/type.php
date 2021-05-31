
 <?php require_once '../header.php'; ?>
 <?php echo $_SESSION['game']; ?>
 <div class="container">
 	<div class="game_type">
 		<div class="game_type__inner_elements">

 				<div class="game_type__inner_elements_el">
 					<div class="el_name">
 						<? game_usluga('Аккаунт') ?>
 						Аккаунт
 					</div>
 					<div class="el_name">
 						<? game_usluga('Услуга') ?>
 						Услуга
 					</div>
 					<div class="el_name">
 						<? game_usluga('Валюта') ?>
 						Валюта
 					</div>
 				</div>



 		</div>
 	</div>
 </div>

 <?php require_once '../footer.php' ?>