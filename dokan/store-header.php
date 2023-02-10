<?php
$store_user               = dokan()->vendor->get( get_query_var( 'author' ) );
$store_info               = $store_user->get_shop_info();
$social_info              = $store_user->get_social_profiles();
$store_tabs               = dokan_get_store_tabs( $store_user->get_id() );
$social_fields            = dokan_get_social_profile_fields();

$dokan_store_times        = ! empty( $store_info['dokan_store_time'] ) ? $store_info['dokan_store_time'] : [];
$current_time             = dokan_current_datetime();
$today                    = strtolower( $current_time->format( 'l' ) );

$dokan_appearance         = get_option( 'dokan_appearance' );
$profile_layout           = empty( $dokan_appearance['store_header_template'] ) ? 'default' : $dokan_appearance['store_header_template'];
$store_address            = dokan_get_seller_short_address( $store_user->get_id(), false );

$dokan_store_time_enabled = isset( $store_info['dokan_store_time_enabled'] ) ? $store_info['dokan_store_time_enabled'] : '';
$store_open_notice        = isset( $store_info['dokan_store_open_notice'] ) && ! empty( $store_info['dokan_store_open_notice'] ) ? $store_info['dokan_store_open_notice'] : __( 'Store Open', 'dokan-lite' );
$store_closed_notice      = isset( $store_info['dokan_store_close_notice'] ) && ! empty( $store_info['dokan_store_close_notice'] ) ? $store_info['dokan_store_close_notice'] : __( 'Store Closed', 'dokan-lite' );
$show_store_open_close    = dokan_get_option( 'store_open_close', 'dokan_appearance', 'on' );

$general_settings         = get_option( 'dokan_general', [] );
$banner_width             = dokan_get_vendor_store_banner_width();

if ( ( 'default' === $profile_layout ) || ( 'layout2' === $profile_layout ) ) {
    $profile_img_class = 'profile-img-circle';
} else {
    $profile_img_class = 'profile-img-square';
}

if ( 'layout3' === $profile_layout ) {
    unset( $store_info['banner'] );

    $no_banner_class      = ' profile-frame-no-banner';
    $no_banner_class_tabs = ' dokan-store-tabs-no-banner';

} else {
    $no_banner_class      = '';
    $no_banner_class_tabs = '';
}
// echo "<pre>";
// print_r($store_info);

// $vendor_bio =  $store_info['vendor_biography'];

$stall_number_custom = get_user_meta( $store_user->get_id() , 'stall_number' );
$custom_bio = get_user_meta( $store_user->get_id() , 'description' );
$image_1 = get_user_meta( $store_user->get_id() , 'image_1' );
$image_2 = get_user_meta( $store_user->get_id() , 'image_2' );
$image_3 = get_user_meta( $store_user->get_id() , 'image_3' );
$image_4 = get_user_meta( $store_user->get_id() , 'image_4' );

// print_r($image_1);
// die;

