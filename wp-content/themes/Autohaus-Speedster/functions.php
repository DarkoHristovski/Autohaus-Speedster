<?php

$includes = [
	'inc/acf-contents.php',
	'inc/menu-walker.class.inc.php'
];

foreach($includes as $file){
	include_once($file);
}

function website_setup(){
	load_theme_textdomain( 'opernturm', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'responsive-embeds' );
}

function get_website_menu($type = 'Left'){
	return wp_nav_menu(
		[
			'menu' => $type,
			'theme_location' => $type,
			'container' => '',
			'echo' => false,
			'item_spacing' => 'discard',
			'walker' => new Website_Menu_Walker,
			'link_after' => '',
			'fallback_cb' => function() { return ''; }
		]
	);
}

function website_menus(){
	$locations = array(
		'Main'  => __( 'Main', 'opernturm' ),
		'Right'  => __( 'Right', 'opernturm' ),
		'Footer' => __( 'Footer', 'opernturm' ),
		'Mobile' => __( 'Mobile', 'opernturm' )
	);
	register_nav_menus( $locations );
}

function website_styles_and_scripts(){
	$styles = [
		'website' => ['file' => '/assets/css/styles.css']
	];
	$scripts = [
		'website' => ['file' => '/assets/js/main.js', 'dependencies' => ['jquery','owl-carousel']],
	];
	if ( !is_admin() ) {
		foreach($styles as $key => $style){
			wp_enqueue_style( $key, get_template_directory_uri() . $style['file'] );
		}
		wp_deregister_script('jquery');
		foreach($scripts as $key => $script){
			wp_enqueue_script( $key, get_template_directory_uri() . $script['file'], $script['dependencies'], wp_get_theme()->get( 'Version' ), true );
		}
	}
}

function get_image_by_id($attachment_id, $size = 'full'){
	$image = wp_get_attachment_image_src($attachment_id, $size);
	$image['src'] = $image[0];
	$image['alt'] = htmlspecialchars(get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ));
	return $image;
}

function normalize_characters($content){
	$content = str_replace( "a\xCC\x88", "ä", $content );
	$content = str_replace( "o\xCC\x88", "ö", $content );
	$content = str_replace( "u\xCC\x88", "ü", $content );
	$content = str_replace( "A\xCC\x88", "Ä", $content );
	$content = str_replace( "O\xCC\x88", "Ö", $content );
	$content = str_replace( "U\xCC\x88", "Ü", $content );
	return $content;
}

function website_mce_buttons($buttons){
	array_unshift( $buttons, 'styleselect' );
	$buttons[] = 'sup';
	$buttons[] = 'sub';
	return $buttons;
}

function website_custom_mce_styles($init_array){

	$style_formats = array(
		// These are the custom styles
		array(
			'title' => 'klein',
			'inline' => 'span',
			'classes' => 'text small-size',
			'wrapper' => true
		),
		array(
			'title' => 'gold',
			'inline' => 'span',
			'classes' => 'grey-color',
			'wrapper' => true
		),
		array(
			'title' => 'kein Umbruch',
			'inline' => 'span',
			'classes' => 'no-line-break',
			'wrapper' => true
		),
		array(
			'title' => '"Mehr-Text"-Absatz',
			'inline' => 'span',
			'classes' => 'more-text',
			'wrapper' => true
		),
		array(
			'title' => 'Text Normal',
			'inline' => 'span',
			'classes' => 'fw-normal',
			'wrapper' => true
		)
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}

// allow svg upload
function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}

function kb_ignore_upload_ext($checked, $file, $filename, $mimes){
	if(!$checked['type']){
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;

		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
			$ext = $type = false;
		}

		$checked = compact('ext','type','proper_filename');
	}

	return $checked;
}

function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);
add_filter( 'upload_mimes', 'kb_svg' );

// tiny mce
add_filter( 'mce_buttons_2', 'website_mce_buttons' );
add_filter( 'tiny_mce_before_init', 'website_custom_mce_styles' );

