// legacy widget panel module
// the entry owns the jQuery dom ready wrapper and hands $ in

let $ = null;

const panelVisibility = {
	// block editor collapses a legacy widget to its preview, this plugin's widget
	// has nothing to preview, so keep its edit form open instead
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
	// widget screen renders its blocks after dom ready, so poll until they show up
	// and give up eventually, a screen with no blocks would poll forever otherwise
	lookups   : 0,
	maxLookups: 200,

	init: function () {
		// one observer instance watching every panel, observe() takes many targets,
		// so this stays a single observer no matter how many widgets are on screen
		const mutationObserver = new MutationObserver(
			function () {
				panelVisibility.init();
			}
		);

		// only the class attribute matters, that is what block editor toggles
		// between edit form and preview, and watching childList here would
		// retrigger on the css this sets
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
						// observing the same node twice is harmless, but the flag keeps
						// this idempotent if the poll is ever restarted
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
