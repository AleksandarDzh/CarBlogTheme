<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?> <!-- to load the CSS files -->
</head>
<body>
	<div class="container" style="margin-bottom: 20px; ">
	<div class="menu-header-container">
		<ul id="menu-header" class="menu">
			<li>
				<a href="<?php echo home_url()?>" aria-current="page">Home</a>
			</li>
			<li>
				<a href="/car">Cars</a>
			</li>
		</ul>
	</div>
	<!-- <?php wp_nav_menu( );?> -->
</div>
	<div class="container">