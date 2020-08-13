<?php get_header(); ?>
	<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="nsp-background-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
				 	<?php echo do_shortcode('[searchandfilter id="50"]'); ?>
				 	<?php echo do_shortcode('[searchandfilter id="50" show="results"]'); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</div>
				</article>
				<?php endwhile; endif; ?>
				</div>

			</div>
		</div>
	</div>
	</main>
<?php get_footer(); ?>
