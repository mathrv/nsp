<?php get_header(); ?>
<?php
  $q = new WP_Query(
    [
      'post_type'      => 'faq',
      'posts_per_page' => -1,
      'order'		   => 'ASC',
    ]
  );
  $aFaq = [];
?>

<main id="content">
<?php
  if ($q->have_posts()):
    $aFaq = $q->posts;
?>
	<div class="nsp-background">
		<div class="nsp-background-logo">
			<h1 class="f-primary f-light">FAQ</h1>
			<div class="nsp-background-content">
				<?php foreach ($aFaq as $faq): ?>
					<div class="faq">
						<h2 class="f-bold f-secondary"><?php echo get_the_title($faq->ID); ?></h2>				
	 					<p class="f-primary">
	 						<?php echo $faq->post_content ?>
	 					</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>


<?php endif; ?>
</main>
<?php get_footer(); ?>