<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// include 'mobilenav/mobilenav.php';

function login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/idw_logo_wp_admin.jpg);
            width: 320px;
            height: 80px;
            background-size: 320px 80px;
        }
    </style>
   <?php }
add_action( 'login_enqueue_scripts', 'login_logo' );
function put_my_url(){
    return ('http://www.infinitydentalweb.com/');
    }
add_filter('login_headerurl', 'put_my_url');

function put_my_title(){
    return ('Powered by Infinity Dental Web CMS');
    }
add_filter('login_headertitle', 'put_my_title');



remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action('genesis_after_header' , 'genesis_do_nav' );
remove_action ('genesis_footer' , 'genesis_do_footer');
add_action ('genesis_footer' , 'region_footer');
function region_footer() {?>
    <?php  ?>
    <div id="region-footer">
        <?php if(is_front_page()){ genesis_do_subnav(); }?>

        <div class="one-half first rights">
        <p>&copy;<?php echo date('Y'); ?>  Dr. Rebecca Gecovich &bull; All Rights Reserved<br />
</div>

<div class="one-half creds">
	<p>Website Design and SEO by <a href="https://infinitydentalweb.com" target="_blank">Infinity Dental Web<img style="margin-bottom: -5px;" src="https://www.infinitydentalweb.com/wp-content/uploads/2017/06/IDW_LOGO_Flat.png"></a></p>
</div>

        <div class="clearfix"></div>
         <div >
            <span >Dr. Rebecca Gecovich</span>
        <div >
            <span >6789 Ridge Rd. Sutie 306</span>
            <span >Parma</span>,
            <span >OH</span>
            <span >44129</span>
        </div>
        Phone: <span >(440) 845-6420</span><br>
        </div>
      <p style="text-align:center;"><a href="/privacy-policy/">Privacy Policy</a></p>
    </div>
    </div>

<?php }


//-------------------------Appointment Info---------------------------------------
add_action("gform_after_submission_2", "insert_request", 10, 2);
function insert_request($entry, $form){
	$search_term= filter_var($entry['6'], FILTER_SANITIZE_STRING);
	$new_patient = filter_var($entry['13'], FILTER_SANITIZE_STRING);
	$reviews = filter_var($entry['11'], FILTER_SANITIZE_STRING);
	$facebook= filter_var($entry['12'], FILTER_SANITIZE_STRING);
	$client = 64;  //update to match the client


	try {$db = new PDO('mysql:host=localhost;dbname=infinity_idwdata','infinity_idwdata',')S29Bc[q8P');}
	catch(PDOException $e){die('Not Working at the moment.');}
	$statement = $db->prepare("
    INSERT INTO infinity_idwdata.appointment_info (id, client_id, search_term, new_patient, reviews,facebook) VALUES
    (:id, :client, :search_term, :new_patient, :reviews, :facebook)
    ");
	$statement->execute(array(
		"id" => NULL,
		"search_term" => $search_term,
		"new_patient"  => $new_patient,
		"reviews"  => $reviews,
		"facebook" => $facebook,
		"client" => $client
	));
}


function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
}
