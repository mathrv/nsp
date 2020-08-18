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
					<p>Suivez-nous sur <a href="https://www.facebook.com/NantesSousPression/" target="_blank">Facebook</a>, <a href="https://twitter.com/nantesspression" target="_blank">Twitter</a> et <a href="https://www.instagram.com/nantessouspression/" target="_blank">Instagram</a> <br> pour les dernières mises à jour.</p>
<?php include('partial_booking_button.php') ?>
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
					<div class="list-events">

<?php
	$evenements = array('post_type' => 'events', 'posts_per_page' => 6, 'orderby' => 'rand');
	$evenements_loop = new WP_Query($evenements);

	if ($evenements_loop->have_posts()) {
		while ( $evenements_loop->have_posts() ) {
			$evenements_loop->the_post();
			$fields = get_fields(get_the_ID());
?>
						<div class="list-events-element">
							<h5><?= get_the_title() ?></h5>
							<?= $fields['event_start_hour'] ?> - <?= $fields['event_place'] ?>
						</div>
<?php
		}// end while
?>
					</div>
				</div>
					
<a href="<?= get_page_link(13); ?>" class="see-more">Voir tous les événements <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/see-more.png"></a>
<?php 
		include('partial_booking_button.php');
	}
	else {
		include('partial_placeholder.php');
	}
?>
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
	$participants_query = new WP_Query($args);

	if ($participants_query->have_posts()) {
		while ($participants_query->have_posts()) {
			$participants_query->the_post(); 
			$participant=get_fields(get_the_ID());
?>
					<div class="list-participants-element">
						<p class="list-participants-element-logo"><?= the_post_thumbnail("small"); ?></p>
						<div class="nsp-list-element-content">
<h5><?php the_title(); ?></h5>
<?php if(isset($participant['attendee_country']) && !empty($participant['attendee_country'])): ?>
	<?= $participant['attendee_country']; ?>
<?php endif; ?>
			</div>
					</div>
<?php 
	} //end while
?>
<a href="<?= get_page_link(15); ?>" class="see-more">Voir tous les participants <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/see-more.png"></a>
<?php 
		include('partial_booking_button.php');
	}
	else {
		include('partial_placeholder.php');
	}
?>
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
