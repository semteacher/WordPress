<div id="system">

	<?php if (have_posts()) : ?>

		<h1 class="title"><?php _e('Пошук', 'warp'); ?></h1>
		
		<?php echo $this->render('_posts'); ?>

		<?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

	<?php else : ?>

<!--  TDMU -->

		<?php
		if ( is_user_logged_in() ) {?>
    		<h1 class="title"><center><?php _e('Даного показника не знайденно', 'warp'); ?></h1>
		<?php get_search_form(); 
		} else {			?>

		<!-- 	<h1 class="title"><center>
		<?php _e('Для перегляду інформації авторизуйтесь!', 'warp'); ?>
		<br><br><a style='color:blue;' href='wp-login.php'>Вхід на сайт</a></center></h1> -->
		<?php
		}
		
		
		?>
<!--  TDMU -->
	<?php endif; ?>

</div>