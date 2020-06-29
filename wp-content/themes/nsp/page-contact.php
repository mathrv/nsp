<?php get_header(); ?>

<main id="content">
  <div class="nsp-background">
    <div class="nsp-background-logo">
      <div class="nsp-background-content">
      	<h1>Nous contacter</h1>
		<p>Envie d’ajouter votre bière à l’édifice en contribuant à la deuxième édition du festival, ou tout simplement d’en savoir plus sur Nantes Sous Pression ?</p>
		<p><b>Laissez-nous un message, nous vous contacterons très vite pour en parler ! </b></p>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
      </div>
    </div>
  </div>

</main>
<?php get_footer(); ?>