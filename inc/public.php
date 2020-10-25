<?php
/**
 * Public facing features.
 *
 * @package Hotjar_Tracking_Code
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_head', 'hotjar_tracking_code_do_the_script', 1 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function hotjar_tracking_code_do_the_script() {
	/**
	 * Filter the tracking_code_id variable to support other methods of setting this value.
	 *
	 * @param string $tracking_code_id The Hotjar tracking code ID.
	 * @return string
	 * @since 1.0.0
	 */
	$tracking_code_id = apply_filters( 'hotjar_tracking_code_id', get_option( 'hotjar_tracking_code', '' ) );

	if ( ! empty( $tracking_code_id ) ) {
		printf(
            // phpcs:disable
			'
            <!-- Hotjar Tracking Code -->
				<script>
					(function(h,o,t,j,a,r){
						h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
						h._hjSettings={hjid:%1$s,hjsv:6};
						a=o.getElementsByTagName("head")[0];
						r=o.createElement("script");r.async=1;
						r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
						a.appendChild(r);
					})(window,document,"https://static.hotjar.com/c/hotjar-",".js?sv=");
				</script>
            ',
            // phpcs:enable
			esc_attr( $tracking_code_id )
		);
	}
}
