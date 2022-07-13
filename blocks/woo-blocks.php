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

// reviews by product // todo

// reviews by category // todo

// product search
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-search',
	'attrs'        => array(
		'hasLabel' => true,
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Product Search', 'bwm' ),
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

// filter products by price
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/price-filter',
	'attrs'        => array(
		'showInputFields'  => true, // manually add into innerHTML as data attr
		'showFilterButton' => true, // manually add into innerHTML as data attr
		'heading'          => esc_html__( 'Filter By Price', 'bwm' ),
		'headingLevel'     => 3,
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-price-filter" data-showinputfields="true" data-showfilterbutton="true">
			<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-price-filter" data-showinputfields="true" data-showfilterbutton="true">
			<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
		</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Filter Products By Price', 'bwm' ),
);
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/price-filter',
	'attrs'        => array(
		'showInputFields'  => false, // manually add into innerHTML as data attr
		'showFilterButton' => true, // manually add into innerHTML as data attr
		'heading'          => esc_html__( 'Filter By Price', 'bwm' ),
		'headingLevel'     => 3,
	),
	'innerHTML'    =>
		'<div class="wp-block-woocommerce-price-filter" data-showinputfields="false" data-showfilterbutton="true">
			<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
		</div>',
	'innerContent' => array(
		'<div class="wp-block-woocommerce-price-filter" data-showinputfields="false" data-showfilterbutton="true">
			<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
		</div>',
	),
	'className'    => '',
	'blockHeading' => esc_html__( 'Block Filter Products By Price', 'bwm' ),
);

// filter products by attribute // todo

// filter products by stock // todo
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

// active product filters // todo

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
