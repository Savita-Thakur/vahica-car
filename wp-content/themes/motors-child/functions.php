<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
// END ENQUEUE PARENT ACTION

function load_scripts() {

	wp_enqueue_style( 'bundle-style', get_stylesheet_directory_uri() . '/style.css', array() );


}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function remove_menu_items(){
   remove_menu_page( 'edit.php?post_type=campervans' );
	remove_menu_page( 'edit.php?post_type=motorhomes' );
	remove_menu_page( 'edit.php?post_type=station-wagons' );
	remove_menu_page( 'edit.php?post_type=small-cars' );
	remove_menu_page( 'edit.php?post_type=caravans' );
   
}
add_action( 'admin_menu', 'remove_menu_items', 999 );

add_action( 'template_redirect', 'redirect_if_user_not_logged_in' );

function redirect_if_user_not_logged_in() {

	if ( is_page('1755') && ! is_user_logged_in() ) { //example can be is_page(23) where 23 is page ID

		wp_redirect( 'https://travelcarsnz.com/register/ '); 
 
     exit;// never forget this exit since its very important for the wp_redirect() to have the exit / die
   
   }
   
}

/**
 * Get the author's email address from the author meta info.
 */

function cf7_get_author_email($atts){
    $value = '';

    if(get_the_author_meta( 'user_email' )) {
        $value = get_the_author_meta( 'user_email' );
    }

    return $value;
 }

 add_shortcode('CF7_AUTHOR_EMAIL', 'cf7_get_author_email');
 
 // hide update notifications
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes



// Billing and shipping addresses fields
add_filter( 'woocommerce_default_address_fields' , 'filter_default_address_fields', 20, 1 );
function filter_default_address_fields( $address_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $address_fields;

    // All field keys in this array
    $key_fields = array('country','first_name','last_name','company','address_1','address_2','city','state','postcode');

    // Loop through each address fields (billing and shipping)
    foreach( $key_fields as $key_field )
        $address_fields[$key_field]['required'] = false;

    return $address_fields;
}



// For billing email and phone - Make them not required
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $billing_fields;

    $billing_fields['billing_phone']['required'] = false;
    $billing_fields['billing_email']['required'] = false;
    return $billing_fields;
}


function my_scripts_method() {
wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/js/custom.js',
    array( 'jquery' )
 );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


function redirect_to_addcar() {
    $who = strtolower(sanitize_user($_POST['log']));
    $redirect_to = get_option('home') . '/add-car?' . $who;
    return $redirect_to;
}
add_filter('login_redirect', 'redirect_to_addcar');

add_filter( 'registration_redirect', 'my_redirection' );
function my_redirection( $registration_redirect ) {
	return home_url( '/add-car' );
}


function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

