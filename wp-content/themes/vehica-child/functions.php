<?php
    
    add_action('wp_enqueue_scripts', static function () {
        $deps = [];
        
        if (class_exists(\Elementor\Plugin::class)) {
            $deps[] = 'elementor-frontend';
        }
        
        wp_enqueue_style('vehica', get_template_directory_uri() . '/style.css', $deps, VEHICA_VERSION);
        wp_enqueue_style('vehica-child', get_stylesheet_directory_uri() . '/style.css', ['vehica']);
    });
    
    add_action('after_setup_theme', static function () {
        load_child_theme_textdomain('vehica', get_stylesheet_directory() . '/languages');
    });
    
    /*
         * Footer Scripts
         */
    if (!function_exists('tra_foolter_scripts')) {
        function tra_foolter_scripts()
        {
            ?>
            <script>
                $ = jQuery;
                $(function () {
                        if ($('.page-id-12758').length) {
                            // Select the target node
                            const targetNode = document;
                            // Callback function to execute when changes are observed
                            const callback = function (mutationsList, observer) {
                                    for (const mutation of mutationsList) {
                                        if (mutation.type === 'childList') {
                                            if ($('.swal2-container').length) {
                                                let title = $('.swal2-container .swal2-title').text();
                                                if (title === 'Your payment has been processed') {

                                                    let key = $('.vehica-packages div:first-child').find('.vehica-package--active').data('id');
                                                    $(".user-packages>div").each(function (i) {
                                                        let _key = $(this).find('.current-plan').text();
                                                        if (_key === key) {
                                                            $(this).find('.vehica-package--owned').trigger('click');
                                                        }
                                                    });

                                                    $('.swal2-container .swal2-title').text('');
                                                    // $('.vehica-car-form__switcher input').prop('checked', true);
                                                    $('.vehica-car-form__save-submit .vehica-button').trigger('click');
                                                    $('.vehica-packages').trigger('click');
                                                    $('.swal2-container .swal2-confirm').trigger('click');
                                                    $('#vehica-select-package').addClass('vehica-select-package-disabled');
                                                    setTimeout(function () {
                                                        $('#vehica-select-package').removeClass('vehica-select-package-disabled');
                                                    }, 5000);
                                                }
                                            }
                                        }
                                    }
                                }
                            ;
                            // Create an observer instance linked to the callback function
                            const observer = new MutationObserver(callback);
                            // Options for the observer (which mutations to observe)
                            const config = {attributes: true, childList: true, subtree: true};
                            // Start observing the target node for configured mutations
                            observer.observe(targetNode, config);
                        }
                    }
                )
            </script>
            <?php
        }
        
        add_action('wp_footer', 'tra_foolter_scripts');
    }
    
    /*
         * Post author
         */
    if (!function_exists('tra_post_author_shortcode')) {
        function tra_post_author_shortcode($attr = [], $content = '')
        {
            ob_start();
            if (is_singular('post')) {
                $defaults = [
                    'author_title' => '',
                    'author_link' => '',
                    'author_image' => '',
                    'facebook' => '',
                    'instagram' => '',
                    'linkedin' => '',
                ];
                extract(shortcode_atts($defaults, $attr));
                $author_id = get_the_author_meta('ID');
                $author_name = empty($author_title) ? get_the_author_meta('display_name') : $author_title;
                $avatar_url = get_avatar_url($author_id);
                // Get the author's description
                $author_description = empty($content) ? get_the_author_meta('description', $author_id) : $content;
                $author_url = empty($author_link) ? get_author_posts_url($author_id) : $author_link;
                ?>
                <div class="tra-post-author">
                    <div class="post-author-avatar">
                        <a href="<?php echo $author_url; ?>">
                            <?php
                                $image_url = $author_image;
                                if (empty($image_url)) {
                                    $vehica_image = get_user_meta($author_id, 'vehica_image');
                                    if (!empty($vehica_image)) {
                                        $image_id = current($vehica_image);
                                        $image_url = wp_get_attachment_image_src($image_id, 'thumbnail')[0];
                                    }
                                }
                                if (!empty($image_url)) {
                                    ?>
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $author_name; ?>" class="author-avatar"/>
                                    <?php
                                }
                            ?>
                        </a>
                        <div class="social-icons">
                            <?php if (!empty($facebook)) {
                                ?>
                                <a target="_blank" href="<?php echo esc_url($facebook); ?>">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <?php
                            }
                                if (!empty($instagram)) {
                                    ?>
                                    <a target="_blank" href="<?php echo esc_url($instagram); ?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php }
                                if (!empty($linkedin)) {
                                    ?>
                                    <a target="_blank" href="<?php echo esc_url($linkedin); ?>">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="post-author-description">
                        <h3 class="author-title">
                            <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                        </h3>
                        <?php echo wpautop($author_description); ?>
                    </div>
                </div>
                <?php
            }
            return ob_get_clean();
        }
        
        add_shortcode('tra_post_author', 'tra_post_author_shortcode');
    }
    /*
    * Empty cart on add to cart
    */
   if (!function_exists('tra_remove_cart_item_before_add_to_cart')) {
	function tra_remove_cart_item_before_add_to_cart($passed, $product_id, $quantity) {
		if (!WC()->cart->is_empty() && $passed) {
			WC()->cart->empty_cart();
		}
		
		return $passed;
	}
	 add_filter('woocommerce_add_to_cart_validation', 'tra_remove_cart_item_before_add_to_cart', 99, 3);
   }
   /*
    * Redirect to checkout on add to cart
    */
    if (!function_exists('tra_custom_add_to_cart_redirect')) {
        function tra_custom_add_to_cart_redirect() {
            return wc_get_checkout_url();
        }
        add_filter('woocommerce_add_to_cart_redirect', 'tra_custom_add_to_cart_redirect');
    }
    /*
    * Redirect to checkout on add to cart
    */
    if (!function_exists('tra_redirect_single_product')) {
        function tra_redirect_single_product() {
            if (is_product()) {
                wp_redirect(site_url());
                exit();
            }
        }
        add_action('template_redirect', 'tra_redirect_single_product');
    }
/*
 *
 */
if (!function_exists('tra_remove_woo_checkout_fields')) {

	function tra_remove_woo_checkout_fields( $fields ) {

		// remove billing fields
		unset($fields['billing']['billing_company']);
		unset($fields['billing']['billing_address_1']);
		unset($fields['billing']['billing_address_2']);
		unset($fields['billing']['billing_city']);
		unset($fields['billing']['billing_postcode']);
		unset($fields['billing']['billing_country']);
		unset($fields['billing']['billing_state']);
		unset($fields['billing']['billing_phone']);

		// remove order comment fields
		unset($fields['order']['order_comments']);

		return $fields;
	}
	add_filter( 'woocommerce_checkout_fields' , 'tra_remove_woo_checkout_fields' );
}
    
    function trav_hide_mail($email) {
        // Split the email into parts
        list($name, $domain) = explode('@', $email);
        $domainParts = explode('.', $domain);
        
        // Show only the first and last letter of the name part
        $hiddenName = substr($name, 0, 1) . str_repeat('*', strlen($name) - 2) . substr($name, -1);
        
        // Show only the first and last letter of each part of the domain
        $hiddenDomain = '';
        foreach ($domainParts as $part) {
            $hiddenDomain .= substr($part, 0, 1) . str_repeat('*', strlen($part) - 2) . substr($part, -1) . '.';
        }
        $hiddenDomain = rtrim($hiddenDomain, '.');
        
        // Combine the hidden parts
        return $hiddenName . '@' . $hiddenDomain;
    }