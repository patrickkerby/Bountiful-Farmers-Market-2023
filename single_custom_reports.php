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
        	$order_id = $_GET["OrderNumber"];
        	 $order = wc_get_order( $order_id );
        	 // $shipping_method = get_post_meta( $order_id , 'custom_shipping_method'); 
        	 // $shipping_date = get_post_meta( $order_id , 'preferred_date'); 
        	 // $shipping_time = get_post_meta( $order_id , 'preferred_time'); 
           $parent_id =  has_post_parent($order_id);
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

        	 ?>


        <article class="help-content-area">
        	<h1>Order Number : <?php echo $order_id ;?></h1>
            <div class ="order_data_card">
            	<h6><span>Order Date</span> : <?php echo $newdate; ?></h6>
            	<h6 class="shipping_method_custom_tr_class"><span>Shipping Type</span> : <?php echo $shipping_method[0]; ?></h6>

            	<h6><span>Shipping Date</span> : <?php echo $shipping_date[0]; ?></h6>
                <h6><span>Shipping Time</span> : <?php echo $shipping_time[0] ; ?></h6>

 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  	  <?php           	foreach ( $order->get_items() as $item_id => $item ) {
   // $product_id = $item->get_product_id();
   // $variation_id = $item->get_variation_id();
   // $product = $item->get_product(); // see link above to get $product info
   $product_name = $item->get_name();
   $quantity = $item->get_quantity();
   // $subtotal = $item->get_subtotal();
   // $total = $item->get_total();
   // $tax = $item->get_subtotal_tax();
   // $tax_class = $item->get_tax_class();
   // $tax_status = $item->get_tax_status();
   // $allmeta = $item->get_meta_data();
   // $somemeta = $item->get_meta( '_whatever', true );
   // $item_type = $item->get_type(); // e.g. "line_item"
   // echo $product_name;
?>
    <tr>
      <td> <?php print_r($product_name) ; ?> </td>
      <td><?php echo $quantity; ?></td>
    </tr>
    <?php
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