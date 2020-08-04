<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>

	<div class="list-participants">
	<?php
		while ($query->have_posts())
		{
			$query->the_post();
			
			?>
			<div class="list-participants-element">
					<?php 
						if ( has_post_thumbnail() ) {
							echo '<p class="list-participants-element-logo">';
							the_post_thumbnail("small");
							echo '</p>';
						}
					?>
					<div class="nsp-list-element-content">
						<?php $participant=get_fields(get_the_ID()); ?>
						<h5><?php the_title(); ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/unfold.png"></h5>
						<?php if(isset($participant['attendee_website']) && !empty($participant['attendee_website'])): ?>
								<a href="<?= $participant['attendee_website']; ?>" class="f-primary"><?= $participant['attendee_website']; ?></a>
						<?php elseif(isset($participant['attendee_fb']) && !empty($participant['attendee_fb'])): ?>
								<a href="<?= $participant['attendee_fb']; ?>" class="f-primary"><?= $participant['attendee_fb']; ?></a>
						<?php endif; ?>
					</div>
			</div>
			<?php
		}
	?>
	</div>
<?php
}
?>