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
				
				// Enable Related Posts
					array(
						'type' => 'toggle',
						'name' => 'enable_related',
						'label' => __('Related Posts', 'textdomain_tailormade'),
						'description' => __('Enable related posts in single Page', 'textdomain_tailormade'),
						'default' => '0',
					),
				// Enable Related Posts
				
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
		        'menus' => array(

		        	// Enable
					array(
						'type' => 'toggle',
						'name' => 'enable_package',
						'label' => __('Enable home header', 'textdomain_tailormade'),
						'description' => __('Enable homepage header', 'textdomain_tailormade'),
						'default' => '0',
					),
					// Enable package

					// Title
				    array(
						'type' => 'textbox',
						'name' => 'pricing_title',
						'label' => __('Heading Title', 'textdomain_tailormade'),
						'description' => __('Enter heading title', 'textdomain_tailormade'),
						'default' => 'Supercharge your website',
					),
					// Title

					// Title
				    array(
						'type' => 'textbox',
						'name' => 'pricing_title',
						'label' => __('Heading Description', 'textdomain_tailormade'),
						'description' => __('Enter heading description', 'textdomain_tailormade'),
						'default' => '',
					),
					// Title

		        	/* Menu Item */
		            array(
		                'title' => __('Features Section', 'vp_textdomain'),
		                'name' => 'submenu_1',
		                'icon' => 'font-awesome:fa-bolt',
		                'controls' => array(
		                    //... collection of Sections and or Control Fields ...
		                ),
		            ),
		            /* Menu Item */

		            /* Menu Item */
		            array(
		                'title' => __('About Section', 'vp_textdomain'),
		                'name' => 'submenu_2',
		                'icon' => 'font-awesome:fa-info-circle',
		                'controls' => array(
		                    //... collection of Sections and or Control Fields ...
		                ),
		            ),
		            /* Menu Item */

		            /* Menu Item */
		            array(
		                'title' => __('Pricing Section', 'vp_textdomain'),
		                'name' => 'submenu_3',
		                'icon' => 'font-awesome:fa-dollar',
		                'controls' => array(
		                    
		                	// Enable package
							array(
								'type' => 'toggle',
								'name' => 'enable_package',
								'label' => __('Enable Package Section', 'textdomain_tailormade'),
								'description' => __('Enable package section in homepage', 'textdomain_tailormade'),
								'default' => '0',
							),
							// Enable package

							// Pricing Title
				            array(
								'type' => 'textbox',
								'name' => 'pricing_title',
								'label' => __('Heading Title', 'textdomain_tailormade'),
								'description' => __('Enter Package Title', 'textdomain_tailormade'),
								'default' => 'Our Packages',
							),
							// Pricing Title

							// Pricing Description
				            array(
								'type' => 'textarea',
								'name' => 'pricing_desc',
								'label' => __('Description', 'textdomain_tailormade'),
								'description' => __('Enter Pricing Description', 'textdomain_tailormade'),
								'default' => '',
							),
							// Pricing Description

		                    /* ==================== Left ========================= */
		                    array(
			                    'type' => 'section',
								'title' => __('Pricing Package Left', 'vp_textdomain'),
								'name' => 'package_left',
								'fields' => array(

				                	// Controls
				                	array(
										'type' => 'textarea',
										'name' => 'left_pricing_desc',
										'label' => __('Description', 'textdomain_tailormade'),
										'description' => __('Pricing Description', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_name',
										'label' => __('Name', 'textdomain_tailormade'),
										'description' => __('Set Pricing Name', 'textdomain_tailormade'),
										'default' => 'Standard',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_amount',
										'label' => __('Amount', 'textdomain_tailormade'),
										'description' => __('Set Pricing Amount', 'textdomain_tailormade'),
										'default' => '10',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_feature_1',
										'label' => __('Pricing Feature', 'textdomain_tailormade'),
										'description' => __('Set Pricing feature', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_feature_2',
										'label' => __('Pricing Feature', 'textdomain_tailormade'),
										'description' => __('Set Pricing feature', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_feature_3',
										'label' => __('Pricing Feature', 'textdomain_tailormade'),
										'description' => __('Set Pricing feature', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_feature_4',
										'label' => __('Pricing Feature', 'textdomain_tailormade'),
										'description' => __('Set Pricing feature', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls

									// Controls
				                	array(
										'type' => 'textbox',
										'name' => 'left_pricing_button',
										'label' => __('Button Link', 'textdomain_tailormade'),
										'description' => __('Set call to action link', 'textdomain_tailormade'),
										'default' => '',
									),
									// Controls
								)),
							/* ==================== Left ========================= */



							/* ==================== Center ========================= */
							array(
			                    'type' => 'section',
								'title' => __('Pricing Package Center', 'vp_textdomain'),
								'name' => 'package_center',
								'fields' => array(

			                	// Controls
			                	array(
									'type' => 'textarea',
									'name' => 'center_pricing_desc',
									'label' => __('Description', 'textdomain_tailormade'),
									'description' => __('Pricing Description', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_name',
									'label' => __('Name', 'textdomain_tailormade'),
									'description' => __('Set Pricing Name', 'textdomain_tailormade'),
									'default' => 'Standard',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_amount',
									'label' => __('Amount', 'textdomain_tailormade'),
									'description' => __('Set Pricing Amount', 'textdomain_tailormade'),
									'default' => '30',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_feature_1',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_feature_2',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_feature_3',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_feature_4',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'center_pricing_button',
									'label' => __('Button Link', 'textdomain_tailormade'),
									'description' => __('Set call to action link', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls
							)),
							/* ==================== Center ======================= */


							/* ==================== Right ========================= */
							array(
			                    'type' => 'section',
								'title' => __('Pricing Package Right', 'vp_textdomain'),
								'name' => 'package_right',
								'fields' => array(

			                	// Controls
			                	array(
									'type' => 'textarea',
									'name' => 'right_pricing_desc',
									'label' => __('Description', 'textdomain_tailormade'),
									'description' => __('Pricing Description', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_name',
									'label' => __('Name', 'textdomain_tailormade'),
									'description' => __('Set Pricing Name', 'textdomain_tailormade'),
									'default' => 'Standard',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_amount',
									'label' => __('Amount', 'textdomain_tailormade'),
									'description' => __('Set Pricing Amount', 'textdomain_tailormade'),
									'default' => '20',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_feature_1',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_feature_2',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_feature_3',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_feature_4',
									'label' => __('Pricing Feature', 'textdomain_tailormade'),
									'description' => __('Set Pricing feature', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls

								// Controls
			                	array(
									'type' => 'textbox',
									'name' => 'right_pricing_button',
									'label' => __('Button Link', 'textdomain_tailormade'),
									'description' => __('Set call to action link', 'textdomain_tailormade'),
									'default' => '',
								),
								// Controls
							)),
							/* ====================== Right ======================= */


		                ),
		            ),
		            /* Menu Item */

		            /* Menu Item */
		            array(
		                'title' => __('Services Section', 'vp_textdomain'),
		                'name' => 'submenu_4',
		                'icon' => 'font-awesome:fa-archive',
		                'controls' => array(
		                	// Controls
		                ),
		            ),
		            /* Menu Item */

		            /* Menu Item */
		            array(
		                'title' => __('Testimonial Section', 'vp_textdomain'),
		                'name' => 'submenu_5',
		                'icon' => 'font-awesome:fa-comment',
		                'controls' => array(
		                	
		                	// Enable package
							array(
								'type' => 'toggle',
								'name' => 'enable_testimonials',
								'label' => __('Enable Testimonial Section', 'textdomain_tailormade'),
								'description' => __('Enable package section in homepage', 'textdomain_tailormade'),
								'default' => '0',
							),
							// Enable package

		                ),
		            ),
		            /* Menu Item */

		        ),
		    ),
			/* ===================================================== Menu - General Settings ================================================================ */





			
			/* =============== Menu - Header Settings ====================== */
			array(
			'title' => __('Header Settings', 'textdomain_tailormade'),
			'name' => 'menu_3',
			'icon' => 'font-awesome:fa-columns',
			'controls' => array(
				
				// Enable Header Carousel
					array(
						'type' => 'toggle',
						'name' => 'header_carousel',
						'label' => __('Header Carousel Slider', 'textdomain_tailormade'),
						'description' => __('Do you want to enable carousel slider in header?', 'textdomain_tailormade'),
						'default' => '0',
					),
				// Enable Header Carousel

				// Start Footer Copyright
					array(
						'type' => 'textarea',
						'name' => 'ads_area',
						'label' => __('Enter Ad Code', 'textdomain_tailormade'),
						'description' => __('Set your advertising banner code and enter it here to display on the header', 'textdomain_tailormade'),
						'default' => '<img src="'.$themepath.'banner.png">',
					),
				// End Footer Copyright
				
				// Carousel Category
				array(
					'type' => 'select',
					'name' => 'carousel_category',
					'label' => __('Carousel Category', 'textdomain_tailormade'),
					'description' => __('', 'textdomain_tailormade'),
					'default' => 'narrow',
					'items' => array(
							'data' => array(
								array(
								'source' => 'function',
								'value' => 'vp_get_categories',
							),
						),
					),
					
				'default' => array(
					'{{last}}',
				),
					
				),
				// Carousel Category
				
				// Carousel Items
					array(
						'type' => 'textbox',
						'name' => 'carousel_count',
						'label' => __('Number carousel items', 'textdomain_tailormade'),
						'description' => __('Enter the number of carousel slides', 'textdomain_tailormade'),
						'default' => '5',
						'validation' => 'numeric',
					),
				// Carousel Items
				
				// Start Favicon Icon
					array(
						'type' => 'upload',
						'name' => 'favicon',
						'label' => __('Favicon Icon', 'textdomain_tailormade'),
						'description' => __('Upload Favicon icon for your website', 'textdomain_tailormade'),
						'default' => '',
					),
				// End Favicon Icon

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
						'name' => 'pinterest',
						'label' => __('Pinterest', 'textdomain_tailormade'),
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