<div id="item-<?php the_ID(); ?>" class="item">

	<h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	
	<!--<p class="meta"><?php printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', get_the_date(), get_the_category_list(', ')); ?></p>
	-->
    <!--TDMU-->
	<p class="meta"><?php printf(__('<font color=green> Опубліковано </font><font color=black><b> %s. </b></font><font color=green> Оновлено </font><font color=black><b> %s. </b></font><font color=green>Категорія %s </font>', 'warp'), get_the_date(), get_the_modified_date(), get_the_category_list(', ')); ?></p>
	<!--TDMU-->
	<div class="content"><?php the_content(''); ?></div>

	<p class="links">
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Читати повністю', 'warp'); ?></a> 
	<!--	<?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp')); ?>-->
	</p>

	<?php edit_post_link(__('Змінити', 'warp'), '<p class="edit">','</p>'); ?>

</div>