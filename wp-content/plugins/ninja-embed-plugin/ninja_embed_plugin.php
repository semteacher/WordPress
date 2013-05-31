<?php
/*
Plugin Name: Ninja Embed Plugin
Plugin URI: http://blog.ninjasforhire.co.za/65/ninja-embed-wordpress-plugin/
Description: This plugin allows you to filter media links from YouTube, Vimeo, Yahoo Video and Soundcloud and also allows for shortcodes in posts e.g. [media width="400" height="225" link="http://www.vimeo.com/12345"]. In the code it can be called like this: media_embed($mediaurl, $width, $height, $container[true/false]). For both methods Width and height is to change player dimentions and is optional. The plugin also comes with a widget to allow you to easily embed media in your sidebar.
Version: 2.2
Author: Ninjas for Hire
Author URI: http://www.ninjasforhire.co.za
*/

	
	// Media filter & embed
	// Support: YouTube, Vimeo, Souncloud, Yahoo Video
	function media_embed($mediaurl, $width, $height, $container=true) {
		
		if ($width == '') {
			$width = 400;
		}
		
		if ($height == '') {
			$height = 225;
		}
		
		$pos = strpos($mediaurl, 'http://');
		$pos_s = strpos($mediaurl, 'https://');
		if( ($pos === false) && ($pos_s === false) ) {
			$mediaurl = 'http://' . $mediaurl;
		}
		
		$media_source = explode('/', $mediaurl);
		$media_source = explode('.', $media_source[2]);
		
		if ($media_source[0] == 'soundcloud') {
			
			// soundcloud
			$output_string = '
				<iframe width="'.$width.'" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$mediaurl.'"></iframe>
			';
			
			if (!$container || $container == 'false') {
				echo $output_string;
			} else {
				echo '<div class="media_post">'.$output_string.'</div>';	
			}
			
		} else if ((($media_source[0] == 'www') && ($media_source[1] == 'vimeo')) || ($media_source[0] == 'vimeo')) {
			
			// vimeo
			
			$vimeo_key = explode('.com/', $mediaurl);
			$vimeo_key = explode('?', $vimeo_key[1]);
			
			$output_string = '<iframe src="http://player.vimeo.com/video/'.$vimeo_key[0].'?title=0&amp;byline=0&amp;portrait=0&amp;color=6fde9f" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			
			if(!$container || $container == 'false') {
				echo $output_string;
			} else {
				echo '<div class="media_post">'.$output_string.'</div>';
			}
			
		} else if ((($media_source[0] == 'www') && ($media_source[1] == 'youtube')) || ($media_source[0] == 'youtu') ) {
			
			// youtube
			
			if(strpos($mediaurl, "&v") || strpos($mediaurl, "?v")) {
				
				$youtube_key = explode('/', $mediaurl);
				$youtube_key = explode('v=', $youtube_key[3]);
				
				$youtube_key = explode('&', $youtube_key[1]);
				
			} else {
				
				$youtube_key = explode('?', $mediaurl);
				
				$youtube_key[0] = substr($youtube_key[0], -11);
				
			}
			
			$output_string = '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$youtube_key[0].'?rel=0" frameborder="0" allowfullscreen></iframe>';
			
			if (!$container || $container == 'false') {
				echo $output_string;
			} else {
				echo '<div class="media_post">'.$output_string.'</div>';	
			}
		
		} else if (($media_source[1] == 'yahoo') || ($media_source[2] == 'yahoo')) {
			
			// yahoo video
			
			$yahoo_key = explode('.com/', $mediaurl);
			$yahoo_key = explode('?', $yahoo_key[1]);
			$yahoo_key = explode('.html', $yahoo_key[0]);
			$yahoo_key = $yahoo_key[0];
			
			$length = strlen($yahoo_key);
			$start = $length - 8; 
			$yahoo_key = substr($yahoo_key, $start, 8);
			
			$output_string = '
				<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://d.yimg.com/nl/vyc/site/player.html#browseCarouselUI=hide&repeat=0&startScreenCarouselUI=hide&vid='.$yahoo_key.'"></iframe>
			';
			
			if (!$container || $container == 'false') {
				echo $output_string;
			} else {
				echo '<div class="media_post">'.$output_string.'</div>';	
			}
			
		} else {
			
			echo '<p>Sorry, this media provider is not currently supported.</p>';
			
		}
		
	}
	
	
	
	// Media embed shortcodes
	// Support: YouTube, Vimeo, Souncloud, Yahoo Video
	// Requires: media_embed()
	function shortcode_media($atts, $width = '', $height = '', $container = true) {
		
		extract(shortcode_atts(array(
			"link" => 'link',
			"width" => 'width',
			"height" => 'height',
			"container" => 'container'
		), $atts));
		
		
		
		if (!ctype_digit($width)) {
			$width = '';
		}
		if (!ctype_digit($height)) {
			$height = '';
		}
		
		ob_start();
		
		if ( ($width != '') && ($height != '') ) {
			media_embed($link, $width, $height, $container);
		} else {
			media_embed($link, '', '', $container);
		}
		
		$output_string = ob_get_contents();
		ob_end_clean();
		
		return $output_string;
		
	}
	add_shortcode("media", "shortcode_media");
	
	
	
	// Sidebar media widget
	// Support: YouTube, Vimeo, Souncloud, Yahoo Video
	// Requires: media_embed()
	class Widget_mediaembed extends WP_Widget {
 
		// constructor
		function Widget_mediaembed() {
			
			parent::WP_Widget('just_widget', 'Ninja Embed Widget', array('description' => 'Easily embed media from YouTube, Vimeo, Yahoo Video and Soundcloud into yourn sidebar.'));	
			
		}
	 	
		// display widget
		function widget($args, $instance) {
			
			extract($args, EXTR_SKIP);
			
			if ( !empty($instance['link']) ) {
			
				echo $before_widget;
				
				$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
				
				if ( !empty( $title ) ) {
					echo $before_title . $title . $after_title;
				};
				
				media_embed($instance['link'], $instance['width'], $instance['height'], false);
				
				echo $after_widget;
				
			}
				
		}
	 
		//	admin control form
		function form($instance) {
			
			$default = 	array(
				'title' => __('Media'),
				'link' => '',
				'width' => 200,
				'height' => 150
			);
			
			$instance = wp_parse_args( (array) $instance, $default );
	 		
			$field_title_id = $this->get_field_id('title');
			$field_title_name = $this->get_field_name('title');
			echo "\r\n".'<p><label for="'.$field_id.'">'.__('Title').': <input type="text" class="widefat" id="'.$field_title_id.'" name="'.$field_title_name.'" value="'.attribute_escape( $instance['title'] ).'" /><label></p>';
			
			$field_link_id = $this->get_field_id('link');
			$field_link_name = $this->get_field_name('link');
			echo "\r\n".'<p><label for="'.$field_id.'">'.__('Media link').': <input type="text" class="widefat" id="'.$field_link_id.'" name="'.$field_link_name.'" value="'.attribute_escape( $instance['link'] ).'" /><label></p>';
			
			$field_width_id = $this->get_field_id('width');
			$field_width_name = $this->get_field_name('width');
			echo "\r\n".'<p><label for="'.$field_id.'">'.__('Width').': <input type="text" class="widefat" id="'.$field_width_id.'" name="'.$field_width_name.'" value="'.attribute_escape( $instance['width'] ).'" /><label></p>';
			
			$field_height_id = $this->get_field_id('height');
			$field_height_name = $this->get_field_name('height');
			echo "\r\n".'<p><label for="'.$field_id.'">'.__('Height').': <input type="text" class="widefat" id="'.$field_height_id.'" name="'.$field_height_name.'" value="'.attribute_escape( $instance['height'] ).'" /><label></p>';
			
		}
	}
	
	add_action('widgets_init', just_register_widgets);

	function just_register_widgets(){
		register_widget('Widget_mediaembed');
	}
	
	
?>