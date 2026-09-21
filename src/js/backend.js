// backend bundle entry, one import per source file
import * as common from './backend/common.js';

// dom ready wrapper, modules get $ handed in
jQuery(
	function ( $ ) {
		common.init( $ );
	}
);
