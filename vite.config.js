// build config
// everything the plugin loads at runtime is built from src into assets
// src/js/backend.js -> assets/js/backend.min.js, src/images -> assets/images
// those paths are what the php enqueues and links, so they are fixed
// outDir is assets and the subfolders come from the output filename patterns,
// so a later css bundle lands in assets/css off the same build

import { existsSync, readdirSync, readFileSync } from 'node:fs';
import { join } from 'node:path';

import { defineConfig } from 'vite';

// sources set strict mode inside each jquery callback, but esbuild removes those
// directives while minifying since module code is strict anyway
// bundles are enqueued as classic scripts where that is not true, so put one back
// output.banner can't be used, it is applied before minifying, this runs after
// and moves sourcemap down by the one line it adds
function useStrict() {
	const directive = "'use strict';\n";

	return {
		name: 'bwm-use-strict',
		generateBundle( options, bundle ) {
			for ( const file of Object.values( bundle ) ) {
				if ( 'chunk' !== file.type ) {
					continue;
				}

				file.code = directive + file.code;

				// sourcemap is already separate asset by now, so patch that, not file.map
				// everything moves down one line, which is one leading ';' in mappings
				const map = bundle[ file.fileName + '.map' ];

				if ( map ) {
					const parsed = JSON.parse( map.source );

					parsed.mappings = ';' + parsed.mappings;
					map.source = JSON.stringify( parsed );
				}
			}
		},
	};
}

// images are sources like everything else under src, so the build copies them
// into the output instead of them being hand maintained in assets
// they go through emitFile rather than a plain fs copy, so they are written after
// emptyOutDir has wiped the folder, not before it
function copyImages() {
	const from = 'src/images';
	const to = 'images';

	return {
		name: 'bwm-copy-images',
		generateBundle() {
			if ( ! existsSync( from ) ) {
				return;
			}

			for ( const name of readdirSync( from ) ) {
				this.emitFile( {
					type: 'asset',
					fileName: to + '/' + name,
					source: readFileSync( join( from, name ) ),
				} );
			}
		},
	};
}

export default defineConfig( {
	plugins: [ useStrict(), copyImages() ],
	build: {
		outDir: 'assets',
		// everything in assets is emitted by this build, images included, so it is
		// safe to wipe the folder and clear stale files
		emptyOutDir: true,
		sourcemap: true,
		target: 'es2018',
		// keep vite module preload polyfill out of bundles, these are classic scripts
		modulePreload: false,
		rollupOptions: {
			input: {
				backend: 'src/js/backend.js',
			},
			output: {
				// es rather than iife, to stay in step with better-post-formats where a
				// second entry rules iife out
				// the entry exports nothing and every import it makes is bundled, so es
				// emits plain concatenated code, valid as a classic script
				format: 'es',
				entryFileNames: 'js/[name].min.js',
				// css would be the only asset this entry emits, so it can go straight
				// to the css folder without matching on extension
				assetFileNames: 'css/[name].min[extname]',
			},
		},
	},
} );
