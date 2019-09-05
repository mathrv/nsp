<?php get_header(); ?>
<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1 class="f-primary f-light"><?php the_title(); ?></h1>
				<div class="nsp-background-content post">
					<div class="post-content f-roboto f-primary">
						<?php echo the_content(); ?>

						<?php $participant = get_fields(get_the_ID());   ?>
						<!-- <?php var_dump($participant); ?> -->
						<?php echo $participant['attendee_fb']; ?>
					</div>
					<div class="post-img">
						<?php echo the_post_thumbnail(); ?>
					</div>

				</div>
			<?php endwhile; endif; ?>

		</div>
	</div>
</main>
<?php get_footer(); ?>
