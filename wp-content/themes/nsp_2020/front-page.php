<?php get_header(); ?>
<main id="content">
	<div class="nsp-background homepage">
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
	<!-- <div class="nsp-background home">
		<div class="nsp-background-logo">
	    	<div class="nsp-background-content">
				<h1>eowifjewifj</h1>
				<h2>Du 2 au 8 novembre 2020<br>
						Final au Solilab les 7 & 8 novembre 2020</h2>
				<p>Le festival de bière artisanal nantais organisé par Nantes Beer Club</p>

				<div class="actions">
					<a href="<?php echo get_the_permalink(19); ?>" class="button">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M5 4C3.34315 4 2 5.34315 2 7V7.49497L9.74585 13.3044C11.1043 14.2317 12.895 14.2319 14.2536 13.3048L22 7.49502V7C22 5.34315 20.6569 4 19 4H5ZM19 6H5C4.60088 6 4.25638 6.23382 4.09599 6.57194L10.8001 11.6C11.5112 12.1333 12.4889 12.1333 13.2001 11.6L19.904 6.57201C19.7437 6.23385 19.3991 6 19 6Z" fill="#1F2951"/>
							<path d="M22 8.74502L20 10.245V17C20 17.5523 19.5523 18 19 18H5C4.44772 18 4 17.5523 4 17V10.245L2 8.74497V17C2 18.6569 3.34315 20 5 20H19C20.6569 20 22 18.6569 22 17V8.74502Z" fill="#1F2951"/>
						</svg>
						Contactez-nous
					</a>
					<a href="http://facebook.com/NantesSousPression/" class="button mod-outline">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.8293 21C14.4175 22.1652 13.3062 23 12 23C10.6938 23 9.58254 22.1652 9.17071 21H14.8293Z" fill="#ffffff"/>
							<path d="M9 9C9 8.44771 9.44771 8 10 8C10.5523 8 11 8.44772 11 9V15C11 15.5523 10.5523 16 10 16C9.44771 16 9 15.5523 9 15V9Z" fill="#ffffff"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M19 20C19.5523 20 20 19.5523 20 19C20 18.4477 19.5523 18 19 18V9C19 5.13401 15.866 2 12 2C8.13401 2 5 5.13401 5 9V18C4.44772 18 4 18.4477 4 19C4 19.5523 4.44772 20 5 20H19ZM17 9V18H7V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9Z" fill="#ffffff"/>
						</svg>
						En savoir plus
					</a>
				</div>
			</div>
		</div>
	</div> -->
</main>
<?php get_footer(); ?>
