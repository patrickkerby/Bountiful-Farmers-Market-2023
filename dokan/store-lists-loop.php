<?php
    $map = get_field('vendor_map');
?>

<div id="floormap">
    <div class="stalls">
        <?php if ( $sellers['users'] ) : 

            foreach ( $sellers['users'] as $seller ) {
                $vendor            = dokan()->vendor->get( $seller->ID );
                $store_info        = dokan_get_store_info( $seller->ID );
                $store_name         = $vendor->get_shop_name();
                $store_url         = $vendor->get_shop_url();
                $stall_number_custom = get_user_meta( $seller->ID , 'stall_number' );                             
                $stall_cat = $store_info['categories'][0]->term_id;                                
                $additional_stalls = get_field('additional_stall_numbers', 'user_'.$vendor->id);

                if(is_array($additional_stalls)) {
                    foreach ($additional_stalls as $stall) { ?>
                        <a href="<?php echo $store_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo $store_name; ?>" data-bs-custom-class="cat_<?php echo $store_info['categories'][0]->term_id;?> stall" class="stall_num stall_<?php echo $stall['stall_number'];?> cat_<?php echo $store_info['categories'][0]->term_id;?>"><?php echo $stall['stall_number'];?></a>
                    <?php }
                }
                elseif($stall_number_custom) { ?>                    
                    <a href="<?php echo $store_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo $store_name; ?>" data-bs-custom-class="cat_<?php echo $store_info['categories'][0]->term_id;?> stall" class="stall_num stall_<?php echo $stall_number_custom[0];?> cat_<?php echo $store_info['categories'][0]->term_id;?>"><?php echo $stall_number_custom[0];?></a>
                <?php } 
            } 
        endif ?>
            
            <!-- <a href="" class="stall_num stall_L6 cat_56">L6</a>
            <a href="" class="stall_num stall_L8 cat_56">L8</a>

            <a href="" class="stall_num stall_I5 cat_56">I5</a>
            <a href="" class="stall_num stall_I7 cat_56">I7</a>
            <a href="" class="stall_num stall_I8 cat_56">I8</a>
            <a href="" class="stall_num stall_I9 cat_56">I9</a>
            <a href="" class="stall_num stall_I10 cat_56">I10</a>

            <a href="" class="stall_num stall_H5 cat_56">H5</a>
            <a href="" class="stall_num stall_H11 cat_56">H11</a>
            <a href="" class="stall_num stall_H12 cat_56">H12</a>
            <a href="" class="stall_num stall_H14 cat_56">H14</a>

            <a href="" class="stall_num stall_G1 cat_56">G1</a>
            <a href="" class="stall_num stall_G2 cat_56">G2</a>
            <a href="" class="stall_num stall_G3 cat_56">G3</a>
            <a href="" class="stall_num stall_G5 cat_56">G5</a>
            <a href="" class="stall_num stall_G6 cat_56">G6</a>
            <a href="" class="stall_num stall_G8 cat_56">G8</a>
            <a href="" class="stall_num stall_G9 cat_56">G9</a>
            <a href="" class="stall_num stall_G10 cat_56">G10</a>

            <a href="" class="stall_num stall_J3 cat_56">J3</a>
            <a href="" class="stall_num stall_J4 cat_56">J4</a>
            <a href="" class="stall_num stall_J9 cat_56">J9</a>
            <a href="" class="stall_num stall_J10 cat_56">J10</a>
            <a href="" class="stall_num stall_J11 cat_56">J11</a>
            <a href="" class="stall_num stall_J12 cat_56">J12</a>

            <a href="" class="stall_num stall_F2 cat_56">F2</a>
            <a href="" class="stall_num stall_F6 cat_56">F6</a>
            <a href="" class="stall_num stall_F9 cat_56">F9</a>
            <a href="" class="stall_num stall_F10 cat_56">F10</a>

            <a href="" class="stall_num stall_E9 cat_56">E9</a>
            <a href="" class="stall_num stall_E10 cat_56">E10</a>

            <a href="" class="stall_num stall_A2 cat_56">A2</a>
            <a href="" class="stall_num stall_A3 cat_56">A3</a>
            <a href="" class="stall_num stall_A4 cat_56">A4</a>
            <a href="" class="stall_num stall_A5 cat_56">A5</a>
            <a href="" class="stall_num stall_A8 cat_56">A8</a>
            <a href="" class="stall_num stall_A9 cat_56">A9</a>
            <a href="" class="stall_num stall_A10 cat_56">A10</a>
            <a href="" class="stall_num stall_A11 cat_56">A11</a>
            <a href="" class="stall_num stall_A12 cat_56">A12</a>
            <a href="" class="stall_num stall_A18 cat_56">A18</a>
            <a href="" class="stall_num stall_A19 cat_56">A19</a>
            <a href="" class="stall_num stall_A21 cat_56">A21</a> -->


        <img width="1224px" height="935px" src="<?php echo $map['url']; ?>" />
    </div>
