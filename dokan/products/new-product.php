<?php

use WeDevs\Dokan\ProductCategory\Helper;
use WeDevs\Dokan\Walkers\TaxonomyDropdown;

    $get_data  = wp_unslash( $_GET ); // WPCS: CSRF ok.
    $post_data = wp_unslash( $_POST ); // WPCS: CSRF ok.

    /**
     *  dokan_new_product_wrap_before hook
     *
     *  @since 2.4
     */
    do_action( 'dokan_new_product_wrap_before' );
?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

    <div class="dokan-dashboard-wrap">

        <?php

            /**
             *  dokan_dashboard_content_before hook
             *  dokan_before_new_product_content_area hook
             *
             *  @hooked get_dashboard_side_navigation
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_before' );
            do_action( 'dokan_before_new_product_content_area' );
        ?>


        <div class="dokan-dashboard-content">

            <?php

                /**
                 *  dokan_before_new_product_inside_content_area hook
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_before_new_product_inside_content_area' );
            ?>

            <header class="dokan-dashboard-header dokan-clearfix">
                <h1 class="entry-title">
                    <?php esc_html_e( 'Add New Product', 'dokan-lite' ); ?>
                </h1>
            </header><!-- .entry-header -->

            <?php do_action( 'dokan_new_product_before_product_area' ); ?>

            <div class="dokan-new-product-area">
                <?php if ( dokan()->dashboard->templates->products->has_errors() ) { ?>
                    <div class="dokan-alert dokan-alert-danger">
                        <a class="dokan-close" data-dismiss="alert">&times;</a>

                        <?php foreach ( dokan()->dashboard->templates->products->get_errors() as $error) { ?>

                            <strong><?php esc_html_e( 'Error!', 'dokan-lite' ); ?></strong> <?php echo esc_html( $error ); ?>.<br>

                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if ( isset( $get_data['created_product'] ) ): ?>
                    <div class="dokan-alert dokan-alert-success">
                        <a class="dokan-close" data-dismiss="alert">&times;</a>
                        <strong><?php esc_html_e( 'Success!', 'dokan-lite' ); ?></strong>
                        <?php printf( __( 'You have successfully created <a href="%s"><strong>%s</strong></a> product', 'dokan-lite' ), esc_url( dokan_edit_product_url( intval( $get_data['created_product'] ) ) ), get_the_title( intval( $get_data['created_product'] ) ) ); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
                    </div>
                <?php endif ?>

                <?php

                $can_sell         = apply_filters( 'dokan_can_post', true );

                if ( $can_sell ) {
                    $posted_img       = dokan_posted_input( 'feat_image_id' );
                    $posted_img_url   = $hide_instruction = '';
                    $hide_img_wrap    = 'dokan-hide';
                    $post_content     = isset( $post_data['post_content'] ) ? $post_data['post_content'] : '';

                    if ( !empty( $posted_img ) ) {
                        $posted_img     = empty( $posted_img ) ? 0 : $posted_img;
                        $posted_img_url = wp_get_attachment_url( $posted_img );
                        $hide_instruction = 'dokan-hide';
                        $hide_img_wrap = '';
                    }
                    if ( dokan_is_seller_enabled( get_current_user_id() ) ) { ?>

                        <form class="dokan-form-container" method="post">

                            <div class="product-edit-container dokan-clearfix">
                                <div class="content-half-part featured-image">
                                    <div class="featured-image">
                                        <div class="dokan-feat-image-upload">
                                            <div class="instruction-inside <?php echo esc_attr( $hide_instruction ); ?>">
                                                <input type="hidden" name="feat_image_id" class="dokan-feat-image-id" value="<?php echo esc_attr( $posted_img ); ?>">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <a href="#" class="dokan-feat-image-btn dokan-btn"><?php esc_html_e( 'Upload Product Image', 'dokan-lite' ); ?></a>
                                            </div>

                                            <div class="image-wrap <?php echo esc_attr( $hide_img_wrap ); ?>">
                                                <a class="close dokan-remove-feat-image">&times;</a>
                                                    <img src="<?php echo esc_url( $posted_img_url ); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dokan-product-gallery">
                                        <div class="dokan-side-body" id="dokan-product-images">
                                            <div id="product_images_container">
                                                <ul class="product_images dokan-clearfix">
                                                    <?php
                                                        if ( isset( $post_data['product_image_gallery'] ) ) { // WPCS: CSRF ok, input var ok.
                                                            $product_images = $post_data['product_image_gallery']; // WPCS: CSRF ok, input var ok.
                                                            $gallery        = explode( ',', $product_images );

                                                            if ( $gallery ) {
                                                                foreach ( $gallery as $image_id ) {
                                                                    if ( empty( $image_id ) ) {
                                                                        continue;
                                                                    }

                                                                    $attachment_image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                                                                    ?>
                                                                    <li class="image" data-attachment_id="<?php echo esc_attr( $image_id ); ?>">
                                                                        <img src="<?php echo esc_url( $attachment_image[0] ); ?>" alt="">
                                                                        <a href="#" class="action-delete" title="<?php esc_attr_e( 'Delete image', 'dokan-lite' ); ?>">&times;</a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    <li class="add-image add-product-images tips" data-title="<?php esc_attr_e( 'Add gallery image', 'dokan-lite' ); ?>">
                                                        <a href="#" class="add-product-images"><i class="fas fa-plus" aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                                <input type="hidden" id="product_image_gallery" name="product_image_gallery" value="">
                                            </div>
                                        </div>
                                    </div> <!-- .product-gallery -->
                                    <?php do_action( 'dokan_product_gallery_image_count' ); ?>
                                </div>

                                <div class="content-half-part dokan-product-meta">
                                    <div class="dokan-form-group">
                                        <input class="dokan-form-control" name="post_title" id="post-title" type="text" placeholder="<?php esc_attr_e( 'Product name..', 'dokan-lite' ); ?>" value="<?php echo esc_attr( dokan_posted_input( 'post_title' ) ); ?>">
                                    </div>

                                    <div class="dokan-form-group">
                                        <div class="dokan-form-group dokan-clearfix dokan-price-container">
                                            <div class="content-half-part">
                                                <label for="_regular_price" class="dokan-form-label"><?php esc_html_e( 'Price', 'dokan-lite' ); ?></label>
                                                <div class="dokan-input-group">
                                                    <span class="dokan-input-group-addon"><?php echo esc_attr__( get_woocommerce_currency_symbol() ); ?></span>
                                                    <input type="text" class="dokan-form-control wc_input_price dokan-product-regular-price" name="_regular_price" placeholder="0.00" id="_regular_price" value="<?php echo esc_attr( dokan_posted_input( '_regular_price' ) ) ?>" required>
                                                </div>
                                            </div>

                                            <div class="content-half-part sale-price">
                                                <label for="_sale_price" class="form-label">
                                                    <?php esc_html_e( 'Discounted Price', 'dokan-lite' ); ?>
                                                    <a href="#" class="sale_schedule"><?php esc_html_e( 'Schedule', 'dokan-lite' ); ?></a>
                                                    <a href="#" class="cancel_sale_schedule dokan-hide"><?php esc_html_e( 'Cancel', 'dokan-lite' ); ?></a>
                                                </label>

                                                <div class="dokan-input-group">
                                                    <span class="dokan-input-group-addon"><?php echo esc_attr__( get_woocommerce_currency_symbol() ); ?></span>
                                                    <input type="text" class="dokan-form-control wc_input_price dokan-product-sales-price" name="_sale_price" placeholder="0.00" id="_sale_price" value="<?php echo esc_attr( dokan_posted_input( '_sale_price' ) ) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dokan-hide sale-schedule-container sale_price_dates_fields dokan-clearfix dokan-form-group">
                                            <div class="content-half-part from">
                                                <div class="dokan-input-group">
                                                    <span class="dokan-input-group-addon"><?php esc_html_e( 'From', 'dokan-lite' ); ?></span>
                                                    <input type="text" name="_sale_price_dates_from" class="dokan-form-control datepicker sale_price_dates_from" maxlength="10" value="<?php echo esc_attr( dokan_posted_input('_sale_price_dates_from') ); ?>" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="<?php esc_attr_e( 'YYYY-MM-DD', 'dokan-lite' ); ?>">
                                                </div>
                                            </div>

                                            <div class="content-half-part to">
                                                <div class="dokan-input-group">
                                                    <span class="dokan-input-group-addon"><?php esc_html_e( 'To', 'dokan-lite' ); ?></span>
                                                    <input type="text" name="_sale_price_dates_to" class="dokan-form-control datepicker sale_price_dates_to" value="<?php echo esc_attr( dokan_posted_input('_sale_price_dates_to') ); ?>" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="<?php esc_attr_e( 'YYYY-MM-DD', 'dokan-lite' ); ?>">
                                                </div>
                                            </div>
                                        </div><!-- .sale-schedule-container -->
                                    </div>

                                    <div class="dokan-form-group">
                                        <textarea name="post_excerpt" id="post-excerpt" rows="5" class="dokan-form-control" placeholder="<?php esc_attr_e( 'Short description of the product...', 'dokan-lite' ); ?>"><?php echo esc_attr( dokan_posted_textarea( 'post_excerpt' ) ); ?></textarea>
                                    </div>

                                    <?php dokan_get_template_part('products/dokan-category-header-ui', '', Helper::get_saved_products_category() ); ?>

                                    <div class="dokan-form-group">
                                        <label for="product_tag" class="form-label"><?php esc_html_e( 'Tags', 'dokan-lite' ); ?></label>
                                        <?php
                                            $terms            = dokan_posted_input( 'product_tag', true );
                                            $can_create_tags  = dokan_get_option( 'product_vendors_can_create_tags', 'dokan_selling' );
                                            $tags_placeholder = 'on' === $can_create_tags ? __( 'Select tags/Add tags', 'dokan-lite' ) : __( 'Select product tags', 'dokan-lite' );
                                        ?>
                                        <select multiple="multiple" name="product_tag[]" id="product_tag_search" class="product_tag_search product_tags dokan-form-control dokan-select2" data-placeholder="<?php echo esc_attr( $tags_placeholder ); ?>">
                                            <?php if ( ! empty( $terms ) ) : ?>
                                                <?php foreach ( $terms as $product_term_id ) : ?>
                                                    <?php $product_term = get_term( $product_term_id ); ?>
                                                    <option value="<?php echo esc_attr( $product_term->term_id ); ?>" selected="selected" ><?php echo esc_html( $product_term->name ); ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>

                                    <?php do_action( 'dokan_new_product_after_product_tags' ); ?>
                                </div>
                            </div>

                            <div class="dokan-form-group">
                                <label for="post_content" class="control-label"><?php esc_html_e( 'Description', 'dokan-lite' ) ?> <i class="fas fa-question-circle tips" data-title="<?php esc_attr_e( 'Add your product description', 'dokan-lite' ) ?>" aria-hidden="true"></i></label>
                                <?php wp_editor( htmlspecialchars_decode( $post_content, ENT_QUOTES ), 'post_content', array('editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_content') ); ?>
                            </div>

                            <?php do_action( 'dokan_new_product_form' ); ?>

                            <hr>

                            <div class="dokan-form-group dokan-right">
                                <?php wp_nonce_field( 'dokan_add_new_product', 'dokan_add_new_product_nonce' ); ?>
                                <?php
                                $display_create_and_add_new_button = true;
                                if ( function_exists( 'dokan_pro' ) && dokan_pro()->module->is_active( 'product_subscription' ) ) {
                                    if ( \DokanPro\Modules\Subscription\Helper::get_vendor_remaining_products( dokan_get_current_user_id() ) === 1 ) {
                                        $display_create_and_add_new_button = false;
                                    }
                                }
                                if ( $display_create_and_add_new_button ) :
                                ?>
                                <button type="submit" name="add_product" class="dokan-btn dokan-btn-default" value="create_and_add_new"><?php esc_attr_e( 'Create & Add New', 'dokan-lite' ); ?></button>
                                <?php endif; ?>
                                <button type="submit" name="add_product" class="dokan-btn dokan-btn-default dokan-btn-theme" value="create_new"><?php esc_attr_e( 'Create Product', 'dokan-lite' ); ?></button>
                            </div>

                        </form>

                    <?php } else { ?>

                        <?php dokan_seller_not_enabled_notice(); ?>

                    <?php } ?>

                <?php } else { ?>

                    <?php do_action( 'dokan_can_post_notice' ); ?>

                <?php } ?>
            </div>

            <?php

                /**
                 *  dokan_after_new_product_inside_content_area hook
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_after_new_product_inside_content_area' );
            ?>

        </div> <!-- #primary .content-area -->

        <?php

            /**
             *  dokan_dashboard_content_after hook
             *  dokan_after_new_product_content_area hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_after' );
            do_action( 'dokan_after_new_product_content_area' );
        ?>

    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>

<?php

    /**
     *  dokan_new_product_wrap_after hook
     *
     *  @since 2.4
     */
    do_action( 'dokan_new_product_wrap_after' );
?>
