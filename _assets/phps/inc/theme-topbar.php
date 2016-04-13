
	<nav data-sticky-container>
		<div data-sticky data-margin-top='0' style="width:100%" data-top-anchor="1" data-btm-anchor="content:bottom">
			<div class="hide-for-small-only row">
				<div class="medium-offset-8 medium-4 columns">
					<?php wp_nav_menu( array(
								'container' =>fales,					 
								'walker' => new Topbar_Menu_Walker,
								'items_wrap' => '<ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown" data-parent-link="true">%3$s</ul>',
								'fallback_cb' => '',
								'depth'=>'0',
								'theme_location' => 'secondary')); ?>
				</div>
			</div>
			<div class="top-bar">
			  <div class="row">
			  	<div class="top-bar-title">
			  	  <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
			  	    <button class="menu-icon dark" type="button" data-toggle></button>
			  	  </span>
			  	  <div class="site-branding">
	  					<?php foundation_6_the_custom_logo(); ?>

	  					<?php if ( is_front_page() && is_home() ) : ?>
	  						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	  					<?php else : ?>
	  						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	  					<?php endif;

	  					$description = get_bloginfo( 'description', 'display' );
	  					if ( $description || is_customize_preview() ) : ?>
	  						<p class="site-description"><?php echo $description; ?></p>
	  					<?php endif; ?>
	  	    	  	</div><!-- .site-branding -->
			  	</div>
			  	<div id="responsive-menu">
			  	  <div class="top-bar-right">
			  	  	<?php //wpforge_top_nav(); 
			  					 wp_nav_menu(array(
			  					 	'theme_location' => 'primary',
			  				        'container' => false,
			  				        'depth' => 0,
			  				        'items_wrap' => '<ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>',
			  				        'fallback_cb' => '',
			  				        'walker' => new Topbar_Menu_Walker()
			  				    ));
			  	  	?>	
			  	  </div>
			  	 <!--  <div class="top-bar-right">
			  	    <ul class="menu">
			  	      <li><input type="search" placeholder="Search"></li>
			  	      <li><button type="button" class="button">Search</button></li>
			  	    </ul>
			  	  </div> -->
			  	</div>
			  </div>
			</div>
		</div>
	</nav>