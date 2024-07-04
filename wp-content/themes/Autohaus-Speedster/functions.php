<?php

$includes = [
	'inc/acf-contents.php',
	'inc/menu-walker.class.inc.php'
];

foreach($includes as $file){
	include_once($file);
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
		'Main'  => __( 'Main', 'autohaus-speedster' ),
	);
	register_nav_menus( $locations );
}

function website_styles_and_scripts(){
	$styles = [
		'website' => ['file' => '/assets/css/styles.css']
	];
	$scripts = [
		'website' => ['file' => '/assets/js/main.js', 'dependencies' => []],
	];

		foreach($styles as $key => $style){
			wp_enqueue_style( $key, get_template_directory_uri() . $style['file'] );
		}

		foreach($scripts as $key => $script){
			wp_enqueue_script( $key, get_template_directory_uri() . $script['file'], $script['dependencies'], wp_get_theme()->get( 'Version' ), true );
		}
	
}


// allow svg upload
function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}

add_filter( 'upload_mimes', 'kb_svg' );
add_action( 'init', 'website_menus' );
add_action( 'wp_enqueue_scripts', 'website_styles_and_scripts' );



function my_enqueue_scripts() {
    wp_enqueue_script( 'my-react-app', get_template_directory_uri() . '/build/bundle.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );



