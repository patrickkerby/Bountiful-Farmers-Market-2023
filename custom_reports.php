<?php
/**
 *  Dokan Dashboard Template
 *
 *  Dokan Main Dahsboard template for Fron-end
 *
 *  @since 2.4
 *
 *  @package dokan
 */
?>
<div class="dokan-dashboard-wrap">
    <?php
        /**
         *  dokan_dashboard_content_before hook
         *
         *  @hooked get_dashboard_side_navigation
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_before' );
    ?>

    <div class="dokan-dashboard-content">

        <?php
            /**
             *  dokan_dashboard_content_before hook
             *
             *  @hooked show_seller_dashboard_notice
             *
             *  @since 2.4
             */
            do_action( 'dokan_help_content_inside_before' );
        ?>
<?php           
    $user_id = get_current_user_id();
    $status = '';
    $by_shipping_method = '' ;
    $shipping_method_date = '' ;
        if ($_GET["by_status"]) {
            $status = $_GET["by_status"];
        }
        else{
            $status = 'any';
        }

        if ($_GET["by_shipping_method"]) {
            $by_shipping_method =  array(
                        'key'     => 'custom_shipping_method',
                        'value'   =>  $_GET["by_shipping_method"],
                    );
        }

         if ($_GET["shipping_method_date"]) {
            $shipping_method_date =  array(
                        'key'     => 'preferred_date',
                        'value'   =>  $_GET["shipping_method_date"],
                    );
        }
        // else{
        //     $by_shipping_method = 'any';
        // }

?>
        <article class="help-content-area">
        	<h1>Custom Reports</h1>
            <div class= "all_custom_filters">
                <form class="filters_form" method="get">
                    <select name="by_status">
                        <option value="">Select Order Status</option>
                        <option value="wc-processing" <?php echo $status == 'wc-processing' ? 'selected' : '' ; ?>>Processing</option>
                        <option value="wc-completed" <?php echo $status == 'wc-completed' ? 'selected' : '' ; ?>>Completed</option>
                        <option value="wc-failed" <?php echo $status == 'wc-failed' ? 'selected' : '' ; ?>>Failed</option>
                        <option value="wc-pending" <?php echo $status == 'wc-pending' ? 'selected' : '' ; ?>>Pending-payment</option>
                        <option value="wc-on-hold" <?php echo $status == 'wc-on-hold' ? 'selected' : '' ; ?>>On-hold</option>
                        <option value="wc-cancelled" <?php echo $status == 'wc-cancelled' ? 'selected' : '' ; ?>>Cancelled</option>
                        <option value="wc-refunded" <?php echo $status == 'wc-refunded' ? 'selected' : '' ; ?>>Refund</option>
                    </select>
                    <select name="by_shipping_method">
                        <option value="">Select Shipping Method</option>
                        <option value="pickup" <?php echo $_GET["by_shipping_method"] == 'pickup' ? 'selected' : '' ; ?>>Pickup</option>
                        <option value="delivery" <?php echo $_GET["by_shipping_method"] == 'delivery' ? 'selected' : '' ; ?>>Delivery</option>
                    </select>
                    <div class="custom_reports_filters">
                         <label for="shipping_method_date">Select Delivery/Pickup date</label>
                         <input type="text" class="my-field-class form-row-wide" id="datepicker_custom_report_page" name="shipping_method_date" value="<?php echo $_GET['shipping_method_date']; ?>" readonly="readonly">
                    </div>
                    <input type="submit" name="submit" value="Apply" class="custom_form_filters_submit">
                </form>
                <a class="clear_filter_custom_report" href="<?php echo site_url(); ?>/dashboard/custom_reports">Clear Filters</a>
                </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order No.</th>   
                            <th>Order Date</th>                             
                            <th>Shipping Method</th>
                            <th>Shipping Date</th>
                            <th>Shipping Time</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                        <tbody>
                  <?php 

