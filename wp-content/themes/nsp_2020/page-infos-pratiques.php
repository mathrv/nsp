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
	<div class="nsp-background page-info">
		<?php
			$page = get_page_by_path( 'info-pratiques' );
			$InfoPost = get_post();
		?>

  			<div class="page-info-block">
				<h1 class="page-title"><?= get_the_title( $page ); ?></h1>
				<div class="nsp-background-content">
					<?= apply_filters( 'the_content', $InfoPost->post_content ); ?>
				</div>
			</div>
			<?php
				if ($q->have_posts()):
					$aFaq = $q->posts;
			?>
				<div class="page-info-block">
					<h1 class="page-title">FAQ</h1>
					<?php foreach ($aFaq as $faq): ?>
						<div class="faq">
							<h4 class="faq-title"><?= get_the_title($faq->ID); ?> <img src="<?php echo get_stylesheet_directory_uri();?>/img/arrow.png"></h2>				
							<p class="faq-content">
								<?= $faq->post_content ?>
							</p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</main>

<script>
    jQuery(document).ready(function($) {
		$('.faq-title').click(function() {
			$(this).toggleClass('is-expend');
			$(this).siblings('.faq-content').toggleClass('is-open');
		});
	});
</script>
<?php get_footer(); ?>