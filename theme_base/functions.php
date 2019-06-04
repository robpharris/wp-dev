<?php
//Functions Document

function theme_scripts() {
	$font_css = "http://fonts.googleapis.com/css?family=Open+Sans:400,800,300";
	$font_css2 = "https://fonts.googleapis.com/css?family=Amatic+SC";
	$font_awesome = get_template_directory_uri() . "/css/font-awesome.min.css";
	//$jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';
	$smilejs = get_template_directory_uri() . '/js/theme_actions.js';
	$bs_js = get_template_directory_uri() . '/js/bootstrap.min.js';
	wp_enqueue_script('j-query',$jquery,array(),'3.3.1',true);
	wp_enqueue_script('smilejs',$smilejs,array(),'1.0.0',true);
	wp_enqueue_script('bootstrap_js',$bs_js,array(),'5',true);
	wp_enqueue_style('open-sans',$font_css,false,'','all');
	wp_enqueue_style('amatic',$font_css2,false,'','all');
	wp_enqueue_style('fontawesome', $font_awesome,false,'','all');
	wp_enqueue_style('bootstrap',get_template_directory_uri() . "/css/bootstrap.min.css");
	wp_enqueue_style( 'style-main', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

require 'classes/bootstrap_4_walker.php';
function theme_menus(){
	register_nav_menus(
		array(
			'main-menu' => _('Main Menu')
		)
	);	
}
add_action('init','theme_menus');


register_nav_menu('navbar', __('Navbar', 'smile-theme'));

function home_widgets_init(){
	register_sidebar(
		array(
			'name' => 'Home Right Sidebar',
			'id' => 'home_main_widgets',
			//before_widget' => '<div>',
			//'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'home_widgets_init' );

function forms_widget_init(){
    register_sidebar(
        array(
            'name' => 'Forms Widgets',
            'id' => 'forms_widget',
            'before_title' => '<div class="hidden">',
            'after_title' => '</div>'
        )
    );
}
add_action( 'widgets_init', 'forms_widget_init' );

function footer_widgets_init(){
	register_sidebar(
		array(
			'name' => 'Footer Widgets',
			'id' => 'foot_widgets',
		)
	);
}
add_action( 'widgets_init', 'footer_widgets_init' );

function appt_widget_init(){
	register_sidebar(
		array('name' => 'Appointment Widget','id' => 'appt_widget')
	);
}
add_action('widgets_init', 'appt_widget_init');

function contact_widget_init(){
    register_sidebar(
        array('name' => 'Contact Widget','id' => 'contact_widget')
    );
}
add_action('widgets_init', 'contact_widget_init');

function inpage_widgets_init(){
	register_sidebar(
		array(
			'name' => 'Page Widgets',
			'id' => 'page_widgets',
		)
	);
}
add_action( 'widgets_init', 'inpage_widgets_init' );


add_theme_support( 'post-thumbnails' );
add_filter( 'widget_text', 'do_shortcode' );
/*function column($wid){
		return '<div style="width:' . $wid . 'px">';
}

function register_shortcodes(){
   add_shortcode('column', 'column_function');
}*/
?>