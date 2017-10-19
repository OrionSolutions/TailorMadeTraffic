<?php
ob_start();
ob_get_contents();
return array(
	'id'          => 'post_format',
	'types'       => array('post'),
	'title'       => __('Post Type', 'textdomain_moviepress'),
	'priority'    => 'high',
	'template'    => array(
				
				array(
					'type' => 'radiobutton',
					'name' => 'format_size',
					'label' => __('Post Format Size', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
					'items' => array(
						array(
							'value' => 'big',
							'label' => __('Big', 'textdomain_moviepress'),
						),
						array(
							'value' => 'small',
							'label' => __('Small', 'textdomain_moviepress'),
						),
					),	
				'default' => array( '{{last}}' ),	
				),
	
				/* ======================================================== */
				array(
					'type' => 'select',
					'name' => 'post_format_type',
					'label' => __('Type', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
					'items' => array(
						array(
							'value' => 'embed_code',
							'label' => __('Video', 'textdomain_moviepress'),
						),
						array(
							'value' => 'standard',
							'label' => __('Standard Post', 'textdomain_moviepress'),
						),
					),	
				'default' => array( '{{first}}' ),	
				),
				
				// Layout Group
				array(
					'type'      => 'group',
					'repeating' => true,
					'name'      => 'gallery_group',
					'title'     => __('Gallery', 'textdomain_moviepress'),
					'dependency' => array(
						'field'    => 'post_format_type',
						'function' => 'vp_dep_gallery',
					),		
				'fields'    => array(
				/* Upload */
				array(
					'type' => 'upload',
					'name' => 'gallery_upload',
					'label' => __('Upload Image', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
				),
				/* Upload */	
				)),
				array(
					'type' => 'textbox',
					'name' => 'video_url',
					'label' => __('Video URL', 'textdomain_moviepress'),
					'description' => __('Insert Video URL here if you want to play self hosted videos', 'textdomain_moviepress'),
					'dependency' => array(
						'field'    => 'post_format_type',
						'function' => 'vp_dep_is_embed_code',
					),
				),
				array(
					'type' => 'textarea',
					'name' => 'embed_code',
					'label' => __('Embed Code', 'textdomain_moviepress'),
					'description' => __('Insert Youtube, Vimeo and other video services that support embed codes insert here', 'textdomain_moviepress'),
					'dependency' => array(
						'field'    => 'post_format_type',
						'function' => 'vp_dep_is_embed_code',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'video_lenght',
					'label' => __('Video Lenght', 'textdomain_moviepress'),
					'description' => __('', 'textdomain_moviepress'),
					'dependency' => array(
						'field'    => 'post_format_type',
						'function' => 'vp_dep_is_embed_code',
					),
				),
				/* ======================================================== */
	),
);
ob_end_clean();
/**
 * EOF
 */
?>