</div>

    <div id="dokan-seller-listing-wrap" >
    <div class="container">

        <?php 
            $categories_images = array(
                "Artisan Crafts"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/1.png",
                "Prepared Food"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/9.png",
                "Bath/Beauty"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/1.png",
                "Ethnic Food Hall Kitchens"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/6.png",
                "Spices"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/2.png",
                "Meat"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/8.png",
                "Beer"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/3.png",
                "Beverages"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/3.png",
                "Pets'"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/5.png",
                "Baked Goods"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/10.png",
                "Cheese/Dairy"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/8.png",
                "Sweet Treats"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/4.png",
                "Candy"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/4.png",
                "Home"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/1.png",
                "Fruits"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/7.png",
                "Vegetables"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/7.png",
                "Preserves"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/2.png",
                "Mushrooms"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/7.png",
                "Vinegars/Oils"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/2.png",
                "Jewellery"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/1.png",
                "Sauces"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/2.png",
                "Clothing"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/5.png",
                "Herbs"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/7.png",
                "Honey"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/4.png",
                "Nuts"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/4.png",
                "Kids'"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/5.png",
                "Wine"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/3.png",
                "Alcohol"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/3.png",
                "Fish/Seafood"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/8.png",
                "Other"=>"https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/5.png",
                "Uncategorized"=>"https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/images-modified.png"
            );
            ?>


        <div class="seller-listing-content">
        <h3>We've got it all!</h3>
        <ul class="vendorImg-lists">
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Artisan Crafts, Jewellery, Home, Bath/Beauty')" data-url="Artisan Crafts, Jewellery, Home, Bath/Beauty">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/1.png" alt="1" />
                    </figure>
                    <figcaption>Artisan Crafts, Jewellery, Bath/Beauty, Home</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Preserves,Vinegars, Oils, Sauces, Spices')" data-url="Preserves,Vinegars, Oils, Sauces, Spices">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/2.png" alt="2" />
                    </figure>
                    <figcaption>Preserves, Vinegars, Sauces, Spices, Oil</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Beverages,Wine,Beer,Alcohol')" data-url="Beverages,Wine,Beer,Alcohol">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/3.png" alt="3" />
                    </figure>
                    <figcaption>Beverages, Wine, Beer, Alcohol</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Sweet Treats,Candy,Nuts,Honey')" data-url="Sweet Treats,Candy,Nuts,Honey">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/4.png" alt="4" />
                    </figure>
                    <figcaption>Sweet Treats, Candy, Nuts, Honey</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1(`Clothing,Kids',Pets',Other`)" data-url="Clothing,Kids',Pets',Other">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/5.png" alt="5" />
                    </figure>
                    <figcaption>Clothing, Kids', Pets', Other</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Ethnic Food Hall Kitchens')" data-url="Ethnic Food Hall Kitchens">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/6.png" alt="6" />
                    </figure>
                    <figcaption>Ethnic Food Hall Kitchens</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Vegetables,Mushrooms,Fruits,Herbs,Produce')" data-url="Vegetables,Mushrooms,Fruits,Herbs,Produce">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/themes/Bountiful-Farmers-Market-2023/images/7.png" alt="7" />
                    </figure>
                    <figcaption>Vegetables, Mushrooms, Fruits, Herbs</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Cheese,Seafood')" data-url="Cheese/Dairy,Fish/Seafood,Meat,Eggs">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/8.png" alt="8" />
                    </figure>
                    <figcaption>Cheese/Dairy, Fish/Seafood, Meat, Eggs</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Prepared Food')" data-url="Prepared Food">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/9.png" alt="9" />
                    </figure>
                    <figcaption>Prepared Foods</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="myFunction1('Baked Goods')" data-url="Baked Goods">
                    <figure>
                        <img src="https://test.bountifulmarkets.com/wp/wp-content/uploads/2022/06/10.png" alt="10" />
                    </figure>
                    <figcaption>Baked Goods</figcaption>
                </a>
            </li>
        </ul>

        <?php if ( $sellers['users'] ) : ?>
            <div class="sort-lists">                    
                <span>
                    <p>Sort Vendors by:</p>
                    <select id="mylist" onchange="myFunction()" class='form-control'>
                        <!-- <option>Default Sorting</option> -->
                        <option>Alphabetical</option>
                        <?php   
                            foreach ( $categories_images as $key => $value) { ?>
                                <option><?php echo $key; ?></option>
                        <?php } ?>
                    </select>
                </span>
            </div>
            
            <div class="table-responsive vendor-table">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Booth</th>
                            <th>Vendor</th>
                            <th>Category</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        usort($sellers['users'], function($a, $b) {
                            $vendorA = dokan()->vendor->get($a->ID);
                            $vendorB = dokan()->vendor->get($b->ID);
                            return strcmp($vendorA->get_shop_name(), $vendorB->get_shop_name());
                        });

                        foreach ( $sellers['users'] as $seller ) {
                            $vendor            = dokan()->vendor->get( $seller->ID );
                            $store_banner_id   = $vendor->get_banner_id();
                            $store_name        = $vendor->get_shop_name();
                            $store_url         = $vendor->get_shop_url();
                            $store_rating      = $vendor->get_rating();
                            $is_store_featured = $vendor->is_featured();
                            $store_phone       = $vendor->get_phone();
                            $store_info        = dokan_get_store_info( $seller->ID );
                            $store_address     = dokan_get_seller_short_address( $seller->ID );
                            $store_banner_url  = $store_banner_id ? wp_get_attachment_image_src( $store_banner_id, $image_size ) : DOKAN_PLUGIN_ASSEST . '/images/default-store-banner.png';
                            $show_store_open_close    = dokan_get_option( 'store_open_close', 'dokan_appearance', 'on' );
                            $dokan_store_time_enabled = isset( $store_info['dokan_store_time_enabled'] ) ? $store_info['dokan_store_time_enabled'] : '';
                            $store_open_is_on = ( 'on' === $show_store_open_close && 'yes' === $dokan_store_time_enabled && ! $is_store_featured ) ? 'store_open_is_on' : '';

                            $category_name = $store_info['categories'][0]->name ;

                            $stall_number_custom = get_user_meta( $seller->ID , 'stall_number' );
                            
                            $image = '';
                            foreach ($categories_images as $key => $value) {
                                if ($key == $category_name) {
                                    $image = $value ;
                                    // echo $image;
                                }
                            }
                            ?>

                            <tr>
                                <td class="stall">
                                    <?php if ( isset($stall_number_custom) && !empty( $stall_number_custom) ) { ?>   
                                        <span class="stall_num cat_<?php echo $store_info['categories'][0]->term_id;?>">            
                                            <?php echo $stall_number_custom[0]; ?>
                                        </span>
                                    <?php }?>
                                </td>
                                <td class="name"><?php echo $store_name; ?></td>
                                <td class="category">
                                    <span>
                                        <figure>
                                            <img src="<?php echo $image; ?>" alt="1" />
                                        </figure>    
                                        <?php echo $category_name; ?>
                                    </span>
                                </td>
                                <td class="profile">
                                    <a href="<?php echo $store_url; ?>">
                                        <span class="arrow"></span>
                                    </a>
                                </td>
                            </tr>                                    
                        <?php } ?>
                    </tbody>
                </table>
            </div>

                <div class="dokan-clearfix"></div>

                <?php
                $user_count   = $sellers['count'];
                $num_of_pages = ceil( $user_count / $limit );

                if ( $num_of_pages > 1 ) {
                    echo '<div class="pagination-container clearfix">';

                    $pagination_args = array(
                        'current'   => $paged,
                        'total'     => $num_of_pages,
                        'base'      => $pagination_base,
                        'type'      => 'array',
                        'prev_text' => __( '&larr; Previous', 'dokan-lite' ),
                        'next_text' => __( 'Next &rarr;', 'dokan-lite' ),
                    );

                    if ( ! empty( $search_query ) ) {
                        $pagination_args['add_args'] = array(
                            'dokan_seller_search' => $search_query,
                        );
                    }

                    $page_links = paginate_links( $pagination_args );

                    if ( $page_links ) {
                        $pagination_links  = '<div class="pagination-wrap">';
                        $pagination_links .= '<ul class="pagination"><li>';
                        $pagination_links .= join( "</li>\n\t<li>", $page_links );
                        $pagination_links .= "</li>\n</ul>\n";
                        $pagination_links .= '</div>';

                        echo $pagination_links; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
                    }

                    echo '</div>';
                }
                ?>

            <?php else:  ?>
                <p class="dokan-error"><?php esc_html_e( 'No vendor found!', 'dokan-lite' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
