      <?php require_once 'header.php'; ?>
      <div class="container">
        
         <form action="index.php" name="choice_game">
         	<label class="chng_game">Выберите игру</label>
	         <div class="game_tb">
	         	
	         	<?php show_game() ?>
	         	
	         </div>
         </form>

      </div>
<?php require_once 'footer.php' ?>