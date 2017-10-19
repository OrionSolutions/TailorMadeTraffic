<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'page_options',
	'types'       => array('page'),
	'title'       => __('Page Options', 'textdomain_moviepress'),
	'priority'    => 'high',
	'template'    => array(

				array(
					'type' => 'textbox',
					'name' => 'title',
					'label' => __('Title', 'textdomain_moviepress'),
					'default' => '',
				),

				array(
					'type' => 'textbox',
					'name' => 'sub_title',
					'label' => __('Sub Title', 'textdomain_moviepress'),
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