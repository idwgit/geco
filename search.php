<?php
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action ('genesis_header','genesis_do_header');
remove_action ('genesis_after_header','genesis_do_nav');
add_action('genesis_header','txcosheader' );
add_action ('genesis_header','genesis_do_nav');
add_action('genesis_before' , 'headline' );
function headline() {
	echo'<div id="headline"></div>';
}
function txcosheader()
{?>
	<a href="/"><img id="txcoslogo" src="<?php bloginfo(stylesheet_directory);?>/images/txcoslogo.png"></a>
<?php }
remove_action ('genesis_footer' , 'genesis_do_footer');
add_action ('genesis_footer' , 'txcos_footer');
function txcos_footer() {?>
    <div id="footer-icons">
      <a href="http://www.flower-mound.com"><img src="<?php bloginfo(stylesheet_directory);?>/images/flower_mound_community.png"></a>
      <a href="http://www.flowermoundchamber.com"><img src="<?php bloginfo(stylesheet_directory);?>/images/flower_mound_chamber_button.png"></a>
      <a href="http://business.grapevinechamber.org/list/QL/sports-recreation-24.htm"><img src="<?php bloginfo(stylesheet_directory);?>/images/grapevine_chamber_button.png"></a>
    </div>
    <div id="txcos-footer">
    <div itemscope itemtype="http://schema.org/Dentist">
       <span itemprop="name">Texas Center for Occlusal Studies</span>
       <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
         <span itemprop="streetAddress">6011 Morris Rd.</span>
         <span itemprop="addressLocality">Flower Mound</span>,
         <span itemprop="addressRegion">Tx.</span>
         <span itemprop="postalCode">75028</span>
       </div>
       Phone: <span itemprop="telephone">855 539-4040</span><br>
       <a href="https://maps.google.com/maps?q=6011+Morris+Court,+Flower+Mound,+TX&hl=en&sll=33.295215,-111.763962&sspn=0.575083,1.203003&oq=6011+Morris+Rd.+Flower&t=h&hnear=Morris+Ct,+Flower+Mound,+Denton,+Texas+75028&z=17" itemprop="maps">URL of Map</a> 
       <p>Website by <a href="http://infinitydentalweb.com">Infinity Dental Web</a>
    </div>
	</div>
<?php }
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

add_action( 'genesis_before_loop', 'genesis_do_search_title' );
/**
 * Echo the title with the search term.
 *
 * @since 1.9.0
 */
function genesis_do_search_title() {

  $title = sprintf( '<div class="archive-description"><h1 class="archive-title">%s %s</h1></div>', apply_filters( 'genesis_search_title_text', __( 'Search Results for:', 'genesis' ) ), get_search_query() );

  echo apply_filters( 'genesis_search_title_output', $title ) . "\n";

}

genesis();