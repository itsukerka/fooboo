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
						<span class="label"><?php printf( esc_html__( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></span>
					</div>
				</div>
			</div>
		</section>
		<section class="ui-section--1">
			<div class="section--title">
				<h1 class="label"><?php printf( esc_html__( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1>
			</div>
		</section>
		<div class="woocommerce columns-4 ">
		<ul class="products columns-4">
<?php if ( have_posts() ) : ?>
<?php do_action( 'woocommerce_before_shop_loop' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php 

				/**
				* Hook: woocommerce_shop_loop.
				*/
				do_action( 'woocommerce_shop_loop' );
				
				wc_get_template_part( 'content', 'product' );
			
			?>
		<?php endwhile; ?>
		<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		</ul>
		</div>
		<?php get_template_part( 'nav', 'below' ); ?>
		<?php else : ?>
		<article id="post-0" class="post no-results not-found">
			<header class="header">
				<h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'blankslate' ); ?></h1>
			</header>
			<div class="entry-content" itemprop="mainContentOfPage">
				<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
			</div>
		</article>
		<?php endif; ?>
	</div>
</div>
<?php get_template_part('templates/parts/footers/footer-1', get_post_format()); ?>