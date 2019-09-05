<?php get_header(); ?>
<main id="content">
	<div class="nsp-background nsp-home-presentation">
		<div class="nsp-background-logo">
			<a href="http://www.nantes-sous-pression.com/" target="_blank">
				<img class="logo" src= "<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/logo.png"/>			
			</a>
		</div>
		<div class="nsp-home-presentation-texte"> 
			<div class="f-light f-primary">
				<span class="f-bolder f-adelle">12—17·11·2019</span>
				<p class="f-light f-primary f-open">LE RENDEZ-VOUS NANTAIS <br>DE LA BIÈRE ARTISANALE <br></p>
			</div>
			<div>
				<p class="f-light f-primary f-open">LE FINAL AU SOLILAB <br>le 16 et 17·11·2019</p>
			</div>
		</div>

		<div class="nsp-home-presentation-asso">
			<a href="<?php echo get_the_permalink(11); ?>" class="btn btn-white display-mobile">
				<p class="f-white f-open f-bolder">Voir toute l'histoire</p>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
			</a>
			<div class="flex flex-wrap">
				<h2 class="f-light f-white f-open">Qui sommes nous ? </h2>
				<?php 
					$QuiSommesNouscontent = apply_filters('the_content', get_post_field('post_content', 1));
					echo $QuiSommesNouscontent;
	 			?>
			</div>
		</div>
		<div class="nsp-home-presentation-participants">
			<div class="nsp-home-presentation-participants-header">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/groupeverres.png">
				<a href="<?php echo get_the_permalink(11); ?>" class="btn btn-pink hide-mobile">
					<p class="f-secondary f-open f-bolder">Voir toute l'histoire</p>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
				</a>
			</div>
			<div class="nsp-home-presentation-participants-texte">
				<a href="<?php echo get_the_permalink(11); ?>" class="btn btn-pink display-mobile">
					<p class="f-secondary f-bolder f-open">voir tout le monde</p>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
				</a>
				<div>
					<h2 class="f-secondary f-light f-open">Les participants</h2>
					<div class="nsp-home-presentation-participants-item f-roboto">
						<p><a href="http://localhost/les-participants/?_sft_participants_cat=brewery">Brasseries</a></p>
						<p><a href="http://localhost/les-participants/?_sft_participants_cat=cider">Cidrerie</a></p>
						<p><a href="http://localhost/les-participants/?_sft_participants_cat=food">Food</a></p>
						<a href="<?php echo get_the_permalink(15); ?>" class="btn btn-blue hide-mobile">
							<p class="f-primary f-bolder f-open">voir tout le monde</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">
						</a>
					</div>					
				</div>
			</div>
		</div>
	</div>
	
	<div class="nsp-home-programme">
		<div class="nsp-home-programme-fond">
			<h2 class="f-primary f-light f-open">Le programme</h2>
			<div class="flex flex-j-sb nsp-home-programme-fond-block">
				<div class="nsp-home-programme-fond-block-description">
					<h3 class="f-primary f-light f-lemon">La semaine</h3>
					<?php 
						$Semainecontent = apply_filters('the_content', get_post_field('post_content', 119));
						echo $Semainecontent;
		 			?>
				</div>
				<div class="flex flex-as-fe flex-j-sb">
					<div class="nsp-home-programme-fond-block-jours f-roboto">
						<div class="blue">Mardi</div>
						<div class="blue">Mercredi</div>
						<div class="blue">Jeudi</div>
						<div class="blue">Vendredi</div>
					</div>
					<a href="<?php echo get_the_permalink(13); ?>" class="btn btn-blue">
						<p class="f-primary f-open f-bolder">Voir tout le programme</p>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">					
					</a>					
				</div>
			</div>
			<div class="flex flex-j-sb nsp-home-programme-fond-block">
				<div class="nsp-home-programme-fond-block-description">
					<h3 class="f-primary f-light f-lemon">Le week-end</h3>
					<?php 
						$QuiSommesNouscontent = apply_filters('the_content', get_post_field('post_content', 121));
						echo $QuiSommesNouscontent;
		 			?>
				</div>
				<div class="flex flex-as-fe flex-j-sb">
					<div class="nsp-home-programme-fond-block-jours f-roboto">
						<div class="yellow">Participants</div>
						<div class="yellow">Billetterie</div>
						<div class="yellow">Concours</div>
						<div class="yellow">Partenaires</div>
					</div>
					<a href="<?php echo get_the_permalink(13); ?>" class="btn btn-blue">
						<p class="f-primary f-open f-bolder">Voir tout le programme</p>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-blue.svg">					
					</a>					
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
