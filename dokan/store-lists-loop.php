    <div id="dokan-seller-listing-wrap" >
    <div class="container">

        <?php 
                    $categories_images = array(
                        "Artisan Crafts"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/1.png",
                        "Prepared Food"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/9.png",
                        "Bath/Beauty"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/1.png",
                        "Ethnic Food Hall Kitchens"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/6.png",
                        "Spices"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/2.png",
                        "Meat"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/8.png",
                        "Beer"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/3.png",
                        "Beverages"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/3.png",
                        "Pets'"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/5.png",
                        "Baked Goods"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/10.png",
                        "Cheese/Dairy"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/8.png",
                        "Sweet Treats"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/4.png",
                        "Candy"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/4.png",
                        "Home"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/1.png",
                        "Fruits"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/7.png",
                        "Vegetables"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/7.png",
                        "Preserves"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/2.png",
                        "Mushrooms"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/7.png",
                        "Vinegars/Oils"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/2.png",
                        "Jewellery"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/1.png",
                        "Sauces"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/2.png",
                        "Clothing"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/5.png",
                        "Herbs"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/7.png",
                        "Honey"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/4.png",
                        "Nuts"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/4.png",
                        "Kids'"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/5.png",
                        "Wine"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/3.png",
                        "Alcohol"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/3.png",
                        "Fish/Seafood"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/8.png",
                        "Other"=>"https://bountiful.valontech.com/wp-content/themes/dokan/images/5.png",
                        "Uncategorized"=>"https://bountiful.valontech.com/wp-content/uploads/2022/06/images-modified.png"
                    );

                    // foreach ($age as $key => $value) {
                    //     echo $key ;
                    //     echo $value;
                    // }
                     ?>


        <div class="seller-listing-content">
        <h3>We've got it all!</h3>
        <ul class="vendorImg-lists">
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Artisan Crafts,Jewellary,Bath/Beauty,Home')" data-url = "Artisan Crafts,Jewellary,Beauty/Bath,Home">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/1.png" alt="1" />
                    </figure>
                    <figcaption>Artisan Crafts, Jewellery, Beauty, Bath, Home</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Preserves,Vinegars/Oils,Sauces,Spices,')" data-url = "Preserves,Vinegars,Sauces,Spices,Oil">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/2.png" alt="2" />
                    </figure>
                    <figcaption>Preserves, Vinegars, Sauces, Spices, Oil</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Beverages,Wine,Beer,Alcohol')" data-url = "Beverages,Wine,Beer,Alcohol">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/3.png" alt="3" />
                    </figure>
                    <figcaption>Beverages, Wine, Beer, Alcohol</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Sweet Treats,Candy,Nuts,Honey')" data-url = "Sweet Treats,Candy,Nuts,Honey">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/4.png" alt="4" />
                    </figure>
                    <figcaption>Sweet Treats, Candy, Nuts, Honey</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1(`Clothing,Kids',Pets',Other`)"  data-url = "Clothing,Kids',Pets',Other">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/5.png" alt="5" />
                    </figure>
                    <figcaption>Clothing, Kids', Pets', Other</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Ethnic Food Hall Kitchens')" data-url = "Ethnic Food Hall Kitchens">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/6.png" alt="6" />
                    </figure>
                    <figcaption>Ethnic Food Hall Kitchens</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Vegetables,Mushrooms,Fruits,Herbs')" data-url = "Vegetables,Mushrooms,Fruits,Herbs">
                        <img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/7.png" alt="7" />
                    </figure>
                    <figcaption>Vegetables, Mushrooms, Fruits, Herbs</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Cheese/Dairy,Fish/Seafood,Meat,Eggs')" data-url = "Cheese/Dairy,Fish/Seafood,Meat,Eggs">
                        <img src="https://bountiful.valontech.com/wp-content/uploads/2022/06/8.png" alt="8" />
                    </figure>
                    <figcaption>Cheese/Diary, Fish/Seafood, Meat, Eggs</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Prepared Food')" data-url = "Prepared Food">
                        <img src="https://bountiful.valontech.com/wp-content/uploads/2022/06/9.png" alt="9" />
                    </figure>
                    <figcaption>Prepared Foods</figcaption>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <figure onclick = "myFunction1('Baked Goods')" data-url = "Baked Goods">
                        <img src="https://bountiful.valontech.com/wp-content/uploads/2022/06/10.png" alt="10" />
                    </figure>
                    <figcaption>Baked Goods</figcaption>
                </a>
            </li>
        </ul>

        <?php if ( $sellers['users'] ) : ?>
            <div class="sort-lists">
                        <!-- <p><button onclick="sortTable()">Sort Alphabetically</button></p>
                        <p class="custom-button-text" onclick="resetFunction('DEFAULT SORTING')">Reset list</p> -->
                        <span>
                        <p>Sort Vendors by:</p>
                        <select id="mylist" onchange="myFunction()" class='form-control'>
                            <!-- <option>Default Sorting</option> -->
                            <option>Alphabetical</option>
                            <?php   
                                foreach ( $categories_images as $key => $value) { ?>

                                   <option><?php echo $key; ?></option>

                            <?php    }  
                            ?>
                            
                            
                     <!--        <option>Preserves</option>
                            <option>Prepared Food</option>
                            <option>Beer</option>
                            <option>Bath/Beauty</option>
                            <option>Baked Goods</option> -->
                        </select>
                    </span>
            </div>
                    <div class="table-responsive vendor-table">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>Booth</th>
                                    <th>Vendor</th>
                                    <th></th>
                                    <th>Category</th>
                                    <th>Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>A2-3</td>
                                    <td>Ace Cofee Rester</td>
                                    <td>
                                        <figure>
                                            <img src="" alt="" />
                                        </figure>
                                    </td>
                                    <td>zfbzfb</td>
                                    <td>
                                        <a href=""><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td>A2-3</td>
                                    <td>Ace Cofee Rester</td>
                                    <td>
                                        <figure>
                                            <img src="" alt="" />
                                        </figure>
                                    </td>
                                    <td>zfbzfb</td>
                                    <td>
                                        <a href=""><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A2-3</td>
                                    <td>Ace Cofee Rester</td>
                                    <td>
                                        <figure>
                                            <img src="" alt="" />
                                        </figure>
                                    </td>
                                    <td>zfbzfb</td>
                                    <td>
