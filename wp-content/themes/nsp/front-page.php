<?php get_header(); ?>
<main id="content">
	<div class="nsp-background nsp-home-presentation">
		<div class="nsp-background-logo">
			<img class="logo" src= "<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/logo.png"/>
		</div>
		<div class="nsp-home-presentation-texte"> 
			<div class="f-light f-primary">
				<span class="f-bolder">12—17·11·2019</span>
				<p class="f-light f-primary">LE RENDEZ-VOUS <br>DE LA BIÈRE ARTISANALE <br> NANTAIS</p>
			</div>
			<div>
				<p class="f-light f-primary">LE FINAL AU SOLILAB <br>le 16 et 17·11·2019</p>
			</div>
		</div>

		<div class="nsp-home-presentation-asso">
			<h2 class="f-light f-white">Qui sommes nous ? </h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
		</div>
		<div class="nsp-home-presentation-participants">
			<div class="nsp-home-presentation-participants-header">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/groupeverres.png">
				<a href="<?php echo get_the_permalink(11); ?>" class="btn btn-pink">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
				</a>
			</div>
			<div class="nsp-home-presentation-participants-texte">
				<h2 class="f-secondary f-light">Les participants</h2>
				<div class="nsp-home-presentation-participants-item">
					<p>Brasseries</p>
					<p>Distributeurs</p>
					<p>Foodtruck</p>
					<p>Autres</p>
					<a href="<?php echo get_the_permalink(15); ?>" class="btn btn-blue">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="nsp-home-programme">
		<div class="nsp-home-programme-fond">
			<h2 class="f-primary f-light">Le programme</h2>
			<div class="flex flex-j-sb nsp-home-programme-fond-block">
				<div class="nsp-home-programme-fond-block-description">
					<h3 class="f-primary f-light">La pression</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				</div>
				<div class="nsp-home-programme-fond-block-jours">
					<div class="blue">Mardi</div>
					<div class="blue">Mercredi</div>
					<div class="blue">Jeudi</div>
					<div class="blue">Vendredi</div>
				</div>
				<a href="<?php echo get_the_permalink(13); ?>" class="btn btn-blue">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">					
				</a>
			</div>
			<div class="flex flex-j-sb nsp-home-programme-fond-block">
				<div class="nsp-home-programme-fond-block-description">
					<h3 class="f-primary f-light">La pression</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				</div>
				<div class="nsp-home-programme-fond-block-jours">
					<div class="yellow">Samedi</div>
					<div class="yellow">Dimanche</div>
					<div class="yellow">Billetterie</div>
					<div class="yellow"></div>
				</div>
				<a href="<?php echo get_the_permalink(13); ?>" class="btn btn-blue">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">					
				</a>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
