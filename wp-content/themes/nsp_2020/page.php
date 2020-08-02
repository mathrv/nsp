<?php get_header(); ?>

<main id="content">
  <div class="nsp-background">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="nsp-background-content">
        <?php 
          the_content()
        ?>
      </div>
  </div>

</main>
<?php get_footer(); ?>
