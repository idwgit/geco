<?php 
function load_sidr_script()
{
	wp_register_script( 'sidr-script', CHILD_URL . '/mobilenav/js/sidr/jquery.sidr.min.js' );

	wp_enqueue_script( 'sidr-script' );
}
add_action( 'wp_enqueue_scripts', 'load_sidr_script' );
function load_superfish_script()
{
    wp_register_script( 'superfish-script', CHILD_URL . '/mobilenav/js/superfish.js' );

    wp_enqueue_script( 'superfish-script' );
}
add_action('wp_enqueue_scripts' , 'load_superfish_script' );
function load_sidr_style_sheet() {

	wp_enqueue_style( 'sidr-stylesheet', CHILD_URL . '/mobilenav/js/sidr/jquery.sidr.light.css' );

}
add_action('wp_enqueue_scripts' , 'load_sidr_style_sheet' );
function load_mobilenav_style_sheet() {

	wp_enqueue_style( 'mobilenav-stylesheet', CHILD_URL . '/mobilenav/mobilenav.css' );

}
add_action( 'wp_enqueue_scripts', 'load_mobilenav_style_sheet' );

function initmobilenav () {?>
<script type="text/javascript">
	jQuery(document).ready(function($){

$('#mobile-menu').sidr({
      name: 'sidr-main',
      source: '.nav-primary'
    });

$( "#sidr-page" ).click(function() {
       $.sidr('close', 'sidr-main');
});$(window).resize(function () {	if ($(window).width() > 1139) {		$.sidr('close', 'sidr-main');	}});	
 $(".sidr-class-menu li a").each(function() {
        if ($(this).next().length > 0) {
            $(this).addClass("parent");
        };
    })

$(".sidr-class-menu li a.parent").click(function(e) {
	e.preventDefault();
	$(this).parent("li").toggleClass('hover');
});
jQuery('ul.sf-menu').superfish();
});
</script>
<?php
}
add_action ('wp_footer' , 'initmobilenav');
add_action('genesis_before','mobile_nav');

function mobile_nav() {?>
        <div id="sidr-page">
            <nav id="navbar" class="navbar">
                <ul class="sf-menu">
                    <li><a href="#sidr-main" id="mobile-menu" class="navbar-icon idw-menu">
                        <span class="navbar-btn-inner">
                            <img src="<?php bloginfo('stylesheet_directory');?>/mobilenav/images/idw-menu.png"/>
                            <i>Menu</i>
                        </span></a>
                    </li> 
                    <li><a href="tel:8555394040" class="navbar-icon idw-call">
                        <span class="navbar-btn-inner">
                            <img src="<?php bloginfo('stylesheet_directory');?>/mobilenav/images/idw-call.png"/>
                            <i>Call</i>
                        </span></a>
                    </li>
                    <li><a href="http://texascenterforocclusalstudies.com/event-registration/" target="_blank" class="navbar-icon idw-facebook">
                        <span class="navbar-btn-inner">
                            <img src="<?php bloginfo('stylesheet_directory');?>/mobilenav/images/idw-register.png" alt="Register for Class"/>
                            <i>Register</i>
                        </span></a>
                    </li>
                    <li><a href="/rejuvenationconversation/" target="_blank" class="navbar-icon idw-blog">
                        <span class="navbar-btn-inner">
                            <img src="<?php bloginfo('stylesheet_directory');?>/mobilenav/images/idw-blog.png"/>
                            <i>Map</i>
                        </span></a>
                    </li>
                    <li><a href="#" class="navbar-icon idw-reviews">
                        <span class="navbar-btn-inner">
                            <img src="<?php bloginfo('stylesheet_directory');?>/mobilenav/images/idw-reviews.png"/>
                            <i>Reviews</i>
                        </span></a>
                        
                        <ul class="pureCssMenum">
                          <!--  <li class="pureCssMenui"><a class="pureCssMenui" href="https://plus.google.com/106147048154860002555/about?gl=us&hl=en" target="_blank">Google</a></li>
                            <li class="pureCssMenui"><a class="pureCssMenui" href="http://www.yelp.com/biz/infinity-dental-web-mesa-2" target="_blank">Yelp</a></li>
                            <li class="pureCssMenui"><a class="pureCssMenui" href="http://local.yahoo.com/info-51843083-infinity-dental-web-mesa" target="_blank">Yahoo!</a></li>-->
                        </ul>
                       
                    </li>
                </ul>
            </nav>
        </div><?php }