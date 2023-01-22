<?php

function include_featured_image()
{
	// add fetured image support
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'small-image', 180, 120, true);
	add_image_size( 'medium-image', 920, 320, array('top'));
}
add_action('after_setup_theme', 'include_featured_image');


function include_resources()
{
	// include css style
	wp_enqueue_style('carblog_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'include_resources');

function do_filtering($query)
{
	if ( is_admin() )
	{
		return;
	}

	// otherwise the menu might be broken
	//
	if (!$query->is_main_query())
	{
		return;
	}

	$tax_query = array();

	foreach (get_request_params() as $param => $args)
	{
		switch ($param)
		{
			case 'car_brand':
				$tax_query[] = array(
					'taxonomy' => 'car_brand',
					'field' => 'slug',
					'terms' => $args,
				);
				break;

			case 'engine_type':
				$tax_query[] =
				array(
					'taxonomy' => 'engine_type',
					'field' => 'slug',
					'terms' => $args,
				);
				break;
		}
	}

	$query->set( 'tax_query', $tax_query );
}
add_action( 'pre_get_posts', 'do_filtering');


/**
 * Return the terms parent-child ordered
 * @param  array  $terms
 * @return array
 */
function map_terms(array $terms): array
{
	$sorted_terms = array();

	foreach ($terms as $term)
	{
		// skip children
		//
		if ($term->parent)
		{
			continue;
		}

		foreach ($terms as $child_term)
		{
			// skip parents
			//
			if (!$child_term->parent)
			{
				continue;
			}

			if ($child_term->parent == $term->term_id)
			{
				$sorted_terms[$child_term->parent][] = $child_term;
			}
		}
	}
	return $sorted_terms;
}

/**
 * Filters the request
 * @return array
 */
function get_request_params(): array
{
	if (empty($_GET))
	{
		return array();
	}

	$request_params = array();
	foreach ($_GET as $key => $value)
	{
		if (!in_array($key, array('car_brand', 'car_engine')))
		{
			continue;
		}

		if (isset($request_params[$key]) && $request_params[$key] == $value)
		{
			continue;
		}

		$request_params[$key] = $value;
	}
	return $request_params;
}