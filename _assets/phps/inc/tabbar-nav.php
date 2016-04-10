<aside class="left-off-canvas-menu">
     <?php wp_nav_menu( array(
                'menu_id'=>'primary',
                'menu_class'=>'off-canvas-list',
                'container' =>'section',           
                'walker' => new fp4_walker_nav_menu,
                'depth'=>'0',
                'theme_location' => 'primary')); ?>
    </aside>
    <!-- <aside class="right-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Users</label></li>
        <li><a href="#">Hari Seldon</a></li>
        <li><a href="#">...</a></li>
      </ul>
      <div class="widget">
        
      </div>
    </aside> -->