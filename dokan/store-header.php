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
$long_bio = get_user_meta( $store_user->get_id() , 'vendor_bio' );
$image_1 = get_user_meta( $store_user->get_id() , 'image_1' );
$image_2 = get_user_meta( $store_user->get_id() , 'image_2' );
$image_3 = get_user_meta( $store_user->get_id() , 'image_3' );
$image_4 = get_user_meta( $store_user->get_id() , 'image_4' );

$user_data =  get_userdata( $store_user->get_id() );
$website_display = "";

$website_url = $user_data->user_url;
    // The following is all stuff to make the urls look pretty in the profile
    // in case scheme relative URI is passed, e.g., //www.google.com/
    
    if($website_url) {
        $input = trim($website_url, '/');

        // If scheme not included, prepend it
        if (!preg_match('#^http(s)?://#', $input)) {
            $input = 'http://' . $input;
        }

        $urlParts = parse_url($input);

        // remove www
        $website_display = preg_replace('/^www\./', '', $urlParts['host']);
    }

$vendor_products = get_field( 'vendor_products', 'user_'.$user_data->ID );;

    

?>
   
<div class="banner-vendor row justify-content-center">
    <div class="col-10 col-sm-5 profile_title">
      <h2><span>Vendor Profile:</span> <?php echo esc_html( $store_user->get_shop_name() ); ?> <?php apply_filters( 'dokan_store_header_after_store_name', $store_user ); ?></h2>
      <ul>
        <li class="stall"><span>Stall</span><br /> <?php if ( isset($stall_number_custom) && !empty( $stall_number_custom) ) {    
                    // echo esc_html( $store_info['stall_number'] ); 
                    echo $stall_number_custom[0];
                    } 
                ?></li>
        <!-- @if ( $vendor_social->twitter ) -->
          <li class="twitter"><a href="//twitter.com/{{ $vendor_social->twitter }}" target="_blank"><img src="/app/themes/Bountiful-Farmers-Market-2023/images/twitter.svg" /></a></li>
        <!-- @endif -->
        <!-- @if ( $vendor_social->facebook ) -->
          <li><a href="//fb.com/{{ $vendor_social->facebook }}" target="_blank"><img src="/app/themes/Bountiful-Farmers-Market-2023/images/facebook.svg" /></a></li>
        <!-- @endif -->
        <!-- @if ( $vendor_social->instagram ) -->
          <li><a href="//instagram.com/{{ $vendor_social->instagram }}" target="_blank"><img src="/app/themes/Bountiful-Farmers-Market-2023/images/instagram.svg" /></a></li>
        <!-- @endif -->
          <li><a href="mailto:<?php echo esc_attr( antispambot( $store_user->get_email() ) ); ?> subject=Mail from Bountiful Farmers' Market Website" target="_blank"><img src="/app/themes/Bountiful-Farmers-Market-2023/images/email.svg" /></a></li>        
          <li class="website"><span><a href="<?php echo $website_url ?>" target="_blank"><?php echo $website_display ?></a></span></li>
      </ul>
    </div>
    <div class="col-10 col-sm-5 profile-img">
        <?php echo wp_get_attachment_image( $image_1[0], 'original' ); ?>
    </div>
  </div> 

    <div class="personDetails vendor container">
        <div class="personAbout-sec bio wysiwyg">
            <div class="row gx-5 justify-content-center">
                <div class="col-sm-10 col-md-6">                            
                    <?php if ($long_bio) { ?>
                        <h2>About:</h2>
                        <div><?php echo $long_bio[0]; ?></div>
                    <?php } elseif ($custom_bio) { ?>
                        <h2>About:</h2>
                        <p><?php echo $custom_bio[0]; ?></p>  
                    <?php } 
                    else { ?>
                        <h2>About:</h2>
                        <p>Vendor bio coming soon!</p>  
                    <?php } ?>    
                    
                    <hr>
                    <?php $str = get_user_meta( $store_user->get_id() , 'main_products' );?>

                    <?php if($vendor_products) { ?>
                        <h2>Our Products</h2>
                        <ul>
                            <?php foreach ($vendor_products as $product) { ?>
                                <li><?php echo $product['product_name']; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } 
                    // The following is Ivan's version of the products. Let's keep it, for awhile, until all data is migrated to the new fields. But we'll prioritize the new fields
                        elseif( isset($str) && !empty($str) ) { ?>                    
                        <div class="main-prdct">
                            <h2>Our Products</h2>
                            <ul class="product-lists">

                            <?php
                                $words = explode(PHP_EOL, $str[0]);
                                foreach ($words as $word) {
                            ?>
                                <li><a href="javascript:void(0);"><?php echo $word ; ?></a></li>
                            <?php } ?>
                            </ul>                                                            
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-5 photos">
                    <div class="row">
                        <div class="col-sm-12">
                            <figure>
                                <?php echo wp_get_attachment_image( $image_2[0], 'full' ); ?>
                            </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure>
                                <?php echo wp_get_attachment_image( $image_3[0], 'full' ); ?>
                            </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure>
                                <?php echo wp_get_attachment_image( $image_4[0], 'full' ); ?>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