<a href=""><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </td>
                                </tr> -->
                  
            <!-- <ul class="dokan-seller-wrap"> -->
                        <?php
                            foreach ( $sellers['users'] as $seller ) {
                                $vendor            = dokan()->vendor->get( $seller->ID );
                                $store_banner_id   = $vendor->get_banner_id();
                                $store_name         = $vendor->get_shop_name();
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
                                ?>

                                <?php 
                                 $image = '';
                                    foreach ($categories_images as $key => $value) {
                                        if ($key == $category_name) {
                                            $image = $value ;
                                            // echo $image;
                                        }
                                    }
                                ?>

                                <tr>
                                    <td>
                                     <?php if ( isset($stall_number_custom) && !empty( $stall_number_custom) ) {    
                                         // echo esc_html( $store_info['stall_number'] ); 
                                            echo $stall_number_custom[0];
                                           } 
                                     ?>
                                    </td>

                                    <td><?php echo $store_name; ?></td>
                                    <td>
                                        <figure>

                                            <img src="<?php echo $image; ?>" alt="1" />
                                        </figure>
                                    </td>
                                    <td><?php echo $category_name; ?></td>
                                    <td>
                                        <a href="<?php echo $store_url; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </td>
                                </tr>

                                <div class="store-footer">

                                <!-- <a href="<?php //echo esc_url( $store_url ); ?>" title="<?php// esc_attr_e( 'Visit Store', 'dokan-lite' );?>">
                                    <span class="dashicons dashicons-arrow-right-alt2 dokan-btn-theme dokan-btn-round"></span>
                                </a> -->
                                <?php do_action( 'dokan_seller_listing_footer_content', $seller, $store_info ); ?>
                            </div>

                    

                <?php } ?>

                          </tbody>
                        </table>
                    </div>

                <div class="dokan-clearfix"></div>
            <!-- </ul>  -->
            <!-- .dokan-seller-wrap -->

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
