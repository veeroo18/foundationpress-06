<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
	<ul class="orbit-container">
	<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$args = array(   
		'post_type' => 'attachment',
		'numberposts' => 3,   
		'post_status' => null,   
		'post_parent' => $post->ID  );  
	
	$imgId = 00;  $attachments = get_posts( $args );     
		if ( $attachments ) {
		   foreach ( $attachments as $attachment ) { 
		          $thumb_id = $attachment->ID;		
		          $url = wp_get_attachment_image_src($thumb_id,'full', true);?>
		          	<li>
		          		<img src="<?php echo $url;?>" alt=""/>
		          	</li>			
	  	<?php }   
	  	}endwhile; endif; ?>
	</ul>
</div>