add_action( 'init', 'website_menus' );
add_action( 'after_setup_theme', 'website_setup' );
add_action( 'wp_enqueue_scripts', 'website_styles_and_scripts' );

do_shortcode( '[cf7-db-display-ip]' );

if (wp_get_current_user()->user_login == 'alex' || wp_get_current_user()->user_login == 'ralph') {
	add_filter('show_admin_bar', '__return_false');
}

function opernturm_after_login_redirection(){
    if (class_exists('SwpmLog')) {
        SwpmLog::log_simple_debug("After login redirection addon. Checking if member need to be redirected.", true);
    }

    $auth = SwpmAuth::get_instance();
    if ($auth->is_logged_in()) {
        //Check if there is a membership level specific after login redirection
        $level = $auth->get('membership_level');
        $level_id = $level;
        $key = 'swpm_alr_after_login_page_field';
        // $after_login_page_url = SwpmMembershipLevelCustom::get_value_by_key($level_id, $key);
		$after_login_page_url = '/mieter/';
		if(ICL_LANGUAGE_CODE != 'de'){
			$after_login_page_url = '/en/tenants/';
		}
        if (!empty($after_login_page_url)) {
            //Redirect to the membership level specific after login page.
            wp_redirect($after_login_page_url);
            exit;
        }

        //No redirection found. So stay on the current page.
    }
}

add_action('swpm_after_login', 'opernturm_after_login_redirection');


// Filter the wp_get_archives() and add a cat_id to this function
// Example: wp_get_cat_archives('type=monthly&format=option&show_post_count=1', 46);
add_filter('getarchives_where', 'custom_archives_where', 10, 2);
add_filter('getarchives_join', 'custom_archives_join', 10, 2);
function custom_archives_join($x, $r) {
	global $wpdb;
	if(is_array($r['cat'])){
		$cat_ID = $r['cat'][0];
	}else{
		$cat_ID = $r['cat'];
	}
	
	if (isset($cat_ID)) {
		return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
	} else {
		return $x;
	}
}

function custom_archives_where($x, $r) {
	global $wpdb;
	if(is_array($r['cat'])){
		$cat_ID = $r['cat'][0];
	}else{
		$cat_ID = $r['cat'];
	}
	if (isset($cat_ID)) {
		return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id IN ($cat_ID)";
	} else {
		$x;
	}
}

function wp_get_cat_archives($opts, $cat) {
	$args = wp_parse_args($opts, array('echo' => '1')); // default echo is 1.
	$echo = $args['echo'] != '0'; // remember the original echo flag.
	$args['echo'] = 0;
	if(is_array($cat)){
		$args['cat'] = $cat[0];
	}else{
		$args['cat'] = $cat;
	}
	$tag = ($args['format'] === 'option') ? 'option' : 'li';
	$archives = wp_get_archives(build_query($args));
	$archs = explode('', $archives);
	$links = array();
	foreach ($archs as $archive) {
		$link = preg_replace("/='([^']+)'/", "='$1?cat={$cat}'", $archive);
		array_push($links, $link);
	}
	$result = implode('', $links);
	if ($echo) {
		echo $result;
	} else {
		return $result;
	}
}

/*
function load_stylesheets(){

wp_register_style("bootstrap-grid", get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css',
array(), false, "all");
wp_enqueue_style("bootstrap-grid");


wp_register_style("bootstrap-reboot", get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css',
array(), false, "all");
wp_enqueue_style("bootstrap-reboot");



      wp_register_style("bootstrap.min", get_template_directory_uri() . '/assets/css/bootstrap.min.css',
array(), false, "all");
wp_enqueue_style("bootstrap.min");
         wp_register_style("styles.css", get_template_directory_uri() . '/assets/css/styles.css',
array(), false, "all");
wp_enqueue_style("styles.css");



}

add_action("wp_enqueue_scripts", "load_stylesheets");
*/


