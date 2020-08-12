<?php 
	$evenements = array('post_type' => 'events', 'posts_per_page' => 4, 'orderby' => 'rand');
	$evenements['tax_query']=array(
																array('taxonomy'=>'events_jour',
																			'field' => 'slug',
																			'terms'=> $slug
																		)
															);

	$evenements_loop = new WP_Query($evenements);
	while ( $evenements_loop->have_posts() ) {
		$evenements_loop->the_post();
		$fields = get_fields(get_the_ID());   
?>
	<div class="list-events-element">
		<h5><?= get_the_title() ?></h5>
		<?= $fields['event_start_hour'] ?> - <?= $fields['event_place'] ?>
	</div>	
<?php
	}
?>