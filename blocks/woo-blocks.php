<?php

$woo_blocks_group = array(
	'blockName'    => 'core/group',
	'attrs'        => array(),
	'innerBlocks'  => array(
		array(
			'blockName'    => 'core/heading',
			'innerHTML'    => '',
			'innerContent' => array(
				'',
			),
		),
		array(),
	),
	'innerHTML'    => '<div class="wp-block-group"></div>',
	'innerContent' => array(
		'<div class="wp-block-group">',
		null,
		null,
		'</div>',
	),
	'className'    => '',
);

$woo_blocks_source = array();

// all reviews fixme - multiple objects
// $woo_blocks_source[] = array(
// 	'blockName' => 'woocommerce/all-reviews',
// 	'attrs'     => array(
// 		'imageType'         => 'product',
// 		'orderby'           => 'highest-rating',
// 		'reviewsOnLoadMore' => 5,
// 		'reviewsOnPageLoad' => 5,
// 		'showReviewDate'    => true,
// 		'showReviewerName'  => true,
// 		'showReviewImage'   => true,
// 		'showReviewRating'  => true,
// 		'showReviewContent' => true,
// 		'showProductName'   => true,
// 	),
// 	'className' => '',
//	'blockHeading' => esc_html__( 'Block ', 'bwm' ),
// ),

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
				'innerHTML'    => '<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="' . get_term_link( $this->woo_product_category_id ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a></div>',
				'innerContent' => array(
					'<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="' . get_term_link( $this->woo_product_category_id ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a></div>',
				),
			),
		),
		'innerHTML'    => '',
		'innerContent' => array(
			null,
		),
		'className'    => '',
		'blockHeading' => esc_html__( 'Block Featured Product Category', 'bwm' ),
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
				'innerHTML'    => '<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="' . get_permalink( $this->woo_product_id ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a></div>',
				'innerContent' => array(
					'<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="' . get_permalink( $this->woo_product_id ) . '">' . esc_html__( 'Shop Now', 'bwm' ) . '</a></div>',
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

// hand picked products
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
		'blockHeading' => esc_html__( 'Block Handpicked Product', 'bwm' ),
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
	'blockHeading' => esc_html__( 'Block Product Categories List', 'bwm' ),
);

$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-categories',
	'attrs'        => array(
		'hasCount'       => true,
		'hasImage'       => true,
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

// reviews by product // fixme - multiple objects
// $woo_blocks_source[] = array(
// 	'blockName' => 'woocommerce/reviews-by-product',
// 	'attrs'     => array(
// 		'imageType'         => 'product',
// 		'orderby'           => 'highest-rating',
// 		'reviewsOnLoadMore' => 5,
// 		'reviewsOnPageLoad' => 5,
// 		'showReviewDate'    => true,
// 		'showReviewerName'  => true,
// 		'showReviewImage'   => true,
// 		'showReviewRating'  => true,
// 		'showReviewContent' => true,
// 		'showProductName'   => true,
// 	),
// 	'className' => '',
//	'blockHeading' => esc_html__( 'Block ', 'bwm' ),
// );

// reviews by category // fixme - multiple objects
// $woo_blocks_source[] = array(
// 	'blockName' => 'woocommerce/reviews-by-category',
// 	'attrs'     => array(
// 		'imageType'         => 'product',
// 		'orderby'           => 'highest-rating',
// 		'reviewsOnLoadMore' => 5,
// 		'reviewsOnPageLoad' => 5,
// 		'showReviewDate'    => true,
// 		'showReviewerName'  => true,
// 		'showReviewImage'   => true,
// 		'showReviewRating'  => true,
// 		'showReviewContent' => true,
// 		'showProductName'   => true,
// 	),
// 	'className' => '',
//	'blockHeading' => esc_html__( 'Block ', 'bwm' ),
// );

// product search
$woo_blocks_source[] = array(
	'blockName'    => 'woocommerce/product-search',
	'attrs'        => array(),
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

if ( $group ) {
	$count = 0;
	foreach ( $woo_blocks_source as $block ) {
		$woo_blocks[$count] = $woo_blocks_group;
		// inject title into group
		$woo_blocks[$count]['innerBlocks'][0]['innerHTML']       = '<h2>' . $block['blockHeading'] . '</h2>';
		$woo_blocks[$count]['innerBlocks'][0]['innerContent'][0] = '<h2>' . $block['blockHeading'] . '</h2>';
		// inject block into group
		$woo_blocks[$count]['innerBlocks'][1] = $block;

		$count ++;
	}
} else {
	$woo_blocks = $woo_blocks_source;
}
