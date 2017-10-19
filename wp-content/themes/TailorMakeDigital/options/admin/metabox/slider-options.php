<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'slider_options',
	'types'       => array('page'),
	'title'       => __('Slider Options', 'textdomain_moviepress'),
	'priority'    => 'high',
	'template'    => array(
				/* ======================================================== */

				/* Enable Slider */
				array(
					'type' => 'toggle',
					'name' => 'enable_slider',
					'label' => __('Enable Slider', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
				),
				/* Enable Slider */

				/* ======================================================== */
				array(
					'type' => 'select',
					'name' => 'slider_category',
					'label' => __('Slider Category', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
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
				/* ======================================================== */
				/*
				array(
					'type' => 'textbox',
					'name' => 'number_of_slide',
					'label' => __('Number Of Slides', 'textdomain_moviepress'),
					'default' => '5',
					'validation' => 'numeric',
				),
				*/
				/* ======================================================== */			
	),
);
ob_end_clean();
/**
 * EOF
 */
?>