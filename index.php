<?php get_header();?>
<h1 class="text-center">CAR BLOG</h1>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="text-center"><h4> <a href="<?php echo get_post_type_archive_link('car') ?>"> Show All Cars</a></h4></div>
		<img src="<?php echo get_template_directory_uri()?>/images/home.jpg" alt="" class="img-fluid rounded"/>
	</div>
</div>