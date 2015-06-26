<?php

$evolve_themename = "evolve";

if ( get_stylesheet_directory() == get_template_directory() ) {
	define('EVOLVE_URL', get_template_directory() . '/library/functions/');
	define('EVOLVE_DIRECTORY', get_template_directory_uri() . '/library/functions/');
} else {
	define('EVOLVE_URL', get_template_directory() . '/library/functions/');
	define('EVOLVE_DIRECTORY', get_template_directory_uri() . '/library/functions/');
}

get_template_part( 'library/functions/options-framework' );
get_template_part( 'library/functions/basic-functions' ); 
get_template_part( 'library/functions/options' );



// Hide ALL shipping options when free shipping is available
add_filter( 'woocommerce_available_shipping_methods', 'hide_all_shipping_when_free_is_available' , 10, 1 );
 
/**
* Hide ALL Shipping option when free shipping is available
*
* @param array $available_methods
*/
function hide_all_shipping_when_free_is_available( $available_methods ) {
 
        if( isset( $available_methods['free_shipping'] ) ) :
 
                // Get Free Shipping array into a new array
                $freeshipping = array();
                $freeshipping = $available_methods['free_shipping'];
 
                // Empty the $available_methods array
                unset( $available_methods );
 
                // Add Free Shipping back into $avaialble_methods
                $available_methods = array();
                $available_methods[] = $freeshipping;
 
        endif;
 
        return $available_methods;
}
?>