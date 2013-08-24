<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   YOOtheme Proprietary Use License (http://www.yootheme.com/license)
*/
if (have_posts()==0)
// ---------- TDMU ------------
		if ( !is_user_logged_in()) {?>
		<h1 class="title"><center><?php _e('Для перегляду інформації авторизуйтесь!', 'warp'); ?><br><br><a style='color:blue;' href='wp-login.php'>Вхід на сайт</a></center></h1>
		<?php
		}
// ---------- TDMU ------------
// output content from header/footer mode
if ($this->has('content')) {
	return $this->output('content');
}

$content = '';

if (is_home()) {
	$content = 'index';
} elseif (is_page()) {
	$content = 'page';
} elseif (is_attachment()) {
	$content = 'attachment';
} elseif (is_single()) {
	$content = 'single';
} elseif (is_search()) {
	$content = 'search';
} elseif (is_archive() && is_author()) {
	$content = 'author';
} elseif (is_archive()) {
	$content = 'archive';
} elseif (is_404()) {
	$content = '404';
}

echo $this->render(apply_filters('warp_content', $content));