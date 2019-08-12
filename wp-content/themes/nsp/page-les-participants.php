<?php get_header(); ?>
	<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<h1 class="f-primary f-light">Les participants</h1>
			<div class="nsp-background-content">
		

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- 				<header class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
				</header> -->
				<div class="entry-content">
				  <!-- <?php echo do_shortcode('[searchandfilter id="50"]'); ?> -->
				  <!-- <?php echo do_shortcode('[searchandfilter id="50" show="results"]'); ?> -->
				  <!-- <div class="entry-links"><?php wp_link_pages(); ?></div> -->
				</div>
				</article>
				<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
				<?php endwhile; endif; ?>

				<div class="nsp-list">
					<div class="nsp-list-element">
						<img class="nsp-list-element-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/oclock.png">
						<div class="nsp-list-element-content">
							<p>O'Clock Brewing</p>
							<a href="" class="btn btn-pink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
							</a>
						</div>
					</div>
					<div class="nsp-list-element">
						<img class="nsp-list-element-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/ptitemaiz.png">
						<div class="nsp-list-element-content">
							<p>La P'tite Maiz'</p>
							<a href="" class="btn btn-pink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
							</a>
						</div>
					</div>
					 <div class="nsp-list-element">
						<img class="nsp-list-element-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/ptitemaiz.png">
						<div class="nsp-list-element-content">
							<p>La P'tite Maiz'</p>
							<a href="" class="btn btn-pink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
							</a>
						</div>
					</div>
					<div class="nsp-list-element">
						<img class="nsp-list-element-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/ptitemaiz.jpg">
						<div class="nsp-list-element-content">
							<p>La P'tite Maiz'</p>
							<a href="" class="btn btn-pink">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</main>
<?php get_footer(); ?>
