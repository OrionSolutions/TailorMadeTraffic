<?php if ( has_nav_menu('main_menu') ) { ?>
<div class="three-fourth last">
	<div class="nav-container">

		<?php wp_nav_menu( array(
        	'theme_location' => 'main_menu',
        	'container' => 'false',
        	'items_wrap' => '<ul class="main-menu">%3$s</ul>',
        )); ?>
        <div class="clear"></div>
	</div>
</div>
<?php } ?>