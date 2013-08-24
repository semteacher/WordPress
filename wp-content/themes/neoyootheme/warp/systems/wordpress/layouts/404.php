<div id="system">

<!--  TDMU -->
	<?php
		if ( is_user_logged_in() ) {?>
    		<h1 class="title"><center><?php _e('На даний момент показник обробляється', 'warp'); ?></center></h1>
		<?}else {?>

		<!-- <h1 class="title"><center><?php _e('Для перегляду інформації авторизуйтесь!', 'warp'); ?><br><br><a style='color:blue;' href='wp-login.php'>Вхід на сайт</a></center></h1>-->
		<?php
		}
		
	?>
<!--  TDMU -->

	<!-- <h1 class="title"><?php _e('<br><center>На даний момент показник обробляється, або ви не авторизовані.', 'warp'); ?></h1> -->
	
	<p><?php _e('', 'warp'); ?></p>

</div>