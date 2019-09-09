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

	<div class="nsp-list">
	<?php
		while ($query->have_posts())
		{
			$query->the_post();
			
			?>
			<a href="<?php the_permalink(); ?>">
			<div class="nsp-list-element">
				<a href="<?php the_permalink(); ?>">
					<?php 
						if ( has_post_thumbnail() ) {
							echo '<p class="nsp-list-element-logo">';
							the_post_thumbnail("small");
							echo '</p>';
						}
					?>
					<a href="<?php the_permalink(); ?>" class="btn btn-pink">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nsp/arrow-pink.svg">
					</a>
					<a href="<?php the_permalink(); ?>">
						<div class="nsp-list-element-content">
							<p><?php the_title(); ?></p>
						</div>
					</a>
				</a>

			</div>
		</a>
			<?php
		}
	?>
	</div>
<?php
}
?>

<?php if ( !$query->have_posts() )
{
	?>
	<div class="no-article f-lemon f-primary">Pas de pression, ça arrive bientôt...</div>
<?php
}
?>