<?php get_header(); ?>

<main id="content">
	<div class="nsp-background">
		<?php
			$page = get_page_by_path( 'concours-brassam' );
			$ConcoursPost = get_post();
		?>
		<div class="nsp-background-logo">
			<h1 class="f-primary f-light"><?php echo get_the_title( $page ); ?></h1>
			<div class="nsp-background-content">
				<?php echo apply_filters( 'the_content', $ConcoursPost->post_content ); ?>
			</div>
		</div>
	</div>

</main>
<?php get_footer(); ?>