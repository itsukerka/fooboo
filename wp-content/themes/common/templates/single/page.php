<?php
	
?>
<?php get_template_part('templates/parts/headers/header-1', get_post_format()); ?>
<div id="page">
	<div class="container">
		<section>
			<div class="ui-breadcrumbs">
				<div class="wrapper">
					<div class="item">
						<a href="/" class="label">Home</a>
					</div>
					<div class="item">
						<span class="label"><?php echo $post->post_title; ?></span>
					</div>
				</div>
			</div>
		</section>
		<section class="ui-section--1">
			<div class="section--title">
				<h1 class="label"><?php echo $post->post_title; ?></h1>
			</div>
		</section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?> 
	</div>
</div>
<?php get_template_part('templates/parts/footers/footer-1', get_post_format()); ?>