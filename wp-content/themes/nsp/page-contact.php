<?php get_header(); ?>
<main id="content">

  <!-- On crée le DOM de la section Wiki movies. -->
    <section id="contact" class="contact content-section">
      <div class="container container--small">
        <h1 class="page-title section-title section-title--primary"><?php _e('Contactez-nous !','wiki-university'); ?></h2>
        <div class="wysiwyg">
          <?php the_content(); ?>
        </div>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
      </div>
  </section>
  <!-- Fin .wiki-movies__container -->

</main>
<?php get_footer(); ?>
