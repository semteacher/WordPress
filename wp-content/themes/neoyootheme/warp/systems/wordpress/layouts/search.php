<div id="system">

	<?php if (have_posts()) : ?>

		<h1 class="title"><?php _e('Пошук', 'warp'); ?></h1>
		
		<?php echo $this->render('_posts'); ?>

		<?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

	<?php else : ?>

		<h1 class="title"><?php _e('Даного показника не знайденно', 'warp'); ?></h1>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div>