<?php get_header();?>
<h2> <?php the_title() ?> </h2>
<br>
<div class="entry-content">
	<?php the_content(); ?>
</div>

<div style="float:right"> Posted: <?php echo get_the_date(); ?> </div>
<?php get_footer();?>