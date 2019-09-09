<?php get_header(); ?>

<main id="content">
  <div class="nsp-background">
    <div class="nsp-background-logo">
      <h1 class="f-primary f-light"><?php the_title(); ?></h1>
      <div class="nsp-background-content">
        <div class="wysiwyg">
          <?php the_content(); ?>
        </div>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
      </div>
    </div>
  </div>

</main>
<?php get_footer(); ?>