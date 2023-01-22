<?php get_header();?>

<h2> <?php the_title() ?> </h2>
<div>
	<?php the_post_thumbnail('medium-image');?>
</div>

<ul style="bold">
	<li><b><i>Rental Price:</b></i>  <?php echo get_field('rental_price') ?>$ (per month)</li><br>
	<li><b><i>Engine Description:</b></i> <?php echo get_field('engine_description') ?></li><br>
	<li><b><i>Suspension Description:</b></i> <?php echo get_field('suspension_description') ?></li><br>
	<li><b><i>Comfort Features:</b></i> <?php echo get_field('comfort_features') ?></li>
</ul>

<?php
$featured_posts = get_field('study_articles');
echo '<h2> Related Articles: </h2>';

if (!$featured_posts)
{
	echo '(No articles related to this car.)';
	return;
}
?>

<ul>
<?php foreach( $featured_posts as $featured_post ):
	$permalink = get_permalink( $featured_post->ID );
	$title = get_the_title( $featured_post->ID );
	?>
	<li>
		<a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
	</li>
<?php endforeach;?>
</ul>
<a href="<?php get_site_url() ?>/car"> <h4> Go Back </h4> </a>
<?php get_footer();?>