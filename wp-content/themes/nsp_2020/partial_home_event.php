<?php 
	$evenements = array( 'post_type' => 'events');
	$evenements['tax_query']=array(
																array('taxonomy'=>'events_jour',
																			'field' => 'slug',
																			'terms'=> $slug
																		)
															);

	$evenements_loop = new WP_Query($evenements);
	while ( $evenements_loop->have_posts() ) {
		$evenements_loop->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
?>