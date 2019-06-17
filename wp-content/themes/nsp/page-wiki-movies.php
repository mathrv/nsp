<?php get_header(); ?>
<main id="content">

<!-- On recupère toutes les vidéos. -->
<?php
  $q = new WP_Query(
    [
      'post_type'      => 'videos',
      'posts_per_page' => -1
    ]
  );
  $aVideos = [];
?>

<!-- Si on a des vidéos -->
<?php
  if ($q->have_posts()):
    $aVideos = $q->posts;
    ?>

    <!-- On crée le DOM de la section Wiki movies. -->
    <section id="wiki-movies" class="wiki-movies__list-container content-section">
      <div class="container">
        <h1 class="page-title section-title section-title--wiki-movies"><?php _e('Wiki Movies','wiki-university'); ?></h2>

        <div class="wiki-movies__list-container">

          <!-- On crée une slide pour chaque vidéo. -->
          <?php foreach ($aVideos as $video): ?>

            <!-- On récupère les champs spécifiques (ACF) aux vidéos. -->
            <?php $videoFields = get_fields($video->ID); ?>
            <article class="wiki-movies__video wiki-movies__video--list-item">

                <!-- On crée le lien externe vers la vidéo Youtube -->
              <a href="<?php echo $videoFields['lien_youtube']; ?>" class="wiki-movies__video-link" target="_blank">
                <div class="wiki-movies__video-thumbnail-container">

                    <!-- On récupère la thumbnail de la vidéo. -->
                    <?php echo get_the_post_thumbnail($video->ID, 'large'); ?>
                </div>

                  <!-- On affiche le titre de la vidéo -->
                <h3 class="wiki-movies__video-title"><?php echo get_the_title($video->ID); ?></h3>
              </a>
            </article>
            <!-- Fin .wiki-movies__video -->
          <?php endforeach; ?>
        </div>
      </div>
  </section>
  <!-- Fin .wiki-movies__container -->

<?php endif; ?>
</main>
<?php get_footer(); ?>
