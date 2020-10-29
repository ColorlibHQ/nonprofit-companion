<?php
function pages_additional_metaboxs( $meta_boxes ) {

	$nonprofit_prefix = '_nonprofit_';
	$meta_boxes[] = array(
		'id'        => 'pages_additional_metaboxs',
		'title'     => esc_html__( 'Page\'s Additional Options', 'nonprofit-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $nonprofit_prefix . 'page_title',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Page Title', 'nonprofit-companion' ),
				'desc'  => esc_html__( 'This page title will overwride the default page title.', 'nonprofit-companion' ),
				'placeholder' => esc_html__( 'Write down the page title here.', 'nonprofit-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pages_additional_metaboxs' );