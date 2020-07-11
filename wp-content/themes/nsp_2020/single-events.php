<?php get_header(); ?>
<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1 class="f-primary f-light"><?php the_title(); ?></h1>
				<div class="nsp-background-content post">
					<div class="post-content f-roboto f-primary">

						<?php echo the_content(); ?>

						<?php $event = get_fields(get_the_ID()); ?>
						<?php if(isset($event['event_attendees']) && !empty($event['event_attendees'])): ?>
							<?php $brasserie = get_fields($event['event_attendees']);?>
							<p>Avec <b><a href="<?php echo get_the_permalink($event['event_attendees'] ) ?>"> <?php echo get_the_title($event['event_attendees'] ) ?></a></b></p>
						<?php endif; ?>
						<?php if(isset($event['event_start_hour']) && !empty($event['event_start_hour'])): ?>
							<p class="event_hour">à partir de <b><?php echo $event['event_start_hour']; ?></b> 
							<?php if(isset($event['event_end_hour']) && !empty($event['event_end_hour'])): ?>
								jusqu'à <b><?php echo $event['event_end_hour']; ?></b> </p>
							<?php endif; ?>
						<?php endif; ?>

						<?php if(isset($event['event_place']) && !empty($event['event_place'])): ?>
							<p class="attendee_place">à l'adresse suivante: <br/> <b><?php echo $event['event_place']; ?></b></p>
						<?php endif; ?>

						<div class="post-content-links">
							<?php if(isset($event['event_fb']) && !empty($event['event_fb'])): ?>
								<a href="<?php echo $event['event_fb']; ?>">
									<img class="hide-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/facebook-blue.png"">
									<img class="show-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/facebook-pink.png"">
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
