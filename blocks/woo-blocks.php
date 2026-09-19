<?php

$woo_blocks_source = array();

// all reviews
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/all-reviews',
	'attrs'        => array(
		'imageType'         => 'product',
		'orderby'           => 'most-recent',
		'reviewsOnLoadMore' => $rows,
		'reviewsOnPageLoad' => $rows,
		'showReviewDate'    => true,  // manually add into innerHTML as class name
		'showReviewerName'  => true,  // manually add into innerHTML as class name
		'showReviewImage'   => true,  // manually add into innerHTML as class name
		'showReviewRating'  => true,  // manually add into innerHTML as class name
		'showReviewContent' => true,  // manually add into innerHTML as class name
		'showProductName'   => true,  // manually add into innerHTML as class name
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-all-reviews wc-block-all-reviews has-image has-name has-date has-rating has-content has-product-name"></div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-all-reviews wc-block-all-reviews has-image has-name has-date has-rating has-content has-product-name"></div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block All Reviews', 'bwm' ),
);

// featured category
if ( ! empty( $this->woo_product_category_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/featured-category',
		'attrs'        => array(
			'categoryId' => $this->woo_product_category_id,
		),
		'innerBlocks'  => array(
			array(
				'blockName'    => 'core/button',
				'attrs'        => array(
					'align' => 'center',
				),
				'innerHTML'    =>
					'<div class="wp-block-button aligncenter">
						<a class="wp-block-button__link" href="' . esc_url( get_term_link( $this->woo_product_category_id ) ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a>
					</div>',
				'innerContent' => array(
					'<div class="wp-block-button aligncenter">
						<a class="wp-block-button__link" href="' . esc_url( get_term_link( $this->woo_product_category_id ) ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a>
					</div>',
				),
			),
		),
		'innerHTML'    => '',
		'innerContent' => array(
			null,
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Featured Category', 'bwm' ),
	);
}

// featured product
if ( ! empty( $this->woo_product_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/featured-product',
		'attrs'        => array(
			'dimRatio'  => 50,
			'productId' => $this->woo_product_id,
			'showDesc'  => true,
			'showPrice' => true,
		),
		'innerBlocks'  => array(
			array(
				'blockName'    => 'core/button',
				'attrs'        => array(
					'align' => 'center',
				),
				'innerHTML'    =>
					'<div class="wp-block-button aligncenter">
						<a class="wp-block-button__link" href="' . esc_url( get_permalink( $this->woo_product_id ) ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a>
					</div>',
				'innerContent' => array(
					'<div class="wp-block-button aligncenter">
						<a class="wp-block-button__link" href="' . esc_url( get_permalink( $this->woo_product_id ) ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a>
					</div>',
				),
			),
		),
		'innerHTML'    => '',
		'innerContent' => array(
			null,
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Featured Product', 'bwm' ),
	);
}

// hand-picked products
if ( ! empty( $this->woo_product_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/handpicked-products',
		'attrs'        => array(
			'columns'           => 1,
			'contentVisibility' => array(
				'title'  => true,
				'price'  => true,
				'rating' => true,
				'button' => true,
			),
			'products'          => array( $this->woo_product_id ),
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Hand-picked Product', 'bwm' ),
	);
}

// best selling products
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-best-sellers',
	'attrs'        => array(
		'columns'           => $cols,
		'rows'              => $rows,
		'contentVisibility' => array(
			'title'  => true,
			'price'  => true,
			'rating' => true,
			'button' => true,
		),
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Best Selling Products', 'bwm' ),
);

// product categories list
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-categories',
	'attrs'        => array(
		'hasCount'       => true,
		'hasImage'       => true,
		'hasEmpty'       => true,
		'isDropdown'     => false,
		'isHierarchical' => true,
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Categories List W/ Images', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-categories',
	'attrs'        => array(
		'hasCount'       => true,
		'hasImage'       => false,
		'hasEmpty'       => true,
		'isDropdown'     => false,
		'isHierarchical' => true,
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Categories List W/O Images', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-categories',
	'attrs'        => array(
		'hasCount'       => true,
		'hasImage'       => false,
		'hasEmpty'       => true,
		'isDropdown'     => true,
		'isHierarchical' => true,
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Categories Dropdown', 'bwm' ),
);

// products by category
if ( ! empty( $this->woo_product_category_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/product-category',
		'attrs'        => array(
			'columns'           => $cols,
			'rows'              => $rows,
			'categories'        => array( $this->woo_product_category_id ),
			'contentVisibility' => array(
				'title'  => true,
				'price'  => true,
				'rating' => true,
				'button' => true,
			),
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Products By Category', 'bwm' ),
	);
}

// newest products
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-new',
	'attrs'        => array(
		'columns'           => $cols,
		'rows'              => $rows,
		'contentVisibility' => array(
			'title'  => true,
			'price'  => true,
			'rating' => true,
			'button' => true,
		),
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block New Products', 'bwm' ),
);

// on sale products
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-on-sale',
	'attrs'        => array(
		'columns'           => $cols,
		'rows'              => $rows,
		'contentVisibility' => array(
			'title'  => true,
			'price'  => true,
			'rating' => true,
			'button' => true,
		),
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Products On Sale', 'bwm' ),
);

// products by attribute
if ( ! empty( $this->woo_term_id ) && ! empty( $this->woo_taxonomy ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/products-by-attribute',
		'attrs'        => array(
			'attributes'        => array(
				array(
					'id'        => $this->woo_term_id,
					'attr_slug' => $this->woo_taxonomy,
				),
			),
			'columns'           => $cols,
			'rows'              => $rows,
			'contentVisibility' => array(
				'title'  => true,
				'price'  => true,
				'rating' => true,
				'button' => true,
			),
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Products By Attribute', 'bwm' ),
	);
}

// top rated products
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-top-rated',
	'attrs'        => array(
		'categories'        => array(),
		'columns'           => $cols,
		'rows'              => $rows,
		'contentVisibility' => array(
			'title'  => true,
			'price'  => true,
			'rating' => true,
			'button' => true,
		),
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Top Rated Products', 'bwm' ),
);

// reviews by product
if ( ! empty( $this->woo_product_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/reviews-by-product',
		'attrs'        => array(
			'productId'         => $this->woo_product_id, // manually add into innerHTML as data attr
			'imageType'         => 'reviewer',            // manually add into innerHTML as data attr
			'orderby'           => 'most-recent',         // manually add into innerHTML as data attr
			'reviewsOnLoadMore' => $rows,                 // manually add into innerHTML as data attr
			'reviewsOnPageLoad' => $rows,                 // manually add into innerHTML as data attr
			'showReviewDate'    => true,                  // manually add into innerHTML as class name
			'showReviewerName'  => true,                  // manually add into innerHTML as class name
			'showReviewImage'   => true,                  // manually add into innerHTML as class name
			'showReviewRating'  => true,                  // manually add into innerHTML as class name
			'showReviewContent' => true,                  // manually add into innerHTML as class name
		),
		'innerHTML'    =>
			'<div class="wp-block-woocommerce-reviews-by-product wc-block-reviews-by-product has-image has-name has-date has-rating has-content" data-product-id="' . esc_attr( $this->woo_product_id ) . '" data-image-type="reviewer" data-orderby="most-recent" data-reviews-on-page-load="' . esc_attr( $rows ) . '" data-reviews-on-load-more="' . esc_attr( $rows ) . '" data-show-load-more="true" data-show-orderby="true"></div>',
		'innerContent' => array(
			'<div class="wp-block-woocommerce-reviews-by-product wc-block-reviews-by-product has-image has-name has-date has-rating has-content" data-product-id="' . esc_attr( $this->woo_product_id ) . '" data-image-type="reviewer" data-orderby="most-recent" data-reviews-on-page-load="' . esc_attr( $rows ) . '" data-reviews-on-load-more="' . esc_attr( $rows ) . '" data-show-load-more="true" data-show-orderby="true"></div>',
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Reviews By Product', 'bwm' ),
	);
}

// reviews by category
if ( ! empty( $this->woo_product_category_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/reviews-by-category',
		'attrs'        => array(
			'categoryIds'       => array( $this->woo_product_category_id ), // manually add into innerHTML as data attr
			'imageType'         => 'product',                               // manually add into innerHTML as data attr
			'orderby'           => 'most-recent',                           // manually add into innerHTML as data attr
			'reviewsOnLoadMore' => $rows,                                   // manually add into innerHTML as data attr
			'reviewsOnPageLoad' => $rows,                                   // manually add into innerHTML as data attr
			'showReviewDate'    => true,                                    // manually add into innerHTML as class name
			'showReviewerName'  => true,                                    // manually add into innerHTML as class name
			'showReviewImage'   => true,                                    // manually add into innerHTML as class name
			'showReviewRating'  => true,                                    // manually add into innerHTML as class name
			'showReviewContent' => true,                                    // manually add into innerHTML as class name
			'showProductName'   => true,                                    // manually add into innerHTML as class name
		),
		'innerHTML'    =>
			'<div class="wp-block-woocommerce-reviews-by-category wc-block-reviews-by-category has-image has-name has-date has-rating has-content has-product-name" data-category-ids="' . esc_attr( $this->woo_product_category_id ) . '" data-image-type="product" data-orderby="most-recent" data-reviews-on-page-load="' . esc_attr( $rows ) . '" data-reviews-on-load-more="' . esc_attr( $rows ) . '" data-show-load-more="true" data-show-orderby="true"></div>',
		'innerContent' => array(
			'<div class="wp-block-woocommerce-reviews-by-category wc-block-reviews-by-category has-image has-name has-date has-rating has-content has-product-name" data-category-ids="' . esc_attr( $this->woo_product_category_id ) . '" data-image-type="product" data-orderby="most-recent" data-reviews-on-page-load="' . esc_attr( $rows ) . '" data-reviews-on-load-more="' . esc_attr( $rows ) . '" data-show-load-more="true" data-show-orderby="true"></div>',
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Reviews By Category', 'bwm' ),
	);
}

// product search
$woo_blocks_source[] = array(
	'blockName'    => 'core/search',
	'attrs'        => array(
		'label'          => esc_html__( 'Search', 'bwm' ),
		'buttonText'     => esc_html__( 'Search', 'bwm' ),
		'showLabel'      => true,
		'placeholder'    => esc_html__( 'Placeholder', 'bwm' ),
		'buttonPosition' => 'button-outside',
		'buttonUseIcon'  => false,
		'query'          => array(
			'post_type' => 'product',
		),
	),
	'className'    => 'widget_search',
	'blockHeading' => esc_html__( 'Block Product Search Text Button Outside', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'core/search',
	'attrs'        => array(
		'label'          => esc_html__( 'Search', 'bwm' ),
		'buttonText'     => esc_html__( 'Search', 'bwm' ),
		'showLabel'      => true,
		'placeholder'    => esc_html__( 'Placeholder', 'bwm' ),
		'buttonPosition' => 'button-inside',
		'buttonUseIcon'  => false,
		'query'          => array(
			'post_type' => 'product',
		),
	),
	'className'    => 'widget_search',
	'blockHeading' => esc_html__( 'Block Product Search Text Button Inside', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'core/search',
	'attrs'        => array(
		'label'          => esc_html__( 'Search', 'bwm' ),
		'buttonText'     => esc_html__( 'Search', 'bwm' ),
		'showLabel'      => true,
		'placeholder'    => esc_html__( 'Placeholder', 'bwm' ),
		'buttonPosition' => 'no-button',
		'buttonUseIcon'  => false,
		'query'          => array(
			'post_type' => 'product',
		),
	),
	'className'    => 'widget_search',
	'blockHeading' => esc_html__( 'Block Product Search No Button', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'core/search',
	'attrs'        => array(
		'label'          => esc_html__( 'Search', 'bwm' ),
		'buttonText'     => esc_html__( 'Search', 'bwm' ),
		'showLabel'      => true,
		'placeholder'    => esc_html__( 'Placeholder', 'bwm' ),
		'buttonPosition' => 'button-outside',
		'buttonUseIcon'  => true,
		'query'          => array(
			'post_type' => 'product',
		),
	),
	'className'    => 'widget_search',
	'blockHeading' => esc_html__( 'Block Product Search Icon Button Outside', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'core/search',
	'attrs'        => array(
		'label'          => esc_html__( 'Search', 'bwm' ),
		'buttonText'     => esc_html__( 'Search', 'bwm' ),
		'showLabel'      => true,
		'placeholder'    => esc_html__( 'Placeholder', 'bwm' ),
		'buttonPosition' => 'button-inside',
		'buttonUseIcon'  => true,
		'query'          => array(
			'post_type' => 'product',
		),
	),
	'className'    => 'widget_search',
	'blockHeading' => esc_html__( 'Block Search Icon Button Inside', 'bwm' ),
);

// products by tag
if ( ! empty( $this->woo_product_tag_id ) ) {
	$woo_blocks_source[] = array(
		'blockName'    => 'woocommerce/product-tag',
		'attrs'        => array(
			'columns'           => $cols,
			'rows'              => $rows,
			'contentVisibility' => array(
				'title'  => true,
				'price'  => true,
				'rating' => true,
				'button' => true,
			),
			'tags'              => array( $this->woo_product_tag_id ),
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Products By Tag', 'bwm' ),
	);
}

// product collection
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-collection',
	'attrs'        => array(
		'queryId'              => 0,
		'query'                => array(
			'perPage'                  => $rows,
			'pages'                    => 0,
			'offset'                   => 0,
			'postType'                 => 'product',
			'order'                    => 'asc',
			'orderBy'                  => 'title',
			'search'                   => '',
			'exclude'                  => array(),
			'inherit'                  => false,
			'taxQuery'                 => array(),
			'isProductCollectionBlock' => true,
			'woocommerceAttributes'    => array(),
			'woocommerceStockStatus'   => array( 'instock', 'outofstock', 'onbackorder' ),
		),
		'tagName'              => 'div',
		'displayLayout'        => array(
			'type'          => 'flex',
			'columns'       => $cols,
			'shrinkColumns' => true,
		),
		'queryContextIncludes' => array( 'collection' ),
	),
	'innerBlocks'  => array(
		array(
			'blockName'    => 'woocommerce/product-template',
			'attrs'        => array(),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-image',
					'attrs'        => array(
						'imageSizing'             => 'thumbnail',
						'isDescendentOfQueryLoop' => true,
					),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
				array(
					'blockName'    => 'core/post-title',
					'attrs'        => array(
						'level'                  => 3,
						'isLink'                 => true,
						'__woocommerceNamespace' => 'woocommerce/product-collection/product-title',
					),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
				array(
					'blockName'    => 'woocommerce/product-price',
					'attrs'        => array(
						'isDescendentOfQueryLoop' => true,
					),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
				array(
					'blockName'    => 'woocommerce/product-button',
					'attrs'        => array(
						'isDescendentOfQueryLoop' => true,
					),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
				null,
				null,
				null,
			),
		),
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-product-collection">
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-product-collection">',
		null,
		'</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Collection', 'bwm' ),
);

// filter products by price
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/filter-wrapper',
	'attrs'        => array(
		'filterType' => 'price-filter',
	),
	'innerBlocks'  => array(
		array(
			'blockName'    => 'woocommerce/price-filter',
			'attrs'        => array(
				'showInputFields'  => true,
				'showFilterButton' => true,
				'heading'          => esc_html__( 'Filter By Price', 'bwm' ),
				'headingLevel'     => 3,
			),
			'innerHTML'    =>
				'<div class="wp-block-woocommerce-price-filter">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>',
			'innerContent' => array(
				'<div class="wp-block-woocommerce-price-filter">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>',
			),
		),
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-filter-wrapper">
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-filter-wrapper">',
		null,
		'</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Filter Products By Price', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/filter-wrapper',
	'attrs'        => array(
		'filterType' => 'price-filter',
	),
	'innerBlocks'  => array(
		array(
			'blockName'    => 'woocommerce/price-filter',
			'attrs'        => array(
				'showInputFields'  => false,
				'showFilterButton' => true,
				'heading'          => esc_html__( 'Filter By Price', 'bwm' ),
				'headingLevel'     => 3,
			),
			'innerHTML'    =>
				'<div class="wp-block-woocommerce-price-filter">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>',
			'innerContent' => array(
				'<div class="wp-block-woocommerce-price-filter">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>',
			),
		),
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-filter-wrapper">
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-filter-wrapper">',
		null,
		'</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Filter Products By Price', 'bwm' ),
);

// filter products by stock
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/stock-filter',
	'attrs'        => array(
		'showCounts'       => true,
		'showFilterButton' => true,
		'heading'          => esc_html__( 'Filter By Stock Status', 'bwm' ),
		'headingLevel'     => 3,
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-stock-filter"></div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-stock-filter"></div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Filter Products By Stock', 'bwm' ),
);

// product filters
$woo_attribute_id = 0;
if ( ! empty( $this->woo_taxonomy ) ) {
	$woo_attribute_id = wc_attribute_taxonomy_id_by_name( $this->woo_taxonomy );
}
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-filters',
	'attrs'        => array(),
	'innerBlocks'  => array(
		array(
			'blockName'    => 'woocommerce/product-filter-active',
			'attrs'        => array(),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-filter-removable-chips',
					'attrs'        => array(),
					'innerHTML'    =>
						'<div class="wc-block-product-filter-removable-chips"></div>',
					'innerContent' => array(
						'<div class="wc-block-product-filter-removable-chips"></div>',
					),
				),
				array(
					'blockName'    => 'woocommerce/product-filter-clear-button',
					'attrs'        => array(),
					'innerHTML'    =>
						'<div class="wp-block-button">
							<a class="wp-block-button__link">' . esc_html__( 'Clear', 'bwm' ) . '</a>
						</div>',
					'innerContent' => array(
						'<div class="wp-block-button">
							<a class="wp-block-button__link">' . esc_html__( 'Clear', 'bwm' ) . '</a>
						</div>',
					),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
				null,
			),
		),
		array(
			'blockName'    => 'woocommerce/product-filter-price',
			'attrs'        => array(),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-filter-price-slider',
					'attrs'        => array(
						'showInputFields' => true,
					),
					'innerHTML'    =>
						'<div class="wc-block-product-filter-price-slider"></div>',
					'innerContent' => array(
						'<div class="wc-block-product-filter-price-slider"></div>',
					),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
			),
		),
		array(
			'blockName'    => 'woocommerce/product-filter-status',
			'attrs'        => array(
				'showCounts' => true,
			),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-filter-checkbox-list',
					'attrs'        => array(),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
			),
		),
		array(
			'blockName'    => 'woocommerce/product-filter-attribute',
			'attrs'        => array(
				'attributeId' => $woo_attribute_id,
				'showCounts'  => true,
			),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-filter-checkbox-list',
					'attrs'        => array(),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
			),
		),
		array(
			'blockName'    => 'woocommerce/product-filter-rating',
			'attrs'        => array(
				'showCounts' => true,
			),
			'innerBlocks'  => array(
				array(
					'blockName'    => 'woocommerce/product-filter-checkbox-list',
					'attrs'        => array(),
					'innerHTML'    => '',
					'innerContent' => array(),
				),
			),
			'innerHTML'    => '',
			'innerContent' => array(
				null,
			),
		),
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-product-filters">
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-product-filters">',
		null,
		null,
		null,
		null,
		null,
		'</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Filters', 'bwm' ),
);

// mini cart
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/mini-cart',
	'attrs'        => array(),
	'innerHTML'    => '',
	'innerContent' => array(),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Mini Cart', 'bwm' ),
);

$woo_blocks = $this->group_blocks( $woo_blocks_source, $group );
