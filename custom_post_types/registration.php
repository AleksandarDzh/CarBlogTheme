<?php

function register_custom_post_types()
{
	/**
	 * Post Type: Cars.
	 */

	$labels = [
		"name" => "Cars",
		"singular_name" => "Car",
	];

	$args = [
		"label" => "Cars",
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "car", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "car_brand", "engine_type" ],
	];
	register_post_type( "car", $args );


	/**
	 * Post Type: Case Study Articles.
	 */

	$labels = [
		"name" => "Case Study Articles",
		"singular_name" => "Case Study Article",
	];

	$args = [
		"label" => "Case Study Articles",
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "case_study_article", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "car_category", "target_audience" ],
	];
	register_post_type( "case_study_article", $args );
}
add_action( 'init', 'register_custom_post_types' );


function register_custom_taxonomies() {

	/*
	 * Taxonomy: Car Brands.
	 */

	$labels = [
		"name" => "Car Brands",
		"singular_name" => "Car Brand",
	];

	$args = [
		"label" => "Car Brands",
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'car_brand', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "car_brand",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
	];
	register_taxonomy( "car_brand", [ "car" ], $args );


	/**
	 * Taxonomy: Engine Types.
	 */

	$labels = [
		"name" => "Engine Types",
		"singular_name" => "Engine Type",
	];

	$args = [
		"label" => "Engine Types",
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'engine_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "engine_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
	];
	register_taxonomy( "engine_type", [ "car" ], $args );


	/**
	 * Taxonomy: Car Categories.
	 */

	$labels = [
		"name" => "Car Categories",
		"singular_name" => "Car Category",
	];

	$args = [
		"label" => "Car Categories",
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'car_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "car_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
	];
	register_taxonomy( "car_category", [ "case_study_article" ], $args );


	/**
	 * Taxonomy: Target Audience.
	 */

	$labels = [
		"name" => "Target Audience",
		"singular_name" => "Target Audience",
	];

	$args = [
		"label" => "Target Audience",
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'target_audience', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "target_audience",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
	];
	register_taxonomy( "target_audience", [ "case_study_article" ], $args );
}
add_action( 'init', 'register_custom_taxonomies' );