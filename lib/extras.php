<?php


/* Clean up the_excerpt() */

function roots_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}

add_filter('excerpt_more', 'roots_excerpt_more');

/* Manage output of wp_title() */

function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);


/* Regenerate thumbnails automatically after editing an image */

add_action('image_save_pre', 'add_image_options');
function add_image_options($data){
	global $_wp_additional_image_sizes;
	foreach($_wp_additional_image_sizes as $size => $properties){
		update_option($size."_size_w", $properties['width']);
		update_option($size."_size_h", $properties['height']);
		update_option($size."_crop", $properties['crop']);
	}
	return $data;
}

/* Gravity Forms by default will write an inline JavaScript call to jQuery on every form you add to a page.  
This will throw an error if you’re loading jQuery in the footer of your site (which you should be doing). This filter overrides this behavior */

add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
return true;
}
