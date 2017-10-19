<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'post_options',
	'types'       => array('post'),
	'title'       => __('Post Options', 'textdomain_moviepress'),
	'priority'    => 'high',
	'template'    => array(

				/* ======================================================== */
				array(
					'type' => 'textbox',
					'name' => 'custom_title',
					'label' => __('Custom Title', 'textdomain_moviepress'),
					'default' => '',
				),
				/* ======================================================== */	
				
	),
);
ob_end_clean();
/**
 * EOF
 */
?>