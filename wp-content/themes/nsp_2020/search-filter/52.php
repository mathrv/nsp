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

	<div class="list-events">
	<?php
		while ($query->have_posts())
		{
			$query->the_post();
			$jours = get_the_terms(get_the_id(), 'events_jour')[0];
			$cat = get_the_terms(get_the_id(), 'event_cat')[0];
			?>
			<div class="list-events-element page-events">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/<?= $cat->name ?>.png">
					<div>
						<p class="list-events-element-title"><?php the_title(); ?></p>
						<p class="events-day"><?php echo $jours->name; ?></p>
					</div>
				</a>
			</div>
			<?php
		}
	?>
	</div>
<?php
}
?>