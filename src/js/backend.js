// backend bundle entry
// one import per source file, in the order they should run
import * as common from './backend/common.js';

// backend stays on jQuery, wp-admin already loads it
// jQuery( fn ) already defers to dom ready, so the modules don't wrap again
jQuery(
	function ( $ ) {
		common.init( $ );
	}
);
