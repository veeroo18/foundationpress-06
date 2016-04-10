<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
<aside>
     <?php wp_nav_menu( array(
                'menu_id'=>'primary',
                'menu_class'=>'off-canvas-list',
                'container' =>'section',           
                'walker' => new Off_Canvas_Menu_Walker,
                'depth'=>'0',
                'theme_location' => 'primary')); ?>
</aside>
</div>