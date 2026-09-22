<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'BWM_FILE' ) ) {
	define( 'BWM_FILE', dirname( __FILE__ ) . '/block-widgets-monster.php' );
}

if ( ! defined( 'BWM_VERSION' ) ) {
	$bwm_header = get_file_data( BWM_FILE, array( 'version' => 'Version' ) );

	define( 'BWM_VERSION', $bwm_header['version'] );

	unset( $bwm_header );
}

if ( ! defined( 'BWM_ABS_PATH' ) ) {
	define( 'BWM_ABS_PATH', dirname( __FILE__ ) );
}

if ( ! defined( 'BWM_URL_PATH' ) ) {
	define( 'BWM_URL_PATH', plugin_dir_url( __FILE__ ) );
}