$user_data =  get_userdata( $store_user->get_id() );
// print_r($dtaaaa);
$website_url = $user_data->user_url;
// die;
// echo $vendor_bio;
?>
<div class="dokan-profile-frame-wrapper">
   

    <div class="personDetails">
        <div class="ace-sec">
            <h2 class="ace-heading"><?php echo esc_html( $store_user->get_shop_name() ); ?> <?php apply_filters( 'dokan_store_header_after_store_name', $store_user ); ?></h2>
        </div>
        <div class="personAbout-sec">
            <div class="container">
                <!-- <h4><?php if ( ! empty( $store_user->get_shop_name() ) && 'default' === $profile_layout ) { ?> -->
                        
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="detailsofperson">
                            
                            <?php if (!$custom_bio == '') { ?>
                            <div class="about-heading">
                                <h2 class="heading">About:</h2>
                                <p><?php echo $custom_bio[0]; ?></p>
                            </div>  
                            <?php } ?>                  
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="owl-carousel owl-theme about-slider">
                            <div class="item about-item">
                                <figure>
                                    <img src="<?php echo wp_get_attachment_image( $image_1[0], 'full' ); ?>" alt="local-img1" 
                                    srcset="" class="img-1" />
                                </figure>
                            </div>
                            <div class="item about-item">
                                <figure>
                                    <img src="<?php echo wp_get_attachment_image( $image_2[0], 'full' ); ?>" alt="local-img2" 
                                    srcset="" class="img-1" />
                                </figure>
                            </div>
                            <div class="item about-item">
                                <figure>
                                    <img src="<?php echo wp_get_attachment_image( $image_3[0], 'full' ); ?>" alt="local-img3" 
                                    srcset="" class="img-1" />
                                </figure>
                            </div>
                            <div class="item about-item">
                                <figure>
                                    <img src="<?php echo wp_get_attachment_image( $image_4[0], 'full' ); ?>" alt="local-img3" 
                                    srcset="" class="img-1" />
                                </figure>
                            </div>
                        </div>
<!-- 
                        <h1 class="store-name"><?php //echo esc_html( $store_user->get_shop_name() ); ?> <?php //apply_filters( 'dokan_store_header_after_store_name', $store_user ); ?></h1> -->
                            <?php } ?>
                         
                                <!-- <h2>About Vendor :</h2> -->
                               <!--  <p><?php echo $vendor_bio; ?></p>   -->                         
                        
                    
                        <!-- <figcaption> -->
                            <?php// if ( ! dokan_is_vendor_info_hidden( 'phone' ) && ! empty( $store_user->get_phone() ) ) { ?>
                                 <!--    <li class="dokan-store-phone">
                                        <i class="fas fa-mobile-alt"></i>
                                        <a href="tel:<?php //echo esc_html( $store_user->get_phone() ); ?>"><?php //echo esc_html( $store_user->get_phone() ); ?></a>
                                    </li> -->
                                <?php //} ?>                            
                                <?php //if ( $social_fields ) { ?>
                                   <!--  <div class="store-social-wrapper">
                                        <ul class="store-social">
                                            <?php foreach( $social_fields as $key => $field ) { ?>
                                                <?php if ( !empty( $social_info[ $key ] ) ) { ?>
                                                    <li>
                                                        <i class="fab fa-<?php echo esc_attr( $field['icon'] ); ?>"></i>
                                                        <a href="<?php echo esc_url( $social_info[ $key ] ); ?>" target="_blank"><?php echo esc_url( $social_info[ $key ] ); ?></a>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div> -->
                                <?php// } ?>
                            <!-- </figcaption> -->
                    </div>
                </div>

                <h2 class="heading">Find them in booth  
                   <?php if ( isset($stall_number_custom) && !empty( $stall_number_custom) ) {    
                                         // echo esc_html( $store_info['stall_number'] ); 
                                            echo $stall_number_custom[0];
                                           } 
                                     ?>!
                </h2>
            </div>
        </div>

        <div class="connect-sec">
            <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="connect">
                            <h2 class="heading">Connect</h2>
                            <ul class="social-icons">
                                <?php if ( $social_fields ) { ?>
                                
                                 <?php foreach( $social_fields as $key => $field ) { ?>
                                    <?php if (( $key == "fb" ) && ( $social_info["fb"] ) ) { ?>
                                <li><a href="<?php echo esc_url( $social_info[ $key ] ); ?>" target=_blank>
                                    <figure>
                                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/facebook.png" alt="facebook" srcset="" />
                                    </figure>
                                </a></li>
                                        <?php } ?>
                                    <?php } ?>
                                 <?php } ?>

                                <?php if ( ! dokan_is_vendor_info_hidden( 'email' )) { ?>
                                <li><a href="mailto:<?php echo esc_attr( antispambot( $store_user->get_email() ) ); ?>">
                                    <figure>
                                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/email.png" alt="email" srcset="" />
                                    </figure>
                                </a></li>
                                <?php } ?>
                                
                                    <?php if ($website_url) { ?>
                                        <li><a href="<?php echo $website_url; ?>" target=_blank">
                                    <figure>
                                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/globe.png" alt="globe" srcset="" />
                                    </figure>
                                    </a></li>
                                 <?php  } ?>
                               
                                 
                            </ul>
                        </div>
                    </div>

<?php $str = get_user_meta( $store_user->get_id() , 'main_products' );?>
                    <?php if ( isset($str) && !empty($str) ) { ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="main-prdct">
                            <h2 class="heading">Main Products</h2>
                            <ul class="product-lists">

                            <?php

                            $words = explode(PHP_EOL, $str[0]);
                                // echo count($words);
                            foreach ($words as $word) {

                            ?>
                                <li><a href="javascript:void(0);"><?php echo $word ; ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



        <?php //if ( isset( $store_info['stall_number'] ) && !empty( $store_info['stall_number'] ) ) { ?>
          <!--  <i class="fa fa-globe"></i>
            <a href="<?php //echo esc_html( $store_info['stall_number'] ); ?>"><?php //echo esc_html( $store_info['stall_number'] ); ?></a>    -->
    <?php// } ?>


