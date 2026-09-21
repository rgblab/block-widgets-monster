// legacy widget panel module

let $ = null;

const panelVisibility = {
	// keep edit form open, this widget has nothing to preview
	init: function () {
		$( '.wp-block-legacy-widget__edit-form-title' ).each(
			function () {
				if (backendLabels.widgetTitle === $( this ).text()) {
					const widget = $( this ).parents( '.block-editor-block-list__block' );

					widget.find( '.wp-block-legacy-widget__edit-form' ).css( {'display': 'block'} );
					widget.find( '.wp-block-legacy-widget__edit-preview' ).css( {'display': 'none'} );
				}
			}
		);
	}
};

const observer = {
	// poll limit, blocks render after dom ready
	lookups   : 0,
	maxLookups: 200,

	init: function () {
		// create mutation observer instance, one for every panel
		const mutationObserver = new MutationObserver(
			function () {
				panelVisibility.init();
			}
		);

		// mutation observer options, only class name
		const options = {
			attributes     : true,
			attributeFilter: ['class'],
			subtree        : false
		};

		const interval = setInterval(
			function () {
				const panels = $( '.block-editor-block-list__block .components-panel__body' );

				observer.lookups ++;

				if ( ! panels.length || ! panels.find( '.wp-block-legacy-widget__edit-preview' ).length) {
					if (observer.lookups >= observer.maxLookups) {
						clearInterval( interval );
					}

					return;
				}

				panels.each(
					function () {
						// skip nodes already observed
						if (this.dataset.bwmPanel) {
							return;
						}

						this.dataset.bwmPanel = 'observed';

						mutationObserver.observe( this, options );
					}
				);

				clearInterval( interval );
				panelVisibility.init();
			},
			300
		);
	}
};

export function init( jQueryRef ) {
	$ = jQueryRef;

	observer.init();
}
