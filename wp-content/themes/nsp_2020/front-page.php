<?php get_header(); ?>
<main id="content">
	<div class="nsp-background homepage">
		<div class="nsp-background-home-sous">
			<div class="section section-first">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/LogoHome.png">
				<div>
					<h1 class="page-title">Le Rendez-vous nantais<br>de la bière artisanale</h1>
					<p class="bold">Lun. 2 / dim. 8 novembre 2020</p>
					<p>Final au Solilab les 7 et 8 novembre</p>
					<p>Suivez-nous sur Facebook, Twitter et Instagram <br> pour les dernières mises à jour.</p>
					<button class="button">Acheter mon billet</button>
				</div>
			</div>
			<div class="breadcrump"></div>
			<div class="section section-two marginTopStandard">
				<?= the_content(); ?>
			</div>
			<div class="breadcrump"></div>
			<div class="section section-third">
			<h3 class="marginTopStandard">Les événements</h3>

				<div>
					<h4 class="event-date">Mardi 12</h4>
					<div class="list-events">
						<?php 
							$slug='tuesday_12'; // to be updated, for slug check 'wp_nsp_terms' table
							include('partial_home_event.php')
						?>
					</div>
				</div>

				<div>
					<h4 class="event-date">Mercredi 13</h4>
					<div class="list-events">
						<?php 
							$slug='wednesday_13'; // to be updated, for slug check 'wp_nsp_terms' table
							include('partial_home_event.php')
						?>
					</div>
				</div>

				<div>
					<h4 class="event-date">Jeudi 14</h4>
					<div class="list-events">
						<?php 
							$slug='thursday_14'; // to be updated, for slug check 'wp_nsp_terms' table
							include('partial_home_event.php')
						?>
					</div>
				</div>
				<a href="<?= get_page_link(13); ?>" class="see-more">Voir tous les événements <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/see-more.png"></a>
				<button class="button marginTopStandard">Acheter mon billet</button>
			</div>

			<div class="breadcrump"></div>

			<div class="section section-four">
				<h3 class="marginTopStandard">Les brasseries</h3>
				<div class="list-participants">
				<?php 
					$args = array( 'category_id' => 0,
													'post_type' => 'participants',
											'orderby' => 'rand',
											'post_per_page' => 6);
					$participants_query = new WP_Query( $args );

					while ( $participants_query->have_posts() ) {
						$participants_query->the_post(); 
						$participant=get_fields(get_the_ID());
					?>
					<div class="list-participants-element">
						<?php 
							if ( has_post_thumbnail() ) {
								echo '<p class="list-participants-element-logo">';
								the_post_thumbnail("small");
								echo '</p>';
							}
						?>
						<div class="nsp-list-element-content">
							<h5><?php the_title(); ?></h5>
							<?php if(isset($participant['attendee_website']) && !empty($participant['attendee_website'])): ?>
									<a href="<?= $participant['attendee_website']; ?>" class="f-primary"><?= $participant['attendee_website']; ?></a>
							<?php elseif(isset($participant['attendee_fb']) && !empty($participant['attendee_fb'])): ?>
									<a href="<?= $participant['attendee_fb']; ?>" class="f-primary"><?= $participant['attendee_fb']; ?></a>
							<?php endif; ?>
						</div>
					</div>
					<?php } ?>
					<a href="<?= get_page_link(15); ?>" class="see-more">Voir tous les participants <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/see-more.png"></a>
					<button class="button marginTopStandard">Acheter mon billet</button>
				</div>
			</div>
			<div class="breadcrump"></div>
			<div class="section section-five">
				<h3 class="marginTopStandard">Les partenaires</h3>
				<?php 
					$Partenairescontent = apply_filters('the_content', get_post_field('post_content', 130));
					echo $Partenairescontent;
				?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
