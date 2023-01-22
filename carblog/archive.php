<?php get_header(); ?>

<div class="row">
	<div class="col-md-3">
		<h3> Filtering </h3>
		<div>
			<b> Brand/Model </b>
			<?php
				$terms = get_terms('car_brand');
				$mapping = map_terms($terms);

				foreach ( $terms as $term )
				{
					if (!$term->parent)
					{ ?>
						<ul>
							<li>
								<a href="<?php compose_url($term->taxonomy, $term->slug); ?> "><?php echo esc_html( $term->name ); ?></a>
							</li>
								<div class="facet-group" style="padding-left: 20px">
								<?php foreach ($mapping[$term->term_id] as $child)
								{?>
								<a href="<?php compose_url($term->taxonomy, $child->slug); ?> "><?php echo esc_html( $child->name ); ?></a>
						<?php
								}
						?>
								</div>
						</ul>
				<?php
					}
				}
			?>
		</div>

		<b> Engine </b>
		<div class="facet-group" style="padding-left: 20px;">
			<?php
			$terms = get_terms('engine_type');
			foreach ( $terms as $term ) : ?>
			<a href="<?php compose_url($term->taxonomy, $term->slug); ?> "><?php echo esc_html( $term->name ); ?></a>
			<?php endforeach; ?>
		</div>
		<a class="btn btn-secondary btn-sm" href="<?php  get_site_url() ?>/car">Reset Filters</a>
	</div>
	<div class="col-md-9">
		<div class="row">
			<?php
				while (have_posts()) : 	the_post();?>
				<div class="col-md-3">
					<article class="row car">
						<h2  class="text-center"> <a href="<?php the_permalink();?>"><?php the_title()?></a></h2>
						 <a class="col-md-12" href="<?php the_permalink();?>"><?php the_post_thumbnail('medium-image');?></a>
					</article>
				</div>
			 <?php endwhile;?>
		</div>
	</div>
</div>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
<?php get_footer()?>


<?php

/**
 *
 * @param  string $taxonomy - the name of the taxonomy to be filtered
 * @param  string $slug
 */
function compose_url(string $taxonomy, string $slug)
{
	$slug = esc_attr($slug);

	$url = "?{$taxonomy}[]=" . esc_attr($slug);

	foreach (get_request_params() as $get_by => $args)
	{
		// allows selection of both: several or one (brand/engines)
		//
		if (in_array($slug, $args))
		{
			continue;
		}

		foreach ($args as $arg)
		{
			if ($arg == $slug)
			{
				continue;
			}
			$url .= "&{$get_by}[]=" .  esc_attr($arg);
		}
	}
	echo $url;
}