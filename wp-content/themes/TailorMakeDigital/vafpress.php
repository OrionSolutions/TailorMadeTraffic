<?php
ob_start();
ob_get_contents();
/**
 * Load Languages
 */
add_action('after_setup_theme', 'vp_tb_load_textdomain');

function vp_tb_load_textdomain()
{
	load_theme_textdomain('vp_textdomain', get_template_directory() . '/lang/');
}

/**
 * Include Vafpress Framework
 */
require_once 'vafpress/bootstrap.php';

/**
 * Include Custom Data Sources
 */
require_once 'options/admin/data_sources.php';

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */

// options
$tmpl_opt  = get_template_directory() . '/options/admin/option/option.php';

// shortocode generators
$tmpl_sg1  = get_template_directory() . '/options/admin/shortcode_generator/shortcodes1.php';
$tmpl_sg2  = get_template_directory() . '/options/admin/shortcode_generator/shortcodes2.php';

/**
 * Create instance of Options
 */


/* Theme Options Position and icon */

$tailormade_menu_page = array(
        'icon_url' => get_template_directory_uri() . '/options/public/img/options-icon.png',
        'position' => 99,
    );
 
$tailormade_theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'vpt_option',                           // options key in db, required
	'page_slug'             => 'vpt_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => $tailormade_menu_page,                  // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fluid',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', 'vp_textdomain' ), // page title
	'menu_label'            => __( 'Theme Options', 'vp_textdomain' ), // menu label
));

/* ============================================================ */
/* Metaboxes */
/* ============================================================ */
/* Pages Metabox */
$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/page-options.php');
//$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/slider-options.php');
//$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/layout-builder.php');

/* Posts Metabox */
//$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/post-type.php');
//$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/post-ratings.php');


// Custom Post type metabox
$tailormade_post_options = new VP_Metabox(get_template_directory() . '/options/admin/metabox/posttype/testimonials.php');

/*
 * EOF
 */
 ob_end_clean();