if ($user_id) {

    $filters = array(
    // 'meta_key' => "_dokan_vendor_id",
    'post_status' => $status,
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    // 'orderby' => 'modified',
    // 'status' => 'completed',
    'order' => 'ASC',
    'meta_value'  => $user_id,
                'meta_query' => array(
                    array(
                        'key'     => '_dokan_vendor_id',
                        'value'   => $user_id,
                    ),
                    // $by_shipping_method
                    // ,
                    // $shipping_method_date
                ),
);
// echo "<pre>";
// print_r($filters);
// die;

    $loop = new WP_Query( $filters );

// $posts = new WP_Query( $args );
if ( $loop->have_posts() ) {

               while ( $loop->have_posts() ) {

                    $loop->the_post();
                    $order_id = get_the_ID();
                    $order = wc_get_order( $order_id );
                    $order_status  = $order->get_status(); // Get the order status (see the conditional method has_status() below)
                    $total_amount = $order->get_total();
                    $parent_id =  has_post_parent($order_id);

                    $shipping_method = '';
                    $shipping_date = '';
                    $shipping_time =  '';

                        if ($parent_id) {
                            $p_id = wp_get_post_parent_id($order_id);
                            $shipping_method = get_post_meta( $p_id , 'custom_shipping_method'); 
                            $shipping_date = get_post_meta( $p_id , 'preferred_date'); 
                            $shipping_time = get_post_meta( $p_id , 'preferred_time'); 
                        }
                        else{
                             $shipping_method = get_post_meta( $order_id , 'custom_shipping_method');
                             $shipping_date = get_post_meta( $order_id , 'preferred_date'); 
                             $shipping_time = get_post_meta( $order_id , 'preferred_time'); 
                        }

                        $order_date = $order->order_date;

                        $newdate = date("F d,Y", strtotime($order_date));


                        $currency_code = $order->get_currency();
                        $currency_symbol = get_woocommerce_currency_symbol( $currency_code );
                   ?>

                    <?php if(( $shipping_method[0] == $_GET["by_shipping_method"] && $shipping_date[0] == $_GET["shipping_method_date"] ) || ($_GET["by_shipping_method"] == '' && $_GET["shipping_method_date"] == '' ) || ( $shipping_method[0] == $_GET["by_shipping_method"] && $_GET["shipping_method_date"] == '' ) || ($_GET["by_shipping_method"] == '' && $shipping_date[0] ==  $_GET["shipping_method_date"] ) ) {
                    ?>

                     <tr>
                            <td><a href="<?php echo dokan_get_navigation_url( 'single_custom_reports' );?>?OrderNumber=<?php echo  $order_id;  ?>"><?php echo $order_id; ?></a></td>
                            <td><?php echo $newdate; ?></td>
                            <td class="shipping_method_custom_tr_class"><?php echo $shipping_method[0]; ?></td>
                            <td><?php echo $shipping_date[0]; ?></td>
                            <td><?php echo $shipping_time[0]; ?></td>
                            <td><?php echo $currency_symbol; ?><?php echo $total_amount; ?></td>
                            <td><?php echo $order_status; ?></td>
                        </tr>
                        <?php } ?>
<?php
               }
            }
            else{
                echo '<p class="no_records_found">No Records Found</p>';
            }

wp_reset_query();

}
?>
                    </tbody>
                </table>
            </div>

        </article><!-- .dashboard-content-area -->

         <?php
            /**
             *  dokan_dashboard_content_inside_after hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_inside_after' );
        ?>


    </div><!-- .dokan-dashboard-content -->

    <?php
        /**
         *  dokan_dashboard_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
    ?>

</div><!-- .dokan-dashboard-wrap -->


<script>
    $( function() {
        $( "#datepicker_custom_report_page" ).datepicker({ dateFormat: 'MM d, yy',
            beforeShowDay: function(date){                          
                if(date.getDay() == 0  || date.getDay() == 5 || date.getDay() == 6){
                    return [true];
                } else {
                    return [false];
                }
              },
        });
    });
</script>