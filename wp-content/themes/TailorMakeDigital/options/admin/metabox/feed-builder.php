<?php

/* Context = 'normal', 'advanced', or 'side' */

return array(
	'id'          => 'feed_builder',
	'types'       => array('page'),
	'title'       => __('Feed Builder', 'textdomain_moviepress'),
	'priority'    => 'high',
	'context'	  => 'normal',
	'template'    => array(
	
	// Toggle feed
	array(
			'type' => 'toggle',
			'name' => 'enable_builder',
			'label' => __('Enable Feed', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
		),
	
	// feed Group
	array(
		'type'      => 'group',
		'repeating' => true,
		'name'      => 'feed_group',
		'title'     => __('feed', 'textdomain_moviepress'),
		'dependency' => array(
				'field'    => 'enable_builder',
				'function' => 'vp_dep_boolean',
			),
		'fields'    => array(
		
			/* ============================================================================= */
			// feed Title
			/* ============================================================================= */
			array(
			'type' => 'textbox',
			'name' => 'feed_title',
			'label' => __('feed Title', 'textdomain_moviepress'),
			'description' => __('', 'textdomain_moviepress'),
			),
			
			
			/* ============================================================================= */
			// feed Type
			/* ============================================================================= */
			array(
				'type' => 'select',
				'name' => 'feed_type',
				'label' => __('feed Type', 'textdomain_moviepress'),
				'description' => __('', 'textdomain_moviepress'),
				'items' => array(
						array(
							'value' => 'layout_sidebar_1',
							'label' => __('Latest Post Masonry Grid', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout_sidebar_2',
							'label' => __('Half List', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout_sidebar_3',
							'label' => __('List With Details', 'textdomain_moviepress'),
						),
						array(
							'value' => 'layout_sidebar_4',
							'label' => __('Categorized: Three Columns', 'textdomain_moviepress'),
						),
					),
					
				'default' => array('layout_sidebar_1'),
			),
			
			
			
			/* ============================================================================= */
			// feed Category
			/* ============================================================================= */
			array(
			'type' => 'select',
			'name' => 'feed_category',
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
			
			

		),
	),
	


		
	),
);

/**
 * EOF
 */