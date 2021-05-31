<?php require_once '../header.php'; ?>

<div class="container">
	<div class="panel_search">
		<div class="panel_search__inner">
			<div class="panel_search__inner_elements">
				<?php select_game_and_type() ?>
			</div>
		</div>
	</div>
	<div class="block_posts">


		<div class="block_posts_elements">
			<?php
			$game = $_GET['game'];
			$usluga = $_GET['usluga'];
			game_result_show($game, $usluga);

			?>
		</div>
		<div class="left_aside_block">
			<div class="left_aside_block__inner">
				<?php
				if (!isset($_COOKIE['name'])) {
				?>
					<div class="warning">
						<em>Зарегистрируйтесь или войдите, чтобы иметь больше возможностей</em>
					</div>
				<?
				} else {
				?>
					<div class="left_aside_block__inner_el">
						<button class="popup-open-lot" type="submit" name="add_post">Добавить лот</button>
					</div>
					<!-- <a class="popup-open-lot" href="#">Регистрация</a> -->
					<div class="popup-fade-lot">
						<div class="popup-lot">
							<a class="popup-close" href="#">Закрыть</a>
							<? add_lot() ?>
						</div>
					</div>


					<div class="left_aside_block__inner_el">
						<button type="submit">Покупки</button>
					</div>
					<div class="left_aside_block__inner_el">
						<button type="submit">Продажи</button>
					</div>
					<div class="left_aside_block__inner_el">
						<button type="submit">Мои сообщения</button>
					</div>

				<?
				}
				?>


			</div>

		</div>
	</div>

</div>
<?php require_once '../footer.php' ?>