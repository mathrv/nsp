<?php get_header(); ?>
<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="nsp-background-content post">
					<div class="post-content f-roboto f-primary">
						<?php 
							$participant = get_fields(get_the_ID()); 
						?>
						<div class="post-section">
							<?php echo the_content(); ?>
						</div>
						<div class="post-section">
							<?php if(isset($participant['attendee_address']) && !empty($participant['attendee_address'])): ?>
								<p class="attendee_address"><?php echo $participant['attendee_address']; ?></p>
							<?php endif; ?>
						</div>
						<div class="post-section post-section-links">
							<?php if(isset($participant['attendee_website']) && !empty($participant['attendee_website'])): ?>
								<a href="<?php echo $participant['attendee_website']; ?>">leur site web</a>
							<?php endif; ?>

							<?php if(isset($participant['attendee_fb']) && !empty($participant['attendee_fb'])): ?>
								<a href="<?php echo $participant['attendee_fb']; ?>" class="link-img">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Facebook.png">
								</a>
							<?php endif; ?>
							<?php if(isset($participant['attendee_instgrm']) && !empty($participant['attendee_instgrm'])): ?>
								<a href="<?php echo $participant['attendee_instgrm']; ?>" class="link-img">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Instagram.png">
								</a>
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
