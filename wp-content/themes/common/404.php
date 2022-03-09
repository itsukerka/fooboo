<?php get_header(); 
?>

<?php get_template_part('templates/parts/headers/header-1', get_post_format()); ?>
<div id="page">
	<div class="container">
		<section class="ui-section--1">
			<div class="section--title">
				<h1 class="label"><?php esc_html_e( 'Not Found', 'blankslate' ); ?></h1>
			</div>
		</section>
		<article id="post-0" class="post not-found">
			<div class="entry-content l-mb-30" itemprop="mainContentOfPage">
				<p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
			</div>
		</article> 
	</div>
</div>
<?php get_template_part('templates/parts/footers/footer-1', get_post_format()); ?>
 
<?php get_footer(); ?>