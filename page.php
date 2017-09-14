<?php 

remove_action ('genesis_header','genesis_do_header');
remove_action ('genesis_after_header','genesis_do_nav');
add_action('genesis_header','regionheader' );
add_action ('genesis_header','genesis_do_nav');
add_action('genesis_before' , 'headline' );
function headline() {
	echo'<div id="headline"></div>';
}
function regionheader()
{?>
	<a href="/"><img id="regionlogo" src="<?php bloginfo(stylesheet_directory);?>/images/noah-logo.png"></a>
<?php }
remove_action ('genesis_footer' , 'genesis_do_footer');

add_action("genesis_after_header", "inner_head");

function inner_head(){ ?>
	
	<div id="innerheadwrap"><img src="<?php bloginfo(stylesheet_directory);?>/images/inner_head.jpg"></div>

<?php }


genesis();