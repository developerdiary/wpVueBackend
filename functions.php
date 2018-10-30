<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyfifteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



function enqueue_vue_js($hook) {

	global $pw_settings_page;

	if( $hook != $pw_settings_page) {
		return;		
	}
    wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', NULL, '', true );
    wp_enqueue_script( 'vue_script', get_stylesheet_directory_uri() . '/assets/js/vuecommon.js', NULL, '', true);
}
add_action( 'admin_enqueue_scripts', 'enqueue_vue_js' );

function awesome_page_create() {

	global $pw_settings_page;

	//$parent_slug = "tools.php";
    $page_title = 'My Awesome Admin Page';
    $menu_title = 'Awesome Admin Page';
    $capability = 'edit_posts';
    $menu_slug = 'awesome_page';
    $function = 'my_awesome_page_display';
    $icon_url = '';
    $position = 24;

    $pw_settings_page = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
}

function my_awesome_page_display() {
	
	echo '<div id="app">';
    echo '<h1> {{title}} </h1>';
    echo '<app-display></app-display>';
    echo '</div>';
}

add_action('admin_menu', 'awesome_page_create');


?>