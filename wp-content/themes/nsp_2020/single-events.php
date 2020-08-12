<?php get_header(); ?>
<main id="content">
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="nsp-background-content post">
					<div class="post-content f-roboto f-primary">
						<?php 
							$event = get_fields(get_the_ID()); 
							$jours = get_the_terms(get_the_id(), 'events_jour')[0];
						?>
						<div class="post-section">
							<h5>
								<?php echo $jours->name; ?> - 
								<?php if(isset($event['event_start_hour']) && !empty($event['event_start_hour'])): ?>
									de <b><?php echo $event['event_start_hour']; ?></b> 
									<?php if(isset($event['event_end_hour']) && !empty($event['event_end_hour'])): ?>
										à <b><?php echo $event['event_end_hour']; ?></b>
									<?php endif; ?>
								<?php endif; ?>
								<br/>
								<a href="<?php echo $event['event_fb']; ?>">évènement facebook</a>
							</h5>
						</div>
						<div class="post-section">
							<?php echo the_content(); ?>
							<br/>
							<?php if(isset($event['event_attendees']) && !empty($event['event_attendees'])): ?>
								<?php $brasserie = get_fields($event['event_attendees']);?>
								<p>Avec <b><a href="<?php echo get_the_permalink($event['event_attendees'] ) ?>"> <?php echo get_the_title($event['event_attendees'] ) ?></a></b></p>
							<?php endif; ?>

							<br/>
							<?php if(isset($event['event_place']) && !empty($event['event_place'])): ?>
								<p class="attendee_place">à l'adresse suivante: <br/> <b><?php echo $event['event_place']; ?></b></p>
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
