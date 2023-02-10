
<!-- This block goes in header.php. its the woocommerce cart, and ties into the login/register links -->
<div class="custom_menu_top col-sm-1">
  <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    $cc = count($items);
    if ( is_user_logged_in() ) {
    wp_nav_menu( array(
    'menu' => "after_login", 
    ) );  
  ?>
  <span class="cart-count after-login"><?php echo $cc; ?></span> 
  <?php    
      } else {
    wp_nav_menu( array(
    'theme_location'    => 'top_menu',
    ));  
  ?>
  <span class="cart-count"><?php echo $cc; ?></span> 
  <?php }
  global $wp;
  $current_page_url = home_url($wp->request);
  if ($current_page_url == home_url("/shop")) {
    dynamic_sidebar( 'primary' );  ?>

  <div class="m-search">
      <a href="javascript:void(0);" class="mob-search">
          <i class="fa fa-search"></i>
      </a>
  </div>

  <?php } ?>            
</div>