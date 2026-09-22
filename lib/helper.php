<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'bwm_var_dump' ) ) {
	/**
	 * formatted var dump function
	 *
	 * @param mixed $data
	 *
	 * @since 1.0.0
	 */
	function bwm_var_dump( $data ): void {
		echo '<pre>';
		var_dump( $data ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_var_dump -- intentional debug helper.
		echo '</pre>';
	}
}
