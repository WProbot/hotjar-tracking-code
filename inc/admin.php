<?php
/**
 * Admin facing features.
 *
 * @package Hotjar_Tracking_Code
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_init', 'hotjar_tracking_code_add_settings_field' );
/**
 * Register the settings field for the tracking code ID.
 *
 * @return void
 * @since 1.0.0
 */
function hotjar_tracking_code_add_settings_field() {
	add_settings_field(
		'hotjar_tracking_code_id_field',
		esc_html__( 'Hotjar', 'hotjar-tracking-code' ),
		'hotjar_tracking_code_text_settings_field',
		'general',
		'default',
		array(
			'id'          => 'hotjar-tracking-code',
			'name'        => 'hotjar_tracking_code',
			'value'       => get_option( 'hotjar_tracking_code', '' ),
			'description' => esc_html__( 'Enter your Hotjar tracking code ID eg. UA-1234567', 'hotjar-tracking-code' ),
		)
	);

	register_setting(
		'general',
		'hotjar_tracking_code',
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'Hotjar tracking code ID', 'hotjar-tracking-code' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);
}

/**
 * Text field for tracking code ID.
 *
 * @param array $args The field settings.
 * @return void
 * @since 1.0.0
 */
function hotjar_tracking_code_text_settings_field( $args ) {
	$args = wp_parse_args(
		$args,
		array(
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'description' => '',
		)
	);

	printf(
		'<input type="text" id="%1$s" name="%1$s" value="%2$s" aria-describedby="%3$s-description" class="regular-text ltr" />%4$s',
		esc_attr( $args['name'] ),
		esc_attr( $args['value'] ),
		esc_attr( $args['id'] ),
		$args['description'] ? sprintf(
			'<p class="description" id="%1$s-description">%2$s</p>',
			esc_attr( $args['id'] ),
			esc_html( $args['description'] )
		) : ''
	);
}
