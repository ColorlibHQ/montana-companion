<?php
function montana_portfolio_metabox( $meta_boxes ) {

	$montana_prefix = '_montana_';
	$meta_boxes[] = array(
		'id'        => 'pages_visibility_metaboxes',
		'title'     => esc_html__( 'Page Visibility Options', 'montana-companion' ),
		'post_types'=> array( 'page' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $montana_prefix . 'breadcrumb_img',
				'type'  => 'image_advanced',
				'name'  => esc_html__( 'Page Header Image', 'montana-companion' ),
				'placeholder' => esc_html__( 'Page Header Image', 'montana-companion' ),
				'max_file_uploads' => 1,
				'max_status'       => false
			),
			array(
				'id'    => $montana_prefix . 'show_reservation',
				'type'  => 'switch',
				'name'  => esc_html__( 'Show the Reservation Section', 'montana-companion' ),
				'placeholder' => esc_html__( 'Show the Reservation Section', 'montana-companion' ),
				'on_label' => esc_html__( 'Yes', 'montana-companion' ),
				'off_label' => esc_html__( 'No', 'montana-companion' ),
			),
			array(
				'id'    => $montana_prefix . 'show_instagram',
				'type'  => 'switch',
				'name'  => esc_html__( 'Show the Instagram Section', 'montana-companion' ),
				'placeholder' => esc_html__( 'Show the Instagram Section', 'montana-companion' ),
				'on_label' => esc_html__( 'Yes', 'montana-companion' ),
				'off_label' => esc_html__( 'No', 'montana-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'montana_portfolio_metabox' );