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

						<?php if(isset($participant['attendee_address']) && !empty($participant['attendee_address'])): ?>
							<p class="attendee_address"><?php echo $participant['attendee_address']; ?></p>
						<?php endif; ?>

						<div class="post-content-links">
							<?php if(isset($participant['attendee_fb']) && !empty($participant['attendee_fb'])): ?>
								<a href="<?php echo $participant['attendee_fb']; ?>">
									<img class="hide-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/facebook-blue.png"">
									<img class="show-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/facebook-pink.png"">
								</a>
							<?php endif; ?>
							<?php if(isset($participant['attendee_instgrm']) && !empty($participant['attendee_instgrm'])): ?>
								<a href="<?php echo $participant['attendee_instgrm']; ?>">
									<img  class="hide-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/insta-blue.png"">
									<img class="show-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/insta-pink.png"">
								</a>
							<?php endif; ?>
							<?php if(isset($participant['attendee_website']) && !empty($participant['attendee_website'])): ?>
								<a href="<?php echo $participant['attendee_website']; ?>" class="f-primary">leur site web</a>
							<?php endif; ?>
						</div>
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
