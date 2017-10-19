<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'slider_options',
	'types'       => array('testimonials'),
	'title'       => __('Testimonial Options', 'textdomain_tailormade'),
	'priority'    => 'high',
	'template'    => array(
				/* ======================================================== */

				/* Enable Slider */
				array(
					'type' => 'textbox',
					'name' => 'position',
					'label' => __('Testimonial Options', 'textdomain_tailormade'),
					'description' => __('', 'textdomain_tailormade'),
				),
				/* Enable Slider */	
	),
);
ob_end_clean();
/**
 * EOF
 */
?>