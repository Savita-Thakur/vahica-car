<?php // phpcs:disable ?>
<div class="row">

		<div class="col-md-9 col-sm-12 col-xs-12">
			
			<div class="single-listing-car-inner">
				<?php //Title and price
					get_template_part('partials/single-car-listing/car-price-title');
				?>

				<?php //Gallery
					get_template_part('partials/single-car-listing/car-gallery');
				?>

				<?php //CAR DATA
					$data = stm_get_single_car_listings();
					if(!empty($data)):
				?>
					<div class="single-listing adsense">
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2003257292155592"
							crossorigin="anonymous"></script>
						<!-- Vehicles Add -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-2003257292155592"
							data-ad-slot="8050396166"
							data-ad-format="auto"
							data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>  
					<div class="stm-car-listing-data-single stm-border-top-unit">
						<div class="title heading-font">
						<?php
							if ( stm_listings_post_type() === get_post_type( get_the_ID() ) ) {
								esc_html_e( 'Car
								 Details', 'motors' );
							} else {
								esc_html_e( 'Listing Details', 'motors' );
							}
						?>
						</div>
					</div>

					<?php get_template_part('partials/single-car-listing/car-data'); ?>
				<?php endif; ?>


				<?php
					$features = get_post_meta(get_the_id(), 'additional_features', true);
					if(!empty($features)):
				?>
						<div class="stm-car-listing-data-single stm-border-top-unit ">
							<div class="title heading-font"><?php esc_html_e('Features', 'motors'); ?></div>
						</div>
						<?php get_template_part('partials/single-car-listing/car-features'); ?>

                <?php endif; ?>

                <div class="stm-car-listing-data-single stm-border-top-unit">
                    <div class="title heading-font"><?php echo esc_html__('Seller Note', 'motors'); ?></div>
                </div>
				<?php echo stm_get_listing_seller_note(get_the_ID()); ?>

			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xs-12">
				
			<?php if ( is_active_sidebar( 'stm_listing_car' ) ) : ?>
				<!-- <div class="stm-listing-car-dealer-info">
					nyas
					<div class="dealer-phone">
						<div class="inner">
							<?php $phoneNumber = get_the_author_meta('stm_phone');; ?>
							<?php if ( ! empty( $phoneNumber)) : ?>
								<?php $showNumber = stm_me_get_wpcfto_mod( 'stm_show_number', false ); ?>
								<?php if ( $showNumber ) : ?>
									<div class="phone heading-font">
										<i class="stm-service-icon-phone_2"></i>
										<a href="tel:+<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
										
									</div>
								<?php else : ?>
									<i class="stm-service-icon-phone_2"></i>
									<div class="phone heading-font">
										<?php echo substr_replace( $phoneNumber, '*******', 3, strlen( $phoneNumber) ); ?>
									</div>
									<span class="stm-show-number" data-id="<?php echo esc_attr( $dealer_info['id'] ); ?>"><?php echo esc_html__( 'Show number', 'motors' ); ?></span>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div> -->
				<div class="stm-single-listing-car-sidebar">
					<?php dynamic_sidebar( 'stm_listing_car' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
