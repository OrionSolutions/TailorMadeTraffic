<?php

// Set Image Path
$themepath = get_template_directory_uri().'/images/';
$vafpresspath = get_template_directory_uri().'/options/public/img/';

// Start Options
return array(
	'title' => __('tailormade Theme Options', 'textdomain_tailormade'),
	'page' => __('tailormade Menu', 'textdomain_tailormade'),
	'logo' => '',
	'menus' => array(
	
	
	
			/* =============== Menu - General Settings ====================== */
			array(
			'title' => __('General Settings', 'textdomain_tailormade'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-gears',
			'controls' => array(
				
				// Start Logo
					array(
						'type' => 'upload',
						'name' => 'logo',
						'label' => __('Upload Theme Logo', 'textdomain_tailormade'),
						'description' => __('Upload Your Theme Logo', 'textdomain_tailormade'),
						'default' => $themepath.'logo.png',
					),
				// End Logo
				
				// Start Copyright Title
					array(
						'type' => 'textbox',
						'name' => 'copyright_title',
						'label' => __('Copyright Title', 'textdomain_tailormade'),
						'description' => __('Set your copyright title', 'textdomain_tailormade'),
						'default' => 'About us',
					),
				// End Copyright Title

				// Start Footer Copyright
					array(
						'type' => 'textarea',
						'name' => 'copyright',
						'label' => __('Copyright Text', 'textdomain_tailormade'),
						'description' => __('Set your copyright notice', 'textdomain_tailormade'),
						'default' => '',
					),
				// End Footer Copyright

						)),
			/* =============== Menu - General Settings ====================== */
			
			












			/* ===================================================== Menu - General Settings ================================================================ */
			array(
		        'title' => __('Home Settings', 'vp_textdomain'),
		        'name' => 'menu_2',
		        'icon' => 'font-awesome:fa-home',
		        'controls' => array(

		        	// Enable
					array(
						'type' => 'toggle',
						'name' => 'enable_home_header',
						'label' => __('Enable home header', 'textdomain_tailormade'),
						'description' => __('Enable homepage header', 'textdomain_tailormade'),
						'default' => '0',
					),
					// Enable package

					// Title
				    array(
						'type' => 'textbox',
						'name' => 'home_title',
						'label' => __('Heading Title', 'textdomain_tailormade'),
						'description' => __('Enter heading title', 'textdomain_tailormade'),
						'default' => 'Supercharge your website',
					),
					// Title

					// Title
				    array(
						'type' => 'textbox',
						'name' => 'home_sub_title',
						'label' => __('Heading Title', 'textdomain_tailormade'),
						'description' => __('Enter heading title', 'textdomain_tailormade'),
						'default' => 'Supercharge your website',
					),
					// Title

					// Title
				    array(
						'type' => 'textarea',
						'name' => 'home_desc',
						'label' => __('Heading Description', 'textdomain_tailormade'),
						'description' => __('Enter heading description', 'textdomain_tailormade'),
						'default' => '',
					),
					// Title

					// Title
				    array(
						'type' => 'textbox',
						'name' => 'home_button',
						'label' => __('Heading Button', 'textdomain_tailormade'),
						'description' => __('Enter header button link', 'textdomain_tailormade'),
						'default' => '',
					),
					// Title

					array(
						'type' => 'upload',
						'name' => 'home_animation',
						'label' => __('Upload Theme Logo', 'textdomain_tailormade'),
						'description' => __('Upload Your Theme Logo', 'textdomain_tailormade'),
						'default' => $themepath.'cloud-2/rocket.png',
					),

		        ),
		    ),
			/* ===================================================== Menu - General Settings ================================================================ */





			
			/* =============== Menu - Header Settings ====================== */
			array(
			'title' => __('Header Settings', 'textdomain_tailormade'),
			'name' => 'menu_3',
			'icon' => 'font-awesome:fa-columns',
			'controls' => array(
				
				// Phone
					array(
						'type' => 'textbox',
						'name' => 'phone',
						'label' => __('Phone Number', 'textdomain_tailormade'),
						'description' => __('Enter company phone number', 'textdomain_tailormade'),
						'default' => '',
					),
				// Phone

				// Phone
					array(
						'type' => 'textbox',
						'name' => 'email',
						'label' => __('Email Address', 'textdomain_tailormade'),
						'description' => __('Enter company Email Address', 'textdomain_tailormade'),
						'default' => '',
					),
				// Phone

			)),
			/* =============== Menu - Header Settings ====================== */
			
			
			/* =============== Menu - Social Media Settings ====================== */
			array(
			'title' => __('Social Media Settings', 'textdomain_tailormade'),
			'name' => 'menu_4',
			'icon' => 'font-awesome:fa-group',
			'controls' => array(
					
				// Facebook
					array(
						'type' => 'textbox',
						'name' => 'facebook',
						'label' => __('Facebook page', 'textdomain_tailormade'),
						'description' => __('Enter your facebook URL', 'textdomain_tailormade'),
						'default' => '',
						'validation' => 'url',
					),
				// Facebook
				
				// Twitter
					array(
						'type' => 'textbox',
						'name' => 'twitter',
						'label' => __('Twitter Profile', 'textdomain_tailormade'),
						'description' => __('Enter your Twitter Profile URL', 'textdomain_tailormade'),
						'default' => '',
						'validation' => 'url',
					),
				// Twitter
				
				// Google
					array(
						'type' => 'textbox',
						'name' => 'google',
						'label' => __('Google Plus', 'textdomain_tailormade'),
						'description' => __('Enter your google plus URL', 'textdomain_tailormade'),
						'default' => '',
						'validation' => 'url',
					),
				// Google
				
				// Pinterest
					array(
						'type' => 'textbox',
						'name' => 'linkedin',
						'label' => __('Linkedin', 'textdomain_tailormade'),
						'description' => __('Enter your pinterest profile', 'textdomain_tailormade'),
						'default' => '',
						'validation' => 'url',
					),
				// Pinterest
				
					)),
		/* =============== Menu - Social Media Settings ====================== */	





	)
);

/**
 *EOF
 */