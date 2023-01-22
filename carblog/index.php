<?php get_header();?>
<h1 class="text-center">CAR BLOG</h1>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="text-center"><h4> <a href="<?php echo get_post_type_archive_link('car') ?>"> Show All Cars</a></h4></div>
		<img  src="<?php echo wp_upload_dir()['baseurl'];?>/2023/01/ford-mustang-gt-forest-lord-5k-oq-scaled.jpg" class="img-fluid rounded">
	</div>
</div>