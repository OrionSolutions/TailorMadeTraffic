<?php if( is_active_sidebar(1) || is_active_sidebar(2) || is_active_sidebar(3) || is_active_sidebar(4) ){ ?>
<div class="footer-sidebar">

	<div class="one-fourth first">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) :  endif; ?>
	</div>

	<div class="one-fourth">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) :  endif; ?>
	</div>

	<div class="one-fourth">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) :  endif; ?>
	</div>

	<div class="one-fourth last">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) ) :  endif; ?>
	</div>

<div class="clear"></div>
</div>
<?php }else{ ?>
	<div class="spacing-20"></div>
<?php } ?>