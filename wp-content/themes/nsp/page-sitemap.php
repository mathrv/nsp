<?php get_header(); ?>

<main id="content">
  <div class="nsp-background">
    <div class="nsp-background-logo">
      <h1 class="f-primary f-light"><?php the_title(); ?></h1>
      <div class="nsp-background-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

</main>
<?php get_footer(); ?>