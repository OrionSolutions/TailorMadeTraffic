<?php

/* Context = 'normal', 'advanced', or 'side' */

return array(
	'id'          => 'layout_builder',
	'types'       => array('page'),
	'title'       => __('Full Width Layout Builder', 'textdomain_moviepress'),
	'priority'    => 'high',
	'context'	  => 'normal',
	'template'    => array(
	
	// Toggle Layout
	array(
			'type' => 'toggle',
			'name' => 'enable_builder',
			'label' => __('Enable Builder', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
	),
	
	array(
			'type' => 'toggle',
			'name' => 'enable_sidebar',
			'label' => __('Enable Sidebar', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
			'default' => '1',
			'dependency' => array(
				'field'    => 'enable_builder',
				'function' => 'vp_dep_boolean',
			),
	),

	array(
			'type' => 'toggle',
			'name' => 'double_sidebar',
			'label' => __('Double Sidebar', 'textdomain_moviepress'),
			'description' => __('Choose to enable both sidebars', 'textdomain_moviepress'),
			'default' => '0',
			'dependency' => array(
				'field'    => 'enable_builder',
				'function' => 'vp_dep_boolean',
			),
	),

	array(
			'type' => 'toggle',
			'name' => 'back_to_back',
			'label' => __('Back to Back Sidebar', 'textdomain_moviepress'),
			'description' => __('Sidebars are placed together', 'textdomain_moviepress'),
			'default' => '1',
			'dependency' => array(
				'field'    => 'double_sidebar',
				'function' => 'vp_dep_boolean',
			),
	),
	
	// Layout Group
	array(
		'type'      => 'group',
		'repeating' => true,
		'name'      => 'layout_group',
		'title'     => __('Layout', 'textdomain_moviepress'),
		'dependency' => array(
				'field'    => 'enable_builder',
				'function' => 'vp_dep_boolean',
			),
		'fields'    => array(
		
			/* ============================================================================= */
			// Layout Title
			/* ============================================================================= */
			array(
			'type' => 'textbox',
			'name' => 'layout_title',
			'label' => __('Layout Title', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
			),
			
			
			/* ============================================================================= */
			// Layout Type
			/* ============================================================================= */
			array(
				'type' => 'select',
				'name' => 'layout_type',
				'label' => __('Layout Type', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
				'items' => array(
						array(
							'value' => 'layout1',
							'label' => __('Big List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout2',
							'label' => __('List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout3',
							'label' => __('Two Columns', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout4',
							'label' => __('Three Columns', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout5',
							'label' => __('Three Columns No Thumb', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout6',
							'label' => __('Half List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout7',
							'label' => __('Thumb List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout8',
							'label' => __('Video Play List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout9',
							'label' => __('Single Block', 'textdomain_moviepress'),
						),
					),
					
				'default' => array('layout1'),
			),
			
			
			
			/* ============================================================================= */
			// Layout Category
			/* ============================================================================= */
			array(
			'type' => 'select',
			'name' => 'layout_category',
			'label' => __('Category', 'textdomain_moviepress'),
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
			
			/* ============================================================================= */
			// Item Count
			/* ============================================================================= */
			array(
				'type' => 'textbox',
				'name' => 'item_count',
				'label' => __('How many Posts', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
				'default' => '6',
			),

			/* ============================================================================= */
			// Ad Code
			/* ============================================================================= */
			array(
				'type' => 'textarea',
				'name' => 'ad_code',
				'label' => __('Ad Code', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
			),
			

		),
	),
	


		
	),
);

/**
 * EOF
 */