<?php
$filter    = stm_listings_filter( null, true );
$show_sold = stm_me_get_wpcfto_mod( 'show_sold_listings' );
if ( empty( $action ) ) {
	$action = 'listings-result'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
}
?>
<div class="mobile-overlay"></div>
<div class="mobile-filter">
	<div class="mobile-search-btn">
		<i class="stm-icon-car_search"></i>
		<span class="h4"><?php esc_html_e( 'Search Options', 'motors' ); ?></span>
	</div>
</div>

<form class="mobile-search-filter" action="<?php echo esc_url( stm_listings_current_url() ); ?>" method="get" data-trigger="filter" data-action="<?php echo esc_attr( $action ); ?>">
		<div class="filter filter-sidebar ajax-filter">
			<div class="sidebar-entry-header-mobile">
				<span class="h4"><?php esc_html_e( 'Search Options', 'motors' ); ?></span>
				<div class="close-btn">
					<span class="close-btn-item"></span>
					<span class="close-btn-item"></span>
				</div>
			</div>
			<?php do_action( 'stm_listings_filter_before' ); ?>

			<div class="row row-pad-top-24">
				<?php
				foreach ( $filter['filters'] as $attribute => $config ) :
					if ( ! empty( $filter['options'][ $attribute ] ) ) :
						if ( ! empty( $config['slider'] ) && $config['slider'] ) :
							stm_listings_load_template(
								'filter/types/slider',
								array(
									'taxonomy' => $config,
									'options'  => $filter['options'][ $attribute ],
								)
							);
						else :
							?>
							<?php if ( isset( $filter['options'][ $attribute ] ) ) : ?>
							<div class="col-md-12 col-sm-6 stm-filter_<?php echo esc_attr( $attribute ); ?>">
								<div class="form-group">
									<?php
									stm_listings_load_template(
										'filter/types/select',
										array(
											'options' => $filter['options'][ $attribute ],
											'name'    => $attribute,
										)
									);
									?>
								</div>
							</div>
						<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ( $show_sold ) : ?>
					<div class="col-md-12 col-sm-12 stm-filter_listing_status">
						<div class="form-group">
							<select name="listing_status" class="form-control">
								<option value="">
									<?php esc_html_e( 'Listing status', 'motors' ); ?>
								</option>
								<option value="active" <?php echo ( isset( $_GET['listing_status'] ) && 'active' === $_GET['listing_status'] ) ? 'selected' : ''; ?>>
									<?php esc_html_e( 'Active', 'motors' ); ?>
								</option>
								<option value="sold" <?php echo ( isset( $_GET['listing_status'] ) && 'sold' === $_GET['listing_status'] ) ? 'selected' : ''; ?>>
									<?php esc_html_e( 'Sold', 'motors' ); ?>
								</option>
							</select>
						</div>
					</div>
				<?php endif; ?>

				<?php
				stm_listings_load_template(
					'filter/types/features',
					array(
						'taxonomy' => 'stm_additional_features',
					)
				);
				?>

				<?php stm_listings_load_template( 'filter/types/location' ); ?>

			</div>

			<!--View type-->
			<input type="hidden" id="stm_view_type" name="view_type" value="<?php echo esc_attr( stm_listings_input( 'view_type' ) ); ?>"/>
			<!--Filter links-->
			<input type="hidden" id="stm-filter-links-input" name="stm_filter_link" value=""/>
			<!--Popular-->
			<input type="hidden" name="popular" value="<?php echo esc_attr( stm_listings_input( 'popular' ) ); ?>"/>

			<input type="hidden" name="s" value="<?php echo esc_attr( stm_listings_input( 's' ) ); ?>"/>
			<input type="hidden" name="sort_order" value="<?php echo esc_attr( stm_listings_input( 'sort_order' ) ); ?>"/>

			<div class="sidebar-action-units">
				<input id="stm-classic-filter-submit" class="hidden" type="submit" value="<?php esc_html_e( 'Show cars', 'motors' ); ?>"/>
			</div>

			<?php do_action( 'stm_listings_filter_after' ); ?>
		</div>

		<?php stm_listings_load_template( 'filter/types/checkboxes', array( 'filter' => $filter ) ); ?>
		<?php stm_listings_load_template( 'filter/types/links', array( 'filter' => $filter ) ); ?>
	<div class="grow-wrapper"></div>
		<div class="sticky-filter-actions">
			<div class="filter-show-cars">
				<button id="show-car-btn-mobile" class="show-car-btn">
					<?php esc_html_e( 'Show ', 'motors' ); ?>
					<?php $total_cars = $filter['total']; ?>
					<span><?php echo esc_html( $total_cars ); ?></span>
					<?php
					if ( stm_is_multilisting() && isset( $post_type ) ) {
						$multilisting   = new STMMultiListing();
						$post_type_name = $multilisting->stm_get_listing_name_by_slug( $post_type );
						echo esc_html( $post_type_name );
					} elseif ( stm_is_multilisting() && is_archive() && ! is_post_type_archive( 'listings' ) ) {
						wp_kses_post( post_type_archive_title() );
					} else {
						esc_html_e( 'Cars', 'motors' );
					}
					?>
				</button>
			</div>
			<a href="<?php echo esc_url( strtok( $_SERVER['REQUEST_URI'], '?' ) ); ?>" class="mobile-reset-btn">
				<i aria-hidden="true" class="fas fa-undo"></i>
				<span><?php esc_html_e( 'Reset all', 'motors' ); ?></span>
			</a>
		</div>
</form>

