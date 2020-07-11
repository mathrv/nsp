<?php get_header(); ?>

<main id="content">
  <div class="nsp-background">
    <div class="nsp-background-logo">
      <h1 class="f-primary f-light"><?php the_title(); ?></h1>
      <div class="nsp-background-content">
        <?php 
          $MentionsLegalescontent = apply_filters('the_content', get_post_field('post_content', 138));
          echo $MentionsLegalescontent;
        ?>
      </div>
    </div>
  </div>

</main>
<?php get_footer(); ?>