<div class="contain-to-grid sticky greenline">
	<div class="hide-for-small-only row">
		<div class="medium-7 columns p0">
			<a href="<?php echo home_url();?>"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""></a>
		</div>
		<div class="columns medium-5">
			<?php wp_nav_menu( array(
						'menu_id'=>'secondary',
						'menu_class'=>'right',
						'container' =>'div',					 
						'walker' => new Topbar_Menu_Walker,
						'container_class' =>'top-bar-section',
						'depth'=>'0',
						'theme_location' => 'secondary')); ?>
		</div>
	</div>
	<nav id="navigation" class="top-bar" data-topbar>
			<div class="show-for-small-only"> 
				<ul class="title-area">
					<!-- Title Area --> 
					<li class="name">
						<h1>
							<a href=" <?php echo home_url(); ?> ">
								<img class="svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/small-logo.png" />							
								<?php bloginfo('name')?>
							</a>
							
						</h1>
					</li>
					<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
				</ul>	
			</div>
			<section class="top-bar-section">
					<?php wp_nav_menu( array(
						'menu_id'=>'primary',
						'menu_class'=>'left',
						'container' =>'section',					 
						'walker' => new Topbar_Menu_Walker,
						'container_class' =>'top-bar-section',
						'depth'=>'0',
						'theme_location' => 'primary')); ?>					
			</section>
		</nav>
</div>
<!-- #masthead -->