<?php get_header(); ?>

<div class="row">
	<div class="col-md-3">
		<h3> Filtering </h3>
		<div>
			<b> Brand/Model </b>
			<?php
				$terms = get_terms('car_brand');
				$mapping = map_terms($terms);

				foreach ( $terms as $term ):
					if (!$term->parent): ?>
						<ul>
							<li>
								<a href="<?php compose_url($term->taxonomy, $term->slug); ?> "><?php echo esc_html( $term->name ); ?></a>
							</li>
								<div class="facet-group" style="padding-left: 20px">
									<?php foreach ($mapping[$term->term_id] as $child):?>
										<a href="<?php compose_url($term->taxonomy, $child->slug); ?> "><?php echo esc_html( $child->name ); ?></a>
									<?php endforeach; ?>
								</div>
						</ul>
				<?php endif; endforeach; ?>
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
	<?php
		if (!have_posts()): ?>
			<div class="position-relative">
				  <div class="position-absolute bottom-0 start-50
				  translate-middle p-3 mb-2 bg-light text-dark"> Nothing was found for this search.
				</div>
			</div>
	<?php else: ?>
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
<?php endif ?>
</div>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
<?php get_footer()?>