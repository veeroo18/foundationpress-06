<div>
	<nav class="tab-bar">
	   	<section class="left tab-bar-section">
	  			<div class="large-4 medium-6 small-6 columns p0">
	  				<h1>
	  					<a href="<?php echo home_url(); ?>">
	  						<img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg"/>
	  						<?php //bloginfo('name')?>
	  					</a>
	  				</h1>
	  			</div>
	  			<div class="large-8 medium-6 hide-for-small columns p0">
	  			<?php wp_nav_menu( array(
	  					'menu_id'=>'footer-nav',
	  					'menu_class'=>'sub-nav',
	  					'container' =>'ul',					 
	  					'walker' => new fp4_walker_nav_menu,
	  					'container_class' =>'footer-nav',
	  					'depth'=>'0',
	  					'theme_location' => 'menu-footer')); ?></div>
	  	</section>
	  	<section class="right-small">
	  				<a class="right-off-canvas-toggle menu-icon" ><span></span></a>
	  	</section>
	</nav>
</div>
 <aside class="right-off-canvas-menu">
 	<?php //get_search_form( $echo );?>
 	<?php wp_nav_menu( array(
 		'menu_id'=>'main-nav',
 		'menu_class'=>'off-canvas-list',
 		'container' =>'aside',					 
 		'walker' => new fp4_walker_nav_menu,
 		'container_class' =>'left-off-canvas-menu',
 		'depth'=>'0',
 		'theme_location' => 'menu-head')); ?>
 </aside>