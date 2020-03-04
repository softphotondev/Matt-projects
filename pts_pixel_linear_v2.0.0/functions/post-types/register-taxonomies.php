<?php
/**
 * Registers custom taxomies for use with this theme
 *
 * @package WordPress
*/

add_action( 'init', 'bi_register_taxonomies' );

if ( !function_exists('bi_register_taxonomies') ) {
	
	function bi_register_taxonomies() {

		//portfolio
		/*
		$portfolio_post_type_name = bi_get_data('portfolio_post_type_name') ? bi_get_data('portfolio_post_type_name') : __('Portfolio','azkaban_options');
		$portfolio_tax_slug = bi_get_data('portfolio_tax_slug') ? bi_get_data('portfolio_tax_slug') : 'portfolio-category';

			// Portfolio taxonomies
		register_taxonomy('portfolio_cats','portfolio',array(
			'hierarchical' => true,
			'labels' => apply_filters('bi_portfolio_tax_labels', array(
				'name' => $portfolio_post_type_name . ' ' . __( 'Categories', 'azkaban_options' ),
				'singular_name' => $portfolio_post_type_name . ' '. __( 'Category', 'azkaban_options' ),
				'search_items' =>  __( 'Search Categories', 'azkaban_options' ),
				'all_items' => __( 'All Categories', 'azkaban_options' ),
				'parent_item' => __( 'Parent Category', 'azkaban_options' ),
				'parent_item_colon' => __( 'Parent Category:', 'azkaban_options' ),
				'edit_item' => __( 'Edit  Category', 'azkaban_options' ),
				'update_item' => __( 'Update Category', 'azkaban_options' ),
				'add_new_item' => __( 'Add New  Category', 'azkaban_options' ),
				'new_item_name' => __( 'New Category Name', 'azkaban_options' ),
				'choose_from_most_used'	=> __( 'Choose from the most used categories', 'azkaban_options' )
				)
			),
			'query_var' => true,
			'rewrite' => array( 'slug' => $portfolio_tax_slug ),
		));
		*/
	
	}
	
} ?>