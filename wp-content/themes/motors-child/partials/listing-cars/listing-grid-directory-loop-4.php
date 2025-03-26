<?php
$regular_price_label = get_post_meta(get_the_ID(), 'regular_price_label', true);
$special_price_label = get_post_meta(get_the_ID(),'special_price_label',true);

$price = get_post_meta(get_the_id(),'price',true);
$sale_price = get_post_meta(get_the_id(),'sale_price',true);

$car_price_form_label = get_post_meta(get_the_ID(), 'car_price_form_label', true);

$data = array(
    'data_price' => 0,
    'data_mileage' => 0,
);

if(!empty($price)) {
    $data['data_price'] = $price;
}

if(!empty($sale_price)) {
    $data['data_price'] = $sale_price;
}

if(empty($price) and !empty($sale_price)) {
    $price = $sale_price;
}

$mileage = get_post_meta(get_the_id(),'mileage',true);

if(!empty($mileage)) {
    $data['data_mileage'] = $mileage;
}

$data['class'] = array('col-md-3 col-sm-4 col-xs-12 col-xxs-12 stm-directory-grid-loop stm-isotope-listing-item all mental');

?>

<?php stm_listings_load_template('loop/classified/grid/start', $data); ?>

        <?php stm_listings_load_template('loop/classified/grid/image', $data); ?>

        <div class="listing-car-item-meta boom">
            <?php stm_listings_load_template('loop/default/grid/title_price', array('price' => $price, 'sale_price' => $sale_price, 'car_price_form_label' => $car_price_form_label)); ?>

            <?php
                // get data using Multilisting function, if exists. Otherwise fallback to default
                if ( function_exists( 'stm_multilisting_load_template' ) ) {
                    stm_multilisting_load_template('templates/grid-listing-data');
                } else {
                    stm_listings_load_template('loop/classified/grid/data');
                }
                    
            ?>

        </div>
        <?php $labels = stm_get_listings_filter( get_post_type( get_the_ID() ),  true );
            
        if ( ! empty( $labels ) ) : ?>
            <div class="car-meta-bottom">
                <ul>
                    <?php foreach ( $labels as $label ) : ?>
                        <?php $label_meta = get_post_meta( get_the_id(), $label['slug'], true ); ?>
                        <?php if ( $label_meta !== '' && $label_meta != 'none' && $label['slug'] != 'price' ) : ?>
                            <li class="<?php echo $label['slug']; ?>">
                                <?php if ( ! empty( $label['font'] ) ) : ?>
                                    <i class="<?php echo esc_attr( $label['font'] ); ?>"></i>
                                <?php endif; ?>

                                <?php
                                if ( ! empty( $label['numeric'] ) && $label['numeric'] ) :
                                    $affix = '';
                                    if ( ! empty( $label['number_field_affix'] ) ) {
                                        $affix = esc_html__( $label['number_field_affix'], 'motors_listing_types' );
                                    }

                                    if ( ! empty( $label['use_delimiter'] ) ) {
                                        $label_meta = number_format( abs( $label_meta ), 0, '', ' ' );
                                    }
                                    ?>
                                    <span><?php echo esc_html( $label_meta . ' ' . $affix ); ?></span>
                                <?php else : ?>

                                    <?php
                                    $data_meta_array = explode( ',', $label_meta );
                                    $datas           = array();

                                    if ( ! empty( $data_meta_array ) ) {
                                        foreach ( $data_meta_array as $data_meta_single ) {
                                            $data_meta = get_term_by( 'slug', $data_meta_single, $label['slug'] );
                                            if ( ! empty( $data_meta->name ) ) {
                                                $datas[] = esc_attr( $data_meta->name );
                                            }
                                        }
                                    }
                                    ?>

                                    <?php if ( ! empty( $datas ) ) : ?>

                                        <?php
                                        if ( count( $datas ) > 1 ) {
                                            ?>

                                            <span
                                                    class="stm-tooltip-link"
                                                    data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="<?php echo esc_attr( implode( ', ', $datas ) ); ?>">
                                                                <?php echo stm_do_lmth( $datas[0] ) . '<span class="stm-dots dots-aligned">...</span>'; ?>
                                                            </span>

                                        <?php } else { ?>
                                            <span><?php echo implode( ', ', $datas ); ?></span>
                                            <?php
                                        }
                                        ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

    </a>
</div>