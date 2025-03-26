<?php
/*
Plugin Name: WooCommerce Abandoned Cart Emails cart page
Description: Sends email to users who abandon their cart in WooCommerce.
Version: 1.0
Author: Your Name
Author URI: http://yourwebsite.com
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Schedule the events
add_action('init', 'wace_schedule_abandoned_cart_events');
function wace_schedule_abandoned_cart_events() {
    if (!wp_next_scheduled('wace_check_abandoned_carts')) {
        wp_schedule_event(time(), 'hourly', 'wace_check_abandoned_carts');
    }
}

// Hook into the scheduled event
add_action('wace_check_abandoned_carts', 'wace_process_abandoned_carts');
function wace_process_abandoned_carts() {
    global $wpdb;

    $cutoff_time_12hrs = current_time('timestamp') - 1 * HOUR_IN_SECONDS;
    $cutoff_time_72hrs = current_time('timestamp') - 72 * HOUR_IN_SECONDS;

    // Query for carts abandoned more than 12 hours ago
    $query_12hrs = "SELECT session_id FROM {$wpdb->prefix}woocommerce_sessions WHERE last_active < %d";
    $results_12hrs = $wpdb->get_results($wpdb->prepare($query_12hrs, $cutoff_time_12hrs));

    foreach ($results_12hrs as $result) {
        $session_data = get_option('_woocommerce_persistent_cart_' . $result->session_id);
        if ($session_data && !get_post_meta($result->session_id, '_wace_12hr_email_sent', true)) {
            wace_send_abandoned_cart_email($session_data, 12);
            update_post_meta($result->session_id, '_wace_12hr_email_sent', 'yes');
        }
    }

    // Query for carts abandoned more than 72 hours ago
    $query_72hrs = "SELECT session_id FROM {$wpdb->prefix}woocommerce_sessions WHERE last_active < %d";
    $results_72hrs = $wpdb->get_results($wpdb->prepare($query_72hrs, $cutoff_time_72hrs));

    foreach ($results_72hrs as $result) {
        $session_data = get_option('_woocommerce_persistent_cart_' . $result->session_id);
        if ($session_data && !get_post_meta($result->session_id, '_wace_72hr_email_sent', true)) {
            wace_send_abandoned_cart_email($session_data, 72);
            update_post_meta($result->session_id, '_wace_72hr_email_sent', 'yes');
        }
    }
}

function wace_send_abandoned_cart_email($session_data, $hours) {
    $cart = $session_data['cart'];
    $user_email = $session_data['user']['email'];

    // Prepare email content
    $subject = 'You left items in your cart!';
    $message = 'Hello, <br><br>We noticed that you left some items in your cart. Please come back and complete your purchase!<br><br>';

    foreach ($cart as $cart_item) {
        $product = wc_get_product($cart_item['product_id']);
        $message .= $product->get_name() . '<br>';
    }

    $message .= '<br>Thank you!';

    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail($user_email, $subject, $message, $headers);
}

// Unschedule the events on plugin deactivation
register_deactivation_hook(__FILE__, 'wace_unschedule_abandoned_cart_events');
function wace_unschedule_abandoned_cart_events() {
    $timestamp = wp_next_scheduled('wace_check_abandoned_carts');
    wp_unschedule_event($timestamp, 'wace_check_abandoned_carts');
}
