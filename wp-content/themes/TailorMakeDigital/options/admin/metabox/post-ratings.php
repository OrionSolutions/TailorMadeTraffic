<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'rating_builder',
	'types'       => array('post'),
	'title'       => __('Ratings Builder', 'textdomain_moviepress'),
	'priority'    => 'high',
	'context'	  => 'normal',
	'template'    => array(
	// Toggle Layout
	array(
			'type' => 'toggle',
			'name' => 'enable_builder',
			'label' => __('Enable Ratings?', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
		),
	// Layout Group
	array(
		'type'      => 'group',
		'repeating' => true,
		'name'      => 'rating_group',
		'title'     => __('Specification', 'textdomain_moviepress'),
		'dependency' => array(
				'field'    => 'enable_builder',
				'function' => 'vp_dep_boolean',
		),
		'fields'    => array(
			// Rating Label
			array(
			'type' => 'textbox',
			'name' => 'rating_label',
			'label' => __('Label', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
			),
			// Rating Label
			// Rating Score
			array(
				'type' => 'slider',
				'name' => 'rating_score',
				'label' => __('Score', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
				'min' => '10',
				'max' => '100',
				'step' => '5',
				'default' => '50',
			),
			// Rating Score
		),
	),
	
	// Rating Remark
	array(
	'type' => 'select',
	'name' => 'rating_remark',
	'label' => __('Rating Remark', 'textdomain_moviepress'),
	'description' => __('', 'textdomain_moviepress'),
	'dependency' => array(
					'field'    => 'enable_builder',
					'function' => 'vp_dep_boolean',
				),
	'items' => array(
		array(
			'value' => 'Very Poor',
			'label' => __('Very Poor', 'textdomain_moviepress'),
		),
			
		array(
			'value' => 'Poor',
			'label' => __('Poor', 'textdomain_moviepress'),
		),
			
		array(
			'value' => 'Fair',
			'label' => __('Fair', 'textdomain_moviepress'),
		),
			
		array(
			'value' => 'Good',
			'label' => __('Good', 'textdomain_moviepress'),
		),
			
		array(
			'value' => 'Very Good',
			'label' => __('Very Good', 'textdomain_moviepress'),
		),
			
		array(
			'value' => 'Excellent',
			'label' => __('Excellent', 'textdomain_moviepress'),
			),
		),
		
	'default' => array('{{last}}'),
		
	),
	
	// Overall Score
			array(
				'type' => 'slider',
				'name' => 'overall_score',
				'label' => __('Overall Score', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
				'min' => '10',
				'max' => '100',
				'step' => '5',
				'default' => '50',
				'dependency' => array(
					'field'    => 'enable_builder',
					'function' => 'vp_dep_boolean',
				),
			),
	// Overall Score
	),
);
ob_end_clean();
/**
 * EOF
 */
?>