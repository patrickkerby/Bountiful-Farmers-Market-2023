<?php
/**
 * New Order Email.
 *
 * An email sent to the vendor when a new order is created by customer.
 *
 * @class       VendorNewOrder
 * @version     2.6.8
 *
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }

$text_align = is_rtl() ? 'right' : 'left';

 /**
  * @hooked WC_Emails::email_header() Output the email header
  */
 do_action( 'woocommerce_email_header', $email_heading, $email );

 $order_url = esc_url( add_query_arg( array(
                'order_id'   => $order->get_order_number(),
                '_view_mode' => 'email',
                'permission' => '1',
            ), dokan_get_navigation_url( 'orders' ) ) );

?>

<p><?php printf( __( 'You have received an order from %s.', 'dokan-lite' ), $order->get_formatted_billing_full_name() ); ?></p>

<h2>
    <?php
    $before = '<a class="link" href="' . esc_url( $order_url ) . '">';
    $after  = '</a>';
    /* translators: %s: Order ID. */
    echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'dokan-lite' ) . $after . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) );
    ?>
</h2>

<div style="margin-bottom: 40px;">
    <table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
        <thead>
            <tr>
                <th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Product', 'dokan-lite' ); ?></th>
                <th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Quantity', 'dokan-lite' ); ?></th>
                <th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Price', 'dokan-lite' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                $order,
                array(
                    'show_sku'      => $sent_to_admin,
                    'show_image'    => false,
                    'image_size'    => array( 32, 32 ),
                    'plain_text'    => $plain_text,
                    'sent_to_admin' => $sent_to_admin,
                )
            );
            ?>
        </tbody>
        <tfoot>
            <?php
            $item_totals = $order->get_order_item_totals();

            if ( $item_totals ) {
                $i = 0;
                foreach ( $item_totals as $total ) {
                    $i++;
                    ?>
                    <tr>
                        <th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post( $total['label'] ); ?></th>
                        <td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post( $total['value'] ); ?></td>
                    </tr>
                    <?php
                }
            }

            $order_id = $order->get_order_number();

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


            // $shipping_method = $order->get_meta('custom_shipping_method');
            // $shipping_date = $order->get_meta('preferred_date');
            // $shipping_time = $order->get_meta('preferred_time');
            
            $show_date_time = "$shipping_date[0] "." $shipping_time[0]";
            ?>
                    <tr>
                        <th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>text-transform: capitalize;"> Order <?php echo $shipping_method[0]; ?> :</th>

                        <td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $show_date_time; ?></td>

                    </tr>

                    <?php
            if ( $order->get_customer_note() ) {
                ?>
                <tr>
                    <th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Note:', 'dokan-lite' ); ?></th>
                    <td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
                </tr>
                <?php
            }
            ?>
        </tfoot>
    </table>
</div>

<?php 
 do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email );

 /*
  * @hooked WC_Emails::order_meta() Shows order meta data.
  */
 do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::customer_details() Shows customer details
  * @hooked WC_Emails::email_address() Shows email address
  */
 do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::email_footer() Output the email footer
  */
 do_action( 'woocommerce_email_footer', $email );