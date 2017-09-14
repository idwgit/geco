<?php
/*
  Template Name:  Home Page
*/

remove_action ('genesis_header','genesis_do_header');
remove_action ('genesis_after_header','genesis_do_nav');
add_action('genesis_header','regionheader' );
//add_action ('genesis_header','genesis_do_nav');

function regionheader()
{?>
<div>
    <div class="sticky-menu">
        <div class="wrap">
            <a id="regionlogo" href="<?php bloginfo( 'url' ); ?>"><img id="regionlogo" src="<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/geco-logo.png" alt="<?php bloginfo('name')?>" title="<?php bloginfo('name')?>" /></a>
            <?php genesis_do_nav();?>
            <a href="#" id="fb-button"><img src="<?php bloginfo('stylesheet_directory');?>/images/geco-fb.png"></a>
        </div>
    </div>

    <div class="hero-text animated fadeIn">
       <div class="hero-title">Dentistry with a<br />Gentle Touch</div>
       <a href="/make-an-appointment/"><button>Request an appointment</button></a>
    </div>
</div>

<?php }

add_action("genesis_after_header", "home_slider");

function home_slider(){ ?>
	<div id="sliderwrap">
		<div class="sliderbar">
				<div class="call">
                    <div class="phone-num">
                        <div class="phone-icon"><img src="<?php bloginfo(stylesheet_directory);?>/images/phone-icon.png" alt=""></div>
                        <div class="phone-text">New Patients Please Call: (918) 742-5521</div>

                    </div>
                    <div class="phone-num">
                        <div class="phone-icon"><img src="<?php bloginfo(stylesheet_directory);?>/images/phone-icon.png" alt=""></div>
                        <div class="phone-text">Existing Patients Please Call: (918) 742-5521</div>
                    </div>
                </div>
		</div>
	</div>
<?php }
echo get_browser_name($_SERVER['HTTP_USER_AGENT']);

genesis();
