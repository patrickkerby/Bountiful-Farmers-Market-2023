<?php
/**
 * Dokan functions and definitions
 *
 * @package Dokan
 * @since Dokan 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Dokan 1.0
 */

if ( !isset( $content_width ) ) {
    $content_width = 640;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Dokan 1.0
 */
class WeDevs_Dokan_Theme {

    function __construct() {

        //includes file
        $this->includes();

        // init actions and filter
        $this->init_filters();
        $this->init_actions();

        // initialize classes
        $this->init_classes();
    }

    /**
     * Initialize filters
     *
     * @return void
     */
    function init_filters() {
        add_filter( 'wp_title', array( $this, 'wp_title' ), 10, 2 );
        add_filter( 'dokan_ls_theme_tags', array( $this, 'live_search_support' ), 10, 2 );
    }

    /**
     * Init action hooks
     *
     * @return void
     */
    function init_actions() {
        add_action( 'after_setup_theme', array( $this, 'setup' ) );
        add_action( 'widgets_init', array( $this, 'widgets_init' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
        add_action( 'dokan_admin_menu', array( $this, 'slider_page' ) );
    }

    public function init_classes() {
        Dokan_Slider::init();
    }


    function includes() {
        $lib_dir     = dirname( __FILE__ ) . '/lib/';
        $inc_dir     = dirname( __FILE__ ) . '/includes/';
        $classes_dir = dirname( __FILE__ ) . '/classes/';

        require_once $classes_dir . 'slider.php';

        require_once $inc_dir . 'wc-functions.php';
        require_once $inc_dir . 'wc-template.php';

        if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/classes/customizer.php' ) ) {
            require_once get_stylesheet_directory() . '/classes/customizer.php';
        } else {
            require_once $classes_dir . 'customizer.php';
        }

        if ( is_admin() ) {

        } else {
            require_once $lib_dir . 'bootstrap-walker.php';
            require_once $inc_dir . 'template-tags.php';
        }
    }

    /**
     * Setup dokan
     *
     * @uses `after_setup_theme` hook
     */
    function setup() {

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         */
        load_theme_textdomain( 'dokan-theme', get_template_directory() . '/languages' );

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Enable support for Post Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( array(
            'primary'  => __( 'Primary Menu', 'dokan-theme' ),
            'top-left' => __( 'Top Left', 'dokan-theme' ),
            'footer'   => __( 'Footer Menu', 'dokan-theme' ),
        ) );

        add_theme_support( 'woocommerce' );

        // Support gallery image for single product page
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        /*
         * This theme supports custom background color and image,
         * and here we also set up the default background color.
         */
        add_theme_support( 'custom-background', array(
            'default-color' => 'F7F7F7',
        ) );

        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    }

    /**
    * Live search module on support
    *
    * @since 2.3.1
    *
    * @return void
    **/
    public function live_search_support( $themes ) {
        $themes['dokan-theme'] = '#primary';
        return $themes;
    }

    /**
     * Register widgetized area and update sidebar with default widgets
     *
     * @since Dokan 1.0
     */
    function widgets_init() {

        $sidebars = array(
            array( 'name' => __( 'General Sidebar', 'dokan-theme' ), 'id' => 'sidebar-1' ),
            array( 'name' => __( 'Home Sidebar', 'dokan-theme' ), 'id' => 'sidebar-home' ),
            array( 'name' => __( 'Blog Sidebar', 'dokan-theme' ), 'id' => 'sidebar-blog' ),
            array( 'name' => __( 'Header Sidebar', 'dokan-theme' ), 'id' => 'sidebar-header' ),
            array( 'name' => __( 'Shop Archive', 'dokan-theme' ), 'id' => 'sidebar-shop' ),
            array( 'name' => __( 'Single Product', 'dokan-theme' ), 'id' => 'sidebar-single-product' ),
            array( 'name' => __( 'Footer Sidebar - 1', 'dokan-theme' ), 'id' => 'footer-1' ),
            array( 'name' => __( 'Footer Sidebar - 2', 'dokan-theme' ), 'id' => 'footer-2' ),
            array( 'name' => __( 'Footer Sidebar - 3', 'dokan-theme' ), 'id' => 'footer-3' ),
            array( 'name' => __( 'Footer Sidebar - 4', 'dokan-theme' ), 'id' => 'footer-4' ),
        );

        $args = apply_filters( 'dokan_widget_args', array(
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        foreach ( $sidebars as $sidebar ) {

            $args['name'] = $sidebar['name'];
            $args['id'] = $sidebar['id'];

            register_sidebar( $args );
        }
    }

    /**
     * Enqueue scripts and styles
     *
     * @since Dokan 1.0
     */
    function scripts() {

        $protocol           = is_ssl() ? 'https' : 'http';
        $template_directory = get_template_directory_uri();
        $skin               = get_theme_mod( 'color_skin', 'orange.css' );

        wp_register_style( 'dokan-fontawesome', $template_directory . '/assets/css/font-awesome.min.css', false, null );

        // wp_enqueue_script( 'jquery' );
        // wp_enqueue_script( 'jquery-ui' );
        // register styles
        // wp_enqueue_style( 'bootstrap', $template_directory . '/assets/css/bootstrap.css', false, null );
        wp_enqueue_style( 'flexslider', $template_directory . '/assets/css/flexslider.css', false, null );
        wp_enqueue_style( 'dokan-fontawesome' );
        // wp_enqueue_style( 'dokan-opensans', $protocol . '://fonts.googleapis.com/css?family=Open+Sans:400,700' );
        wp_enqueue_style( 'dokan-theme', $template_directory . '/style.css', false, null );
        wp_enqueue_style( 'dokan-theme-skin', $template_directory . '/assets/css/skins/' . $skin, false, null );

        /****** Scripts ******/
        if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        if ( is_singular() && wp_attachment_is_image() ) {
            wp_enqueue_script( 'keyboard-image-navigation', $template_directory . '/assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
        }


        // wp_enqueue_script( 'bootstrap-min', $template_directory . '/assets/js/bootstrap.min.js', false, null, true );
        wp_enqueue_script( 'flexslider', $template_directory . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ) );

        wp_enqueue_script( 'dokan-theme-scripts', $template_directory . '/assets/js/script.js', false, null, true );
    }

    /**
     * Create a nicely formatted and more specific title element text for output
     * in head of document, based on current view.
     *
     * @since Dokan 1.0.4
     *
     * @param string  $title Default title text for current view.
     * @param string  $sep   Optional separator.
     * @return string The filtered title.
     */
    function wp_title( $title, $sep ) {
        global $paged, $page;

        if ( is_feed() ) {
            return $title;
        }

        // Add the site name.
        $title .= get_bloginfo( 'name' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title = "$title $sep $site_description";
        }

        // Add a page number if necessary.
        if ( $paged >= 2 || $page >= 2 ) {
            $title = "$title $sep " . sprintf( __( 'Page %s', 'dokan-theme' ), max( $paged, $page ) );
        }

        return $title;
    }

    public function slider_page() {
        add_submenu_page( 'themes.php', __( 'Slider', 'dokan-theme' ), __( 'Slider', 'dokan-theme' ), 'manage_options', 'edit.php?post_type=dokan_slider' );
    }

}

$dokan = new WeDevs_Dokan_Theme();

//Disable theme and plugin auto update
add_filter( 'auto_update_plugin', '__return_false' );

add_filter( 'auto_update_theme', '__return_false' );
//Disable theme and plugin auto update

function disable_plugin_updates( $values ) {

   foreach($values as $value) {
       unset( $value->response['plugin/plugin.php'] );
   }
   return;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );



// Search code for only products code start

add_action( 'pre_get_posts', 'wpse223576_search_woocommerce_only' );

function wpse223576_search_woocommerce_only( $query ) {
  if( ! is_admin() && is_search() && $query->is_main_query() ) {
    $query->set( 'post_type', 'product' );
  }
}

// Search code for only products code start

//Custom Menu Code Start

function my_custom_menu() {
    register_nav_menus(
        array(
            'top_menu' => _( 'Top menu' )
        )
    );
}
add_action( 'init', 'my_custom_menu' );

//Custom Menu Code End

//Custom Widget Code Start
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */

     register_sidebar(
        array(
            'id'            => 'product_filters_custom',
            'name'          => __( 'Product Filters' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

//Custom Widget Code Start

//Redirect After Logout Code Start

add_action('wp_logout','njengah_homepage_logout_redirect');

function njengah_homepage_logout_redirect(){

    wp_redirect( home_url() );

    exit;

}

//Redirect After Logout Code End

// Dokan add custom page & menu to Vendor Dashboard Start

add_filter( 'dokan_query_var_filter', 'dokan_load_document_menu' );
function dokan_load_document_menu( $query_vars ) {
    $query_vars['custom_reports'] = 'custom_reports';
    $query_vars['single_custom_reports'] = 'single_custom_reports';
    return $query_vars;
}
add_filter( 'dokan_get_dashboard_nav', 'dokan_add_help_menu' );
function dokan_add_help_menu( $urls ) {
    $urls['custom_reports'] = array(
        'title' => __( 'Custom Reports', 'dokan'),
        'icon'  => '<i class="fa fa-file"></i>',
        'url'   => dokan_get_navigation_url( 'custom_reports' ),
        'pos'   => 51
    );
    return $urls;
}
add_action( 'dokan_load_custom_template', 'dokan_load_template' );
function dokan_load_template( $query_vars ) {
    if ( isset( $query_vars['custom_reports'] ) ) {
        require_once dirname( __FILE__ ). '/custom_reports.php';
       }
    if ( isset( $query_vars['single_custom_reports'] ) ) {
        require_once dirname( __FILE__ ). '/single_custom_reports.php';
       }
}

// Dokan add custom page & menu to Vendor Dashboard End


// Add Custom Sorting options to shop page Woocommerce Start

add_filter( 'woocommerce_catalog_orderby', 'remove_default_sorting_options' );
    
function remove_default_sorting_options( $options ){
    
    // unset( $options[ 'popularity' ] ); // Sort by popularity
    unset( $options[ 'menu_order' ] ); // Default sorting
    unset( $options[ 'rating' ] ); // Sort by average rating
    unset( $options[ 'date' ] ); // Sort by latest
    //unset( $options[ 'price' ] ); // Sort by price: low to high
    //unset( $options[ 'price-desc' ] ); // Sort by price: high to low
    
    return $options;
    
}

add_filter( 'woocommerce_catalog_orderby', 'add_custom_sorting_options' );

function add_custom_sorting_options( $options ){
    
    $options[ 'title' ] = 'Sort alphabetically';    
    return $options;
}


add_action( 'woocommerce_before_checkout_form', 'wnd_checkout_code', 10 );

function wnd_checkout_code( ) {
 echo '<h6 class="custom_text_on_top_checkout_page">All orders are final. No cancellation, refunds or exchanges will be processed once an order has been placed. Please double check your order and delivery/pickup date.</h6>';
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_product_sorting' );
function custom_product_sorting( $args ) {
    
    // Sort alphabetically
    if ( isset( $_GET[ 'orderby' ] ) && 'title' === $_GET[ 'orderby' ] ) {
        $args[ 'orderby' ] = 'title';
        $args[ 'order' ] = 'asc';
    }
    
    return $args;
}


add_filter( 'woocommerce_catalog_orderby', 'change_sorting_options_order', 5 );

function change_sorting_options_order( $options ){
    
    $options = array(
        'title'      => __( 'Sort alphabetically', 'woocommerce'),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ), // I need sorting by price to be the first
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
    );
    
    return $options;
}


// Add Custom Sorting options to shop page Woocommerce End


/**
 * Replace the home link URL
 */
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return 'https://bountiful.valontech.com/shop/';
}

// Remove Woocommerce More seller Tab and Shipping Tab from Products Tab Code start

add_filter( 'woocommerce_product_tabs', 'my_remove_reviews_tab',98 );
 
  function my_remove_reviews_tab( $tabs ) {
    unset( $tabs['more_seller_product'] );
    unset($tabs['shipping']);
    return $tabs;
  }

// Remove Woocommerce More seller Tab and Shipping Tab from Products Tab Code End


  /*
Show Seller name on the product thumbnail
For Dokan Multivendor plugin 
*/

  add_action( 'woocommerce_after_shop_loop_item','sold_by' );
    function sold_by(){
    ?>
        </a>
        <?php
            global $product;
            $seller = get_post_field( 'post_author', $product->get_id());
             $author  = get_user_by( 'id', $seller );

            $store_info = dokan_get_store_info( $author->ID );
            if ( !empty( $store_info['store_name'] ) ) { ?>
                    <span class="details">
                        <?php printf( '<a class="hover-link" href="%s"><span>More from:</span> %s</a>', dokan_get_store_url( $author->ID ), $author->display_name ); ?>
                    </span>
            <?php 
        } 

    }

      /*
Show Seller name on the product thumbnail
For Dokan Multivendor plugin 
*/


// Disable Shipping from cart page

    function disable_shipping_calc_on_cart( $show_shipping ) {
    if( is_cart() ) {
        return false;
    }
    return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

// Disable Shipping from cart page


// Set Default country to Canada 
add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
function change_default_checkout_country() {
  return 'CA'; // country code
}
// Set Default country to Canada

// Add back Button in Product Detail page
add_action('woocommerce_before_main_content', 'backbutton', 5);
function backbutton() {
    echo ' <button type="button" class="back_button_detail_page" onclick="backfunc()"> Back </button> ';
}

// Add back Button in Product Detail page

//Signup Form Submit Functionality Code start

add_action("wp_ajax_signup_submit", "signup_submit");
add_action("wp_ajax_nopriv_signup_submit", "signup_submit");


function signup_submit(){

    $arr=[];    
    wp_parse_str($_POST['signup_submit'],$arr);

    $full_name = $arr['full_name'];
    $last_name = $arr['last_name'];
    $email = $arr['email'];
    $password = $arr['password'];
    $contact_number = $arr['contact_number'];

    $exists = email_exists( $email );

    if ($exists) {
        echo 2;
        wp_die();
    }

    else{

            $userdata = array( 
                'user_pass' => $password, 
                'user_email' => $email, 
                'user_login' => $email, 
            ); 
          
        $user_id = wp_insert_user($userdata);
        $new_role = array("user" => 1);   

          update_user_meta( $user_id, 'first_name', $full_name);
          update_user_meta( $user_id, 'last_name', $last_name);
          update_user_meta( $user_id, 'contact_number', $contact_number);
          update_user_meta( $user_id, 'wpfm_capabilities',$new_role);
          update_user_meta( $user_id, 'pw_user_status','approved');

        if ($user_id) {
            echo 1 ; 
            wp_die();
        }
        else{
            echo 0 ; 
            wp_die();
        }
    }
    
}

//Signup Form Submit Functionality Code end


//Login Form Submit Functionality Code start

add_action("wp_ajax_login_submit", "login_submit");
add_action("wp_ajax_nopriv_login_submit", "login_submit");


function login_submit(){

    $arr=[];    
    wp_parse_str($_POST['login_submit'],$arr);

    // print_r($arr);
    $email = $arr['email'];
    $password = $arr['password'];

    $exists = email_exists( $email );

    if (!$exists) {
        echo 2;
        wp_die();
    }
    else{
      $user = get_user_by( 'email', $email );
      $id = $user->ID;

       $user_meta = get_userdata($id);
       $user_roles = $user_meta->roles;
       $role = $user_roles[0];

   $get_res=wp_authenticate( $email, $password );

        if (!is_wp_error($get_res) && $role == "user") {

              wp_set_current_user( $idd, $user->user_login );
                wp_set_auth_cookie($user->ID);
                echo 1;
                wp_die();
        }
        elseif (!is_wp_error($get_res) && $role == "seller") {

          wp_set_current_user( $idd, $user->user_login );
                wp_set_auth_cookie($user->ID);
                echo 3;
                wp_die();
          
        }
        else{
            echo 0 ; 
            wp_die();
        }
    }
}
    

//Login Form Submit Functionality Code end


//Forgot Password Form Submit Functionality Code start

add_action("wp_ajax_forgot_password_submit", "forgot_password_submit");
add_action("wp_ajax_nopriv_forgot_password_submit", "forgot_password_submit");


function forgot_password_submit(){

    $arr=[];    
    wp_parse_str($_POST['forgot_password_submit'],$arr);

    $email = $arr['email'];

    $exists = email_exists( $email );

    if (!$exists) {
        echo 2;
        wp_die();
    }
    else{

      $user = get_user_by( 'email', $email );
      $user->user_login;
      $key=get_password_reset_key($user);

      $my_data = array(
          'ID'           => $user->ID,
          'user_activation_key' =>$key
      );
 
          // Update the post into the database
          wp_update_user( $my_data );

                    $to = $email;
                    $subject = 'Forget Password';
                    $fromname = 'Bountiful';
                    $fromemail = get_option( 'admin_email' ); 
                    // $fromemail='test@gmail.com';
                    $message="<p>Hello,</p> "; 
                    $message.="<p>A request has been received to change the password for your account.</p>"; 
                    
                    $message.="<p><a href='https://bountiful.valontech.com/reset-password/?key=".$key."'>Click Here:Reset Password</a></p>";
                    // $message.="<a href='".site_url()."/reset-password'>Reset Password</a><br>";
                    $message.="<p>Thanks</p>";

                    $headers[] = 'MIME-Version: 1.0' . "\r\n";
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers[] = "X-Mailer: PHP \r\n";
                    $headers[] = "From: ".$fromname." <".$fromemail.">";

                    $mail = wp_mail( $to, $subject, $message , $headers );


                    if( $mail ) {
                     echo 1;
                     wp_die();
                     // echo "mail send";
                    } 
                    else {
                    echo 0;
                    wp_die();
                    }   
                
    }
}
    

//Forgot Password Form Submit Functionality Code end


//Reset Password Form Submit Functionality Code Start

add_action('wp_ajax_reset_password_submit', 'reset_password_submit');
add_action('wp_ajax_nopriv_reset_password_submit', 'reset_password_submit');
   
   function reset_password_submit() {

    $arr=[];    
    wp_parse_str($_POST['reset_password_submit'],$arr);

    $id    = $arr['id'];
    $email = $arr['email'];
    $password = $arr['password']; 

    // echo $id;
    // die;


$user_data = wp_update_user(
 array( 'ID' => $id,
  'user_pass' => $password ) 
);
 
  if ( is_wp_error( $user_data ) ) {
      // There was an error; possibly this user doesn't exist.
      echo 0;
      wp_die();
  } 
  else {
      // Success!
      echo 1;
      wp_die();
  }
  
}

//Reset Password Form Submit Functionality Code End


//Event Form Submit Functionality Code start

add_action("wp_ajax_event_submit", "event_submit");
add_action("wp_ajax_nopriv_event_submit", "event_submit");


function event_submit(){

    $arr=[];    
    wp_parse_str($_POST['event_submit'],$arr);
    $event_name = $arr['event_name'];
    $name = $arr['uname'];
    $email = $arr['email'];
    $phone_number = $arr['phone_number'];
    $optradio = $arr['optradio'];

        $to        =  get_option( 'admin_email' ); 
        // $to        =  'test143434@mailinator.com'; 
        $subject   = 'New Event Register Request';
        $fromname  = 'Bountiful';
        $fromemail = 'noreply@bountiful.com'; 
        // $fromemail='test@gmail.com';
        $message="<p>Hello,</p> "; 
        $message.="<p>An event register request is received.</p>"; 
        
        $message.="<p>Name: ".$name ."</p>";
        $message.="<p>Email: ".$email ."</p>";
        $message.="<p>Phone Number: ".$phone_number ."</p>";
        $message.="<p>Event Name: ".$event_name ."</p>";
        // $message.="<a href='".site_url()."/reset-password'>Reset Password</a><br>";
        $message.="<p>Thanks</p>";

        $headers[] = 'MIME-Version: 1.0' . "\r\n";
        $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers[] = "X-Mailer: PHP \r\n";
        $headers[] = "From: ".$fromname." <".$fromemail.">";


         // $headers[] = 'From: email <wordpress@vpcapitallending.com>';

        $mail = wp_mail( $to, $subject, $message , $headers );


        if( $mail ) {
         echo 1;
         wp_die();
         // echo "mail send";
        } 
        else {
        echo 0;
        wp_die();
        }   
   
}

//Event Form Submit Functionality Code end


//Event Form Submit Functionality Code start

add_action("wp_ajax_date_range_filter", "date_range_filter");
add_action("wp_ajax_nopriv_date_range_filter", "date_range_filter");


function date_range_filter(){

$val=$_POST['value'];

if ($val != null) {

	$dates = explode("&",$val);
	$start_date = $dates[0];
	$end_date = $dates[1];
	$args  = [
	'post_type'      => 'event_listing',
	'meta_query'     => [
	   [
	      'key'     => '_event_start_date',
	      'value'   => [$start_date, $end_date],
	      'compare' => 'BETWEEN',
	      'type'    => 'DATE'
	   ]
	]
	];
	
}
else{
	$args = array(
  'numberposts' => -1,
  'post_type'   => 'event_listing',
  'orderby' => 'date',
  'order' => 'ASC'
);
}


 $loop = new WP_Query( $args ); 

 $pp=get_posts($args);

 if($pp){
 $html='';
    while ( $loop->have_posts() ) : $loop->the_post(); 
    $post_id = get_the_ID();

 $meta = get_post_meta($post_id);

 $event_data =  get_event_type($post_id) ;
 
$event_type = $event_data[0]->slug;

//  $event_type = get_post_meta($post_id , 'event_type', true);

 if($event_type == 'community-booth'){
    $color= "#ffff62";
    $sub_color= "#ffe92a";
    } 
    elseif ($event_type == 'buskers') {
       $color= "#d3e4bd";
       $sub_color= "#92bc5c";
    }
    elseif ($event_type == 'contests') {
       $color= "#f29e5a";
       $sub_color= "#ed710c";
    }
    elseif ($event_type == 'entertainment') {
       $color= "#ed6666";
       $sub_color= "#f73b3b";
    }
    elseif ($event_type == 'kids') {
       $color= "#e5b5f2";
       $sub_color= "#c447e6";
    }
    else{
       $color= "#787afa";
       $sub_color= "#4547de";
    }


$eventPlace = get_post_meta($post_id , '_event_online',true);
if($eventPlace == 'yes'){
    $location = 'Online Event' ; 
}
else{
    $location = 'On Site' ; 
}
    

 $startDate= $meta['_event_start_date'][0];

 $StartDateD = explode(" ",$startDate);
 $finalDateStart = $StartDateD[0];

 $endDate= $meta['_event_end_date'][0];

 $EndDateD = explode(" ",$endDate);
 $finalDateEnd = $EndDateD[0];

 $startTime= $meta['_event_start_time'][0];

 $endTime= $meta['_event_end_time'][0];
    
    $html.='<div class="wpem-event-box-col wpem-col wpem-col-12 wpem-col-md-6 wpem-col-lg-4"><div class="wpem-event-layout-wrapper">';
    $html.='<div class="event_listing event-type-'.$event_type.'  post-'.get_the_ID().' type-event_listing status-publish has-post-thumbnail hentry event_listing_type-'.$event_type.'">';
    $html.='<a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "><div class="wpem-event-banner">';
    $html.='<div class="wpem-event-banner-img" style="background-image: url('.get_the_post_thumbnail_url().')">';
    $html.='<div class="wpem-event-date"><div class="wpem-event-date-type"></div></div></div></div></a>';
    $html.='<div class="wpem-event-infomation" style="background-color:  '.$color.' "><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color ">';
    $html.='<div class="wpem-event-date"><div class="wpem-event-date-type"><div class="wpem-from-date"><div class="wpem-date">08</div><div class="wpem-month">Jul</div></div><div class="wpem-to-date"><div class="wpem-date-separator">-</div>';
    $html.='<div class="wpem-date">15</div><div class="wpem-month">Jul</div></div></div></div>';
    $html.='</a><div class="wpem-event-details"><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "><div class="wpem-event-title"><h3 class="wpem-heading-text">'.get_the_title().'</h3>';
    $html.='</div><div class="wpem-event-date-time"><span class="wpem-event-date-time-text">'.$finalDateStart.'@'.$startTime.'-'.$finalDateEnd.'@'.$endTime.'</span></div><div class="wpem-event-location"><span class="wpem-event-location-text">'.$location.'</span>';
    $html.='</div></a><div class="wpem-event-type"><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "></a><a href="" class="custom-event-type-a">';
    $html.='<span class="custom-event-type-a-span" style="background-color: '.$sub_color.'!important ">'.$event_type.'</span></a></div></div></div></div></div></div>';

    endwhile;
}
else{
    $html = '<div class="custom-err-class"><p>There are no events matching your search.</p></div>';
}
echo $html;
wp_die();

}

// Register main datepicker jQuery plugin script
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );
function enabling_date_picker() {

    // Only on front-end and checkout page
    if( is_admin() || ! is_checkout() ){
         // wp_enqueue_script( 'jquery-ui-datepicker' );
        return;
    } 
    else{
            // Load the datepicker jQuery-ui plugin script
    wp_enqueue_script( 'jquery-ui-datepicker' );
    }


} 

function my_enqueue() {
    //   wp_enqueue_script( 'ajax-script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery') );
      wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 }
 add_action( 'wp_enqueue_scripts', 'my_enqueue' );


// Custom Checkout Fields
add_action( 'woocommerce_after_checkout_billing_form', 'custom_shipping_method' );

function custom_shipping_method( $checkout ){


	echo '<div id="my_custom_checkout_field">
    <h3>'.__('Delivery Info').'</h3>';

    echo '<p>'.__('"Please note that Deliveries are only within Edmonton. Delivery times are estimates only. If you are not available to receive your order, the products will be left on your doorstep."').'</p>';



    woocommerce_form_field( 'shipping_method_custom', array(
        'type' => 'select',
        'required' => true,
        'class' => array('form-row-wide'),
        'label' => 'Choose the Delivery method',
        'options' => get_ship_methods()
    ), $checkout->get_value( 'shipping_method_custom' ) );

  ?>
    <script>

        jQuery(function($){

            var shiping_method = "";
            var get_holidays_dates = [];
            jQuery("#shipping_method_custom").on("change", function () {
                shiping_method = jQuery(this).val();

                jQuery('#time_field').val('');
                jQuery('#datepicker').val('');

                    let link ="<?php echo admin_url('admin-ajax.php')?>";
                    let formData = new FormData;
                    formData.append('action' , 'get_holidays');
                    // formData.append('update_checkout_total' , shiping_method);

                    jQuery.ajax({
                            type        : "POST",
                            url         : link,
                            async       : true,
                            data        : formData,
                            processData : false,
                            contentType : false,
                            cache       : false,

                beforeSend: function() {
                 // jQuery("#loader").css("display","block");
                 jQuery("#datepicker").attr("disabled",true);
                },


                        success: function (data) {
                           var dd= JSON.parse(data);
                            get_holidays_dates = dd;
                            jQuery("#datepicker").attr("disabled",false);                          
                        },
                        error: function () {
                            alert("Error Accured...");
                        }
                    });
                });

      const d = new Date();
			let day = d.getDay();
			let hour = d.getHours();

			const mindate = (day , hours) =>{

				if (day <= 3) {
					if (hour < 18) {
						return '+1D';
					}
					else{
						return '+2D';
					}
				}
				else{
					if (hour < 18) {
						return '+2D';
					}
					else{
						return '+3D';
					}
				}
			}

            $( "#datepicker" ).datepicker({ minDate: mindate(day,hour) , maxDate: '+1M',
            	beforeShowDay: function(date){
                var ymd = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                console.log(get_holidays_dates);
                 if ($.inArray(ymd, get_holidays_dates) >= 0) {
                return [ false, 'holiday red', 'Red!' ];
            }
                     // console.log(holidays); 
                    if(shiping_method == "pickup"){  
                          
                         if(date.getDay() == 0  || date.getDay() == 5 || date.getDay() == 6){
                                            return [true];
                                        } else {
                                            return [false];
                                        }

                    }
                    else if(shiping_method == "delivery"){
                        if(date.getDay() == 5 || date.getDay() == 6){
                                            return [true];
                                        } else {
                                            return [false];
                                        }
                    }
                    else{
                        return [false];
                                    
                    }

		        },
                onSelect: function(dateText, inst) {
                    var date = $(this).datepicker('getDate');
                    var dayName = $.datepicker.formatDate('DD', date);

                    // console.log(dayName);
                    // return false;
                    // var dayOfWeek = date.getUTCDay();
                    var ship = jQuery('#shipping_method_custom').val();

                     // console.log(dayOfWeek);

                    let link ="<?php echo admin_url('admin-ajax.php')?>";
                    let formData = new FormData;
                    formData.append('action' , 'on_select_date');
                    formData.append('dayOfWeek' , dayName);
                    formData.append('ship' , ship);

                    // alert(dayOfWeek);
                    // return false;


                    jQuery.ajax({

                            type        : "POST",
                            url         : link,
                            async       : true,
                            data        : formData,
                            processData : false,
                            contentType : false,
                            cache       : false,


                        success: function (data) {
                            //alert("Ok");
                            
                            // console.log(data);
                            
                        
                            $('#time_field').html(data);
                          
                        },
                        error: function () {
                            alert("Error Accured...");
                        }
                    });


                }
     

             });

        });
    </script>
    <?php

   woocommerce_form_field( 'order_pickup_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'id'            => 'datepicker',
        'required'      => true,
        'label'         => ('Select Delivery Date'),
        'placeholder'   => ('Select Date'),
        // 'options'     	=>   $mydateoptions,

        ),$checkout->get_value( 'order_pickup_date' ));

    echo '</div>';

        woocommerce_form_field( 'time_field', array(
        'type' => 'select',
        'required' => true,
        'class' => array('form-row-wide'),
        'label' => 'Select Time Slot',
        'options'       => array(
            ''     => __( 'Select Time Slot', 'wps' )
        )
    ), $checkout->get_value( 'time_field' ) );

    }


   function get_ship_methods() {

    $leaders = [];
    // $leaders = ['' => 'Choose '];
    // $users = get_users( $args );
    $users = array("" => "Select Delivery Method" ,"delivery"=>"Delivery", "pickup"=>"Pickup");
    if($users){
       foreach($users as $key => $value){
           $leaders[$key] = $value;
       }
    }
    return $leaders;
   }

add_action('woocommerce_checkout_process', 'customised_checkout_field_process');

	function customised_checkout_field_process(){

		if (!$_POST['shipping_method_custom']) wc_add_notice(__('Please enter Shipping Method!') , 'error');

		if (!$_POST['order_pickup_date']) wc_add_notice(__('Please enter Preferred Date!') , 'error');

		if (!$_POST['time_field']) wc_add_notice(__('Please enter Preferred Time!') , 'error');

	}


// Save custom checkout field value as user meta data
add_action('woocommerce_checkout_update_order_meta','custom_checkout_checkbox_update_customer', 10, 2 );

	function custom_checkout_checkbox_update_customer( $order_id, $posted  ){	  

	   if( isset( $_POST['shipping_method_custom'] ) ) {
	    update_post_meta( $order_id, 'custom_shipping_method', $_POST['shipping_method_custom'] );
		}

	 	if( isset( $_POST['order_pickup_date'] ) ) {
	    update_post_meta( $order_id, 'preferred_date', $_POST['order_pickup_date'] );
	    }

    if( isset( $_POST['time_field'] ) ) {
    update_post_meta( $order_id, 'preferred_time', $_POST['time_field'] );
    }
	}

add_action( 'woocommerce_thankyou', 'cloudways_display_order_data', 20 );
add_action( 'woocommerce_view_order', 'cloudways_display_order_data', 20 );

	function cloudways_display_order_data( $order_id ){

$parent_id =  has_post_parent($order_id);
if ($parent_id) {
  $order_id = wp_get_post_parent_id($order_id);
}
  ?>
	    <h2><?php _e( 'Delivery Information' ); ?></h2>
	    <table class="shop_table shop_table_responsive additional_info">
	        <tbody>
	        	<tr>
	                <th><?php _e( 'Shipping Method:' ); ?></th>
	                <td><?php echo get_post_meta( $order_id, 'custom_shipping_method', true ); ?></td>
	            </tr>
	            <tr>
	                <th><?php _e( 'Delivery Date/Pickup:' ); ?></th>
	                <td><?php echo get_post_meta( $order_id, 'preferred_date', true ); ?></td>
	            </tr>
                <tr>
                    <th><?php _e( 'Delivery/Pickup Time:' ); ?></th>
                    <td><?php echo get_post_meta( $order_id, 'preferred_time', true ); ?></td>
                </tr>
	            
	        </tbody>
	    </table>
	<?php }



add_action( 'woocommerce_admin_order_data_after_order_details', 'cloudways_display_order_data_in_admin' );

	function cloudways_display_order_data_in_admin( $order ){
    $order_id =  $order->id;
    $parent_id =  has_post_parent($order_id);
if ($parent_id) {
  $order_id = wp_get_post_parent_id($order_id);
}
    ?>
	    <div class="order_data_column">
	        <h4><?php _e( 'Additional Information', 'woocommerce' ); ?><a href="#" class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a></h4>
	        <div class="address">
	        <?php
	            echo '<p><strong>' . __( 'Shipping Method:' ) . ':</strong>' . get_post_meta( $order_id, 'custom_shipping_method', true ) . '</p>';
	            echo '<p><strong>' . __( 'Delivery Date:' ) . ':</strong>' . get_post_meta( $order_id, 'preferred_date', true ) . '</p>';
                 echo '<p><strong>' . __( 'Delivery Time:' ) . ':</strong>' . get_post_meta( $order_id, 'preferred_time', true ) . '</p>'; ?>

	        </div>
	        <div class="edit_address">
	            <?php woocommerce_wp_text_input( array( 'id' => 'custom_shipping_method', 'label' => __( 'Some field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
	            <?php woocommerce_wp_text_input( array( 'id' => 'preferred_date', 'label' => __( 'Another field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
                <?php woocommerce_wp_text_input( array( 'id' => 'preferred_time', 'label' => __( 'Another field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
	        </div>
	    </div>
	<?php }



add_action( 'woocommerce_process_shop_order_meta', 'cloudways_save_extra_details', 45, 2 );

	function cloudways_save_extra_details( $post_id, $post ){
	    update_post_meta( $post_id, '_cloudways_text_field', wc_clean( $_POST[ 'custom_shipping_method' ] ) );
	    update_post_meta( $post_id, '_cloudways_dropdown', wc_clean( $_POST[ 'preferred_date' ] ) );
      update_post_meta( $post_id, '_cloudways_dropdown', wc_clean( $_POST[ 'preferred_time' ] ) );
	}

// Get holidays Code Start

add_action("wp_ajax_get_holidays", "get_holidays");
add_action("wp_ajax_nopriv_get_holidays", "get_holidays");

function get_holidays(){

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM `wpfm_add_holidays`");

$array = [];
foreach ($result as $value) {

array_push($array,$value->dates);

}

echo json_encode($array);
wp_die();

}

// Get holidays Code Start


add_action("wp_ajax_on_select_date", "on_select_date");
add_action("wp_ajax_nopriv_on_select_date", "on_select_date");

function on_select_date(){

    global $wpdb;

   $day  =  $_POST['dayOfWeek'];
   $ship  =  $_POST['ship'];

$result = $wpdb->get_results("SELECT * FROM `wpfm_cutoff_lead_time` WHERE `shipping_method` = '$ship' AND `day_id` = '$day'");

foreach ($result as $value) {
// print_r($value->to_time);
$time = "$value->to_time"."$value->to_time_am_pm-"."$value->from_time"."$value->from_time_am_pm" ;
 ?>
     <option value="<?php echo $time ; ?>"><?php echo $time;?></option>
 
 <?php  }  

wp_die();

}


// CutOff lead time menu in admin dashboard

add_action( 'admin_menu', 'cut_off_lead_time_menu' );
    function cut_off_lead_time_menu(){
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Admin', 'Delivery times', 'manage_options', 'cut_off_lead_time', 'add_cutoff_time', 'dashicons-welcome-widgets-menus', 15 );
    // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '', $position = null )
    add_submenu_page( 'cut_off_lead_time', 'Show All Delivery times Enteries', 'Show All Delivery times Enteries','manage_options', 'show-all-cutoff-enteries', 'showEnteries');
    // add_submenu_page('add-menu','show data','Show Data','manage_options','add-menu-sub','show_data');

    add_submenu_page( 'cut_off_lead_time', 'Add Holidays', 'Add Holidays','manage_options', 'add-holidays', 'add_holidays');
      }


function add_cutoff_time(){ ?>

<h2>Add Cut Off lead time</h2>
<form action="" id="submit" method="post">
    <div class="form-group">
        <label for="shipping-method">Choose Shipping Method</label>
        <select name="shipping_method" class="shipping-method-admin">
            <option value="">Choose Day</option>    
            <option value="delivery">Delivery</option>
            <option value="pickup">Pickup</option>
        </select>
    </div>
    <div class="form-group">
        <label for="day">Choose Day</label>
        <select name="day_select_admin" class="day-select-admin">
            <option value="">Choose Day</option>
       <!--      <option value="4">Friday</option>
            <option value="5">Saturday</option> -->
        </select>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <label for="day">Choose Time-Slot</label>
        </div>
        <div class="col-lg-3">
            <input type="text" class="time-text" name="to_time" id="to-time">
        </div>
        <div class="col-lg-3">
            <select name="to_time_am_pm" id="to_time_am_pm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        </div>
        <div class="col-lg-3">
            <input type="text" class="time-text" name="from_time" id="from-time">
        </div>
        <div class="col-lg-3">
            <select name="from_time_am_pm" id="to_time_am_pm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        </div>
    </div>

    <input type="submit" class="cutoff-submit" id="submit-cutoff-time-form" value="Save">
   
</form>

<?php 
}


function showEnteries(){ ?>
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">   
        <div class="table-responsive">
            <table border="1" id ="current-loan">
                <thead>
                    <tr>
                      <th>Shipping Method</th>            
                      <th>Day</th>
                      <th>Time-slot</th>
                      <th>Action</th>         
                    </tr>
                </thead>
                <?php 

                    global $wpdb;
                    $results = $wpdb->get_results( "SELECT * FROM `wpfm_cutoff_lead_time`");   
                    	foreach ($results as $object) {                      

                	// print_r($object);
                	$id = $object->ID;
                	$shipping_method = $object->shipping_method;
                	$day_id = $object->day_id;
                	$to_time = $object->to_time;
                	$to_time_am_pm = $object->to_time_am_pm;
                	$from_time = $object->from_time;
                	$from_time_am_pm = $object->from_time_am_pm;

            	?>
            	<tbody>
                    <tr>
                         <td> <?php echo $shipping_method; ?></td>
                         <td><?php if($day_id == "Friday"){
                         	echo "Friday";
                         }
                         elseif ($day_id == "Saturday") {
                         	echo "Saturday";
                         }
                         else{
                         	echo "Sunday";
                         }
                          ?></td>
                         <td><?php echo "$to_time $to_time_am_pm"." -"." $from_time $from_time_am_pm"; ?></td>

                        <td>
                              <a href="javascript:void(0);" class= "cancel" id= "btnCancel" value="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#cutoff<?php echo $id; ?>">
                              Edit
                              </a>
                       
                              <button class="delete_cutoff" id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">Delete</button>
                        </td> 
                    </tr>
                
                    <!-- Edit entry Code End -->
                    <div class="modal fade" id="cutoff<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="cut<?php echo $id; ?>" class="edit_cut_off_lead_time" method="post">
                                        <div class="form-group">
                                            <label for="shipping-method">Choose Shipping Method</label>
                                            <select name="shipping_method" class="shipping-method-admin" required>
                                                <option value="">Choose Day</option>    
                                                <option value="delivery" <?php echo ($shipping_method=="delivery") ? 'selected' : '' ?>>Delivery</option>
                                                <option value="pickup" <?php echo ($shipping_method=="pickup") ? 'selected' : '' ?>>Pickup</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="day">Choose Day</label>
                                            <select name="day_select_admin" class="day-select-admin" required>
                                                <option value="">Choose Day</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="day">Choose Time-Slot</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" class="time-text" name="to_time" id="to-time" value="<?php echo $to_time; ?>" maxlength="2" minlength="2" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <select name="to_time_am_pm" id="to_time_am_pm">
                                                    <option value="AM" <?php echo ($to_time_am_pm=="AM") ? 'selected' : '' ?>>AM</option>
                                                    <option value="PM" <?php echo ($to_time_am_pm=="PM") ? 'selected' : '' ?>>PM</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" class="time-text" name="from_time" id="from-time" value="<?php echo $from_time; ?>"  maxlength="2" minlength="2" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <select name="from_time_am_pm" id="from_time_am_pm">
                                                    <option value="AM" <?php echo ($from_time_am_pm=="AM") ? 'selected' : '' ?>>AM</option>
                                                    <option value="PM" <?php echo ($from_time_am_pm=="PM") ? 'selected' : '' ?>>PM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_cutoff" value="<?php echo $id; ?>">
                                        <input type="submit" class="cutoff-submit edit_cutoff-submit" id="<?php echo $id; ?>" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit entry Code End -->

                    <!-- Delete entry Code Start -->
                    <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h6>Are You Sure!! You Want to Delete</h6>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary delete_cutoff_button" id="<?php echo $id; ?>">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Delete entry Code End -->
                <?php	} ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}

function add_holidays(){ ?>
    <h1>Add Holidays</h1>

<form action="" id="add_holidays_form" method="post">    
  <div class="form-group">
      <label for="day">Select Holiday Dates</label>
      <input type="text" class="datepicker_add_holidays"  name="date_filter_to" readonly="readonly">
  </div>
    <input type="submit" class="add_holidays_submit" id="submit_add_holidays_submit" value="Save">   
</form>
    <?php
}



add_action("wp_ajax_admin_select_shipping", "admin_select_shipping");
add_action("wp_ajax_nopriv_admin_select_shipping", "admin_select_shipping");

function admin_select_shipping(){
    // echo "<pre>";
   $ship_method_admin  =  $_POST['shipMethod'];

  if($ship_method_admin == 'delivery'){
    echo "<option value='Friday'>Friday</option>";
    echo "<option value='Saturday'>Saturday</option>";   
    wp_die();
  }
  else{
    echo "<option value='Friday'>Friday</option>";
    echo "<option value='Saturday'>Saturday</option>";
    echo "<option value='Sunday'>Sunday</option>";
    wp_die();
  }
}

// Submit Cut off lead Time code start

add_action("wp_ajax_submit_cut_off", "submit_cut_off");
add_action("wp_ajax_nopriv_submit_cut_off", "submit_cut_off");

function submit_cut_off(){

    global $wpdb;   
    $arr=[];    
    wp_parse_str($_POST['submit_cut_off'],$arr);

    $shipping_method = $arr['shipping_method'];
    $day_select_admin = $arr['day_select_admin'];
    $to_time = $arr['to_time'];
    $to_time_am_pm = $arr['to_time_am_pm'];
    $from_time = $arr['from_time'];
    $from_time_am_pm = $arr['from_time_am_pm'];

    $insert_data = $wpdb->insert('wpfm_cutoff_lead_time', array(
        'shipping_method' => $shipping_method,
        'day_id' => $day_select_admin,
        'to_time' => $to_time,
        'to_time_am_pm' => $to_time_am_pm,
        'from_time' => $from_time,
        'from_time_am_pm' => $from_time_am_pm,
    ));

        if ($insert_data) {
            echo 1;
            wp_die();
        }
        else{
            echo 0;
            wp_die();
        }
    }

// Submit Cut off lead Time code End


// Edit Cut off lead time code start

add_action("wp_ajax_edit_cut_off_form_submit", "edit_cut_off_form_submit");
add_action("wp_ajax_nopriv_edit_cut_off_form_submit", "edit_cut_off_form_submit");

function edit_cut_off_form_submit(){

 global $wpdb; 

    $arr=[]; 
    wp_parse_str($_POST['edit_cut_off_form_submit'],$arr);

    $shipping_method  = $arr['shipping_method'];
    $day_select_admin = $arr['day_select_admin'];
    $to_time          = $arr['to_time'];
    $to_time_am_pm    = $arr['to_time_am_pm'];
    $from_time        = $arr['from_time'];
    $from_time_am_pm  = $arr['from_time_am_pm'];
    $id_cutoff        = $arr['id_cutoff'];

      $update_data = $wpdb->update('wpfm_cutoff_lead_time', array(
        'shipping_method' => $shipping_method,
        'day_id' => $day_select_admin,
        'to_time' => $to_time,
        'to_time_am_pm' => $to_time_am_pm,
        'from_time' => $from_time,
        'from_time_am_pm' => $from_time_am_pm,
      ),array('ID'=>$id_cutoff));

        if ($update_data) {
            echo 1;
            wp_die();
        }
        else{
            echo 0;
            wp_die();
        }
}

// Edit Cut off lead time code End


// Delete Cut off lead time code start

add_action("wp_ajax_delete_cutoff_entry", "delete_cutoff_entry");
add_action("wp_ajax_nopriv_delete_cutoff_entry", "delete_cutoff_entry");

function delete_cutoff_entry(){

    global $wpdb;   
    $Id = $_POST["Id"];

    $delete_data = $wpdb->query($wpdb->prepare("DELETE FROM wpfm_cutoff_lead_time WHERE ID = $Id"));

        if ($delete_data) {
            echo 1;
            wp_die();
        }
        else{
            echo 0;
            wp_die();
        }
}

// Delete Cut off lead time code End

// Submit Holidays code start

add_action("wp_ajax_add_holidays_data", "add_holidays_data");
add_action("wp_ajax_nopriv_add_holidays_data", "add_holidays_data");

function add_holidays_data(){

    global $wpdb;   
    $arr=[];    
    wp_parse_str($_POST['dates'],$arr);
    $holiday_date = $arr['date_filter_to'];

    $insert_data = $wpdb->insert('wpfm_add_holidays', array(
        'dates' => $holiday_date,
    ));
        if ($insert_data) {
            echo 1;
            wp_die();
        }
        else{
            echo 0;
            wp_die();
        }
}

// Submit Cut off lead Time code End


// custom_reports menu in admin dashboard

add_action( 'admin_menu', 'custom_reports_menu' );
    function custom_reports_menu(){
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Admin', 'Custom Reports Page', 'manage_options', 'custom_reports_page', 'add_custom_reports', 'dashicons-welcome-widgets-menus', 15 );
    // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '', $position = null )
    add_submenu_page( 'custom_reports_page', 'Single custom report page', '','manage_options', 'single-custom-report-page', 'single_custom_report');
    // add_submenu_page('add-menu','show data','Show Data','manage_options','add-menu-sub','show_data');
      }


function add_custom_reports(){ 


    $args = array(
    'role'    => 'seller',
    'order'   => 'ASC',
    );

$users = get_users( $args );

echo $_GET['id'];
?>

<h1 class="custom_report_heading">Orders By Vendor List</h1>

<div class="accordion" id="accordionExample">
<?php
$i=0; 
foreach ( $users as $user ) {
	$user_id = $user->ID;

	   
    $filters = array(
    'meta_key' => "_dokan_vendor_id",
    'post_status' => 'any',
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    // 'orderby' => 'modified',
    'order' => 'ASC',
    'meta_value'  => $user_id,
    'date_query'=> array(
                            array(
                                'before' => '',
                                'after'  => '',
                                'inclusive' => true,
                            ),
                        ),
);

    $loop = new WP_Query( $filters );

?>

   <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne<?php echo $i; ?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#test<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
       <?php echo $user->display_name; ?>
       <span class="total-amount-to-pay">Remaining Amount To Pay :<?php echo dokan_get_seller_balance($user_id); ?></span>
      </button>
    </h2>
    <div id="test<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $i; ?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      	   <?php  if ($loop->post_count > 0) { 
      	   	// echo "<pre>";
      	   	 // echo $loop->post_count;
      	    ?>
            <div class="row">
                <div class="col-lg-6">
                    <p>Sort By Shipping Mehods :</p>
                        <select class='form-control custom_selectbox_admin' id="select_list<?php echo $user_id; ?>" onchange="filterAsPerShipping(<?php echo $user_id; ?>)">
                            <option>Default Sorting</option>
                            <option>delivery</option>
                            <option>pickup</option>                       
                        </select>
                </div>
                <div class="col-lg-6">
                    <div class="sorts_date">
                        <div class="date_range_filter_custom_div">
                            <p>Sorts By Date:</p>
                                <a href="javascript:void(0);" class="clear_date_range_filter" id="<?php echo $user_id; ?>">Clear Filter</a>
                        </div>
                        <form method="post" class="date_range_filters_admin_side">
                            <input type="text" class="datepicker_from"  name="date_filter_from" readonly="readonly">
                            <input type="text" class="datepicker_to"  name="date_filter_to" readonly="readonly">
                            <input type="hidden" name="user_id" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="submit" name="submit" value="Submit" class="date_range_filter_button">
                        </form>
                        <div id="show_date_range_filters_error"></div>
                    </div>
                </div>
            </div>

                <!-- Loader HTML Start  -->
                <div class="box" id="box_custom_id<?php echo $user_id; ?>" style="display: none">
                    <div class="loader-02"></div>
                </div>

                <!-- Loader HTML End  -->

            <div class="table-responsive">
                <table class="table table-bordered" id="orders_table_custom<?php echo $user_id; ?>">
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
                        <tbody  id="tbody<?php echo $user_id; ?>">
      	<?php


// $posts = new WP_Query( $args );
if ( $loop->have_posts() ) {

               while ( $loop->have_posts() ) {

                    $loop->the_post();
                    $order_id = get_the_ID();
                    $order = wc_get_order( $order_id );


                    $order_status  = $order->get_status(); // Get the order status (see the conditional method has_status() below)
                    $total_amount = $order->get_total() - $order->get_shipping_total();


                    
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
                    $order_date = $order->get_date_created();
                    $newdate = date("F d,Y", strtotime($order_date));

$currency_code = $order->get_currency();
$currency_symbol = get_woocommerce_currency_symbol( $currency_code );

              global $wpdb;
              $sql = $wpdb->get_results("SELECT trn_type from {$wpdb->prefix}dokan_vendor_balance WHERE vendor_id = $user_id AND trn_id=$order_id");
              $paid_status = $sql[0]->trn_type;
              ?>

               <tr>
                      <td><a href="javascript:void(0);"><?php echo $order_id; ?></a></td>
                      <td><?php echo $newdate; ?></td>
                      <td class="shipping_method_custom_tr_class"><?php echo $shipping_method[0]; ?></td>
                      <td><?php echo $shipping_date[0]; ?></td>
                      <td><?php echo $shipping_time[0]; ?></td>
                      <td><?php echo $currency_symbol; ?><?php echo number_format((float)$total_amount, 2, '.', ''); ?></td>
                      <td><?php echo $order_status; ?></td>
                      <td><a href="<?php echo site_url();?>/wp-admin/admin.php?page=single-custom-report-page&OrderNumber=<?php echo $order_id;?>&vendorName=<?php echo $user->display_name; ?>" class="view_order_link_css">View Order Detail &rarr;</a></td>
                      <?php if ($paid_status == "dokan_orders") {  ?>
                      	<td><a href="javascript:void(0);" class="mark_as_paid" vendorId="<?php echo $user_id;?>" trnID="<?php echo $order_id; ?>" amount="<?php echo $total_amount; ?>" data-bs-toggle="modal" data-bs-target="#markorder">Mark Paid</a></td>
                      <?php } 
                      else{  ?>
                      	<td><p class="already_paid_order">Paid</p></td>
                  	<?php } ?>
               </tr>
<?php
               }
            }

wp_reset_query();

?>
         </tbody>
        </table>
      </div>
          <?php  }
			else{
            	echo "No Orders Found Related to this Vendor";
            } ?>            
      </div>
    </div>
  </div>

<?php

$i++;
 } 
 ?>
</div>

<!-- Modal -->
<div class="modal fade" id="markorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mark Order Paid</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" id="paid_confirmation" vendorId="" amount="" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

<?php
}

function single_custom_report(){
    
$order_id = $_GET["OrderNumber"];
$vendor_name = $_GET["vendorName"];

$order = wc_get_order( $order_id );
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

$order_total_tax  = $order->get_total_tax();
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
	    	<h6><span>Vendor Name</span> :  <?php echo $vendor_name; ?></h6>

			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">Product Name</th>
			      <th scope="col">Quantity</th>
             <th scope="col">Product Price</th>
			      <th scope="col">Sub Total</th>
			    </tr>
			  </thead>
			  	<tbody>
					<?php  
					foreach ( $order->get_items() as $item_id => $item ){
              $product_id = $item->get_product_id();
              $_product = wc_get_product( $product_id );
					   $product_name = $item->get_name();
					   $quantity = $item->get_quantity();
					   $subtotal = $item->get_subtotal();
             $price = $_product->get_price();
					?>
			    <tr>
			      <td><?php echo $product_name; ?></td>
			      <td><?php echo $quantity; ?></td>
            <td><?php echo $price; ?></td>
			      <td><?php echo $subtotal; ?></td>
			    </tr>
    			<?php } ?>

				</tbody>
			</table>

<?php 
$currency_code = $order->get_currency();
$currency_symbol = get_woocommerce_currency_symbol( $currency_code );
?>
    <h6>
      <span>Total Tax</span> :<?php echo $currency_symbol; ?><?php echo $order_total_tax ?>
    </h6>
		<h6>
			<span>Order Total</span> :<?php echo $currency_symbol; ?><?php echo $order->get_total(); ?>
		</h6>
	</div>
</article>

<?php
}

add_action("wp_ajax_mark_as_paid", "mark_as_paid");
add_action("wp_ajax_nopriv_mark_as_paid", "mark_as_paid");

function mark_as_paid(){

	$vendor_id = $_POST["vendorId"];
	$order_id = $_POST["orderId"];
	$amount = $_POST["amount"];

    global $wpdb;   

$result = $wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}dokan_vendor_balance SET trn_type='dokan_withdraw' , credit=$amount WHERE vendor_id=$vendor_id AND trn_id=$order_id"));
	if ($result) {
            echo 1;
            wp_die();
	}
    else{
        echo 0;
        wp_die();
    }
}


add_action("wp_ajax_date_range_filters", "date_range_filters");
add_action("wp_ajax_nopriv_date_range_filters", "date_range_filters");

function date_range_filters(){

 global $wpdb; 

    $arr=[]; 
    wp_parse_str($_POST['date_range_filters'],$arr);

    $date_filter_from  = $arr['date_filter_from'];
    $date_filter_to = $arr['date_filter_to'];
    $user_id = $arr['user_id'];

     $filters = array(
    'meta_key' => "_dokan_vendor_id",
    'post_status' => 'any',
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    // 'orderby' => 'modified',
    'order' => 'ASC',
    'meta_value'  => $user_id,
    'date_query'=> array(
                            array(
                                'before' => $date_filter_to,
                                'after'  => $date_filter_from,
                                'inclusive' => true,
                            ),
                        ),
);

    $loop = new WP_Query( $filters );
            while ( $loop->have_posts() ) {

                    $loop->the_post();
                    $order_id = get_the_ID();
                    $order = wc_get_order( $order_id );


                    $order_status  = $order->get_status(); // Get the order status (see the conditional method has_status() below)
                    $total_amount = $order->get_total();
                    $parent_id =  has_post_parent($order_id);
                        if ($parent_id) {
                        $p_id = wp_get_post_parent_id($order_id);
                        $shipping_method = get_post_meta( $p_id , 'custom_shipping_method'); 
                        }
                        else{
                         $shipping_method = get_post_meta( $order_id , 'custom_shipping_method');
                        }
                    $order_date = $order->get_date_created();
                    $newdate = date("d M Y", strtotime($order_date));

                    $sql = $wpdb->get_results("SELECT trn_type from {$wpdb->prefix}dokan_vendor_balance WHERE vendor_id = $user_id AND trn_id=$order_id");

                     $paid_status = $sql[0]->trn_type;                     

                    $html.='<tr>';
                    $html.='<td><a href="javascript:void(0);">'. $order_id .'</a></td>';
                    $html.='<td>'.  $newdate .'</td>';
                    $html.='<td class="shipping_method_custom_tr_class">'.  $shipping_method[0] .'</td>';
                    $html.='<td>'.  $total_amount .'</td>';
                    $html.='<td>'.  $order_status .'</td>';
                    $html.='<td><a href="'.  site_url().'/wp-admin/admin.php?page=single-custom-report-page&OrderNumber='. $order_id.'&vendorName='.  $user->display_name.'" class="view_order_link_css">View Order Detail &rarr;</a></td>';
                         if ($paid_status == "dokan_orders") { 
                    $html.='<td><a href="javascript:void(0);" class="mark_as_paid" vendorId="'. $user_id.'" trnID="'. $order_id.'" amount="'. $total_amount.'" data-bs-toggle="modal" data-bs-target="#markorder">Mark Paid</a></td>';
                         } 
                        else{
                    $html.='<td><p class="already_paid_order">Paid</p></td>';
                        }
                    $html.='</tr>';
               }

echo $html;
wp_die();
 }


add_action("wp_ajax_clear_date_range_filter", "clear_date_range_filter");
add_action("wp_ajax_nopriv_clear_date_range_filter", "clear_date_range_filter");

function clear_date_range_filter(){

 global $wpdb; 

    $user_id = $_POST['clear_date_range_filter'];

     $filters = array(
    'meta_key' => "_dokan_vendor_id",
    'post_status' => 'any',
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    // 'orderby' => 'modified',
    'order' => 'ASC',
    'meta_value'  => $user_id,
    'date_query'=> array(
                            array(
                                'before' => '',
                                'after'  => '',
                                'inclusive' => true,
                            ),
                        ),
);

    $loop = new WP_Query( $filters );
            while ( $loop->have_posts() ) {

                    $loop->the_post();
                    $order_id = get_the_ID();
                    $order = wc_get_order( $order_id );


                    $order_status  = $order->get_status(); // Get the order status (see the conditional method has_status() below)
                    $total_amount = $order->get_total();
                    $parent_id =  has_post_parent($order_id);
                        if ($parent_id) {
                        $p_id = wp_get_post_parent_id($order_id);
                        $shipping_method = get_post_meta( $p_id , 'custom_shipping_method'); 
                        }
                        else{
                         $shipping_method = get_post_meta( $order_id , 'custom_shipping_method');
                        }
                    $order_date = $order->get_date_created();
                    $newdate = date("d M Y", strtotime($order_date));


                    $sql = $wpdb->get_results("SELECT trn_type from {$wpdb->prefix}dokan_vendor_balance WHERE vendor_id = $user_id AND trn_id=$order_id");

                     $paid_status = $sql[0]->trn_type;                     

                    $html.='<tr>';
                    $html.='<td><a href="javascript:void(0);">'. $order_id .'</a></td>';
                    $html.='<td>'.  $newdate .'</td>';
                    $html.='<td>'.  $shipping_method[0] .'</td>';
                    $html.='<td>'.  $total_amount .'</td>';
                    $html.='<td>'.  $order_status .'</td>';
                    $html.='<td><a href="'.  site_url().'/wp-admin/admin.php?page=single-custom-report-page&OrderNumber='. $order_id.'&vendorName='.  $user->display_name.'" class="view_order_link_css">View Order Detail &rarr;</a></td>';
                         if ($paid_status == "dokan_orders") { 
                    $html.='<td><a href="javascript:void(0);" class="mark_as_paid" vendorId="'. $user_id.'" trnID="'. $order_id.'" amount="'. $total_amount.'" data-bs-toggle="modal" data-bs-target="#markorder">Mark Paid</a></td>';
                         } 
                        else{
                    $html.='<td><p class="already_paid_order">Paid</p></td>';
                        }
                    $html.='</tr>';
               }

echo $html;
wp_die();
 }


// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
add_filter( 'woocommerce_get_price_suffix', 'bbloomer_add_price_suffix_price_inc_tax', 99, 4 );
   
function bbloomer_add_price_suffix_price_inc_tax( $suffix, $product, $price, $qty ){

	if( $product->get_tax_status() == 'taxable' ){
    $suffix = ' <small> + GST</small>';
    return $suffix;
	}
}

// Remove Shipping charges for each Vendor Hook

remove_filter( 'woocommerce_cart_shipping_packages', 'dokan_custom_split_shipping_packages' );

// Only one city at checkout hook Start

add_filter( 'woocommerce_checkout_fields', 'custom_checkout_fields', 10, 1 );
function custom_checkout_fields( $fields ) {

    // $fields['billing']['billing_city']['type'] = 'select';
    // $fields['billing']['billing_city']['options'] = array('Karachi' => 'Karachi');
    $fields['shipping']['shipping_city']['type'] = 'select';
    $fields['shipping']['shipping_city']['options'] = array('Edmonton' => 'Edmonton');

    return $fields;
}

// Only one city at checkout hook End

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

add_filter('woocommerce_shipping_package_name', 'change_shipping_text_to_delivery', 20, 3 );
function change_shipping_text_to_delivery( $sprintf, $i, $package ) {
    $sprintf = sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'delivery packages', 'woocommerce' ), ( $i + 1 ) );
    return $sprintf;
}


add_action( 'woocommerce_before_order_notes', 'wp_kama_woocommerce_before_order_notes_action' );


function wp_kama_woocommerce_before_order_notes_action( $checkout ){

    echo '<p>'.__('"Note:  We cannot guarantee special requests will be met."').'</p>';
}


add_filter('woocommerce_available_payment_gateways', 'show_hide_cod', 10, 1);

function show_hide_cod($gateways)
{
        unset($gateways['cod']);
    
    return $gateways;
}


add_filter( 'manage_edit-shop_order_columns', 'bbloomer_add_new_order_admin_list_column' );
 
function bbloomer_add_new_order_admin_list_column( $columns ) {
    $columns['shipping_method'] = 'Shipping Method';
    $columns['pickup/delivery_Date'] = 'Pickup/Delivery Date';

    return $columns;
}
 
add_action( 'manage_shop_order_posts_custom_column', 'bbloomer_add_new_order_admin_list_column_content' );
 
function bbloomer_add_new_order_admin_list_column_content( $column ) {
   
    global $post;
 
    if ( 'pickup/delivery_Date' === $column ) {

           		$parent_idd =  has_post_parent($post->ID);
                        if ($parent_idd) {
                        $p_idd = wp_get_post_parent_id($post->ID);
                       
                        $shipping_datee = get_post_meta( $p_idd , 'preferred_date'); 
                     
                        }
                        else{
                       
                         $shipping_datee = get_post_meta( $post->ID , 'preferred_date'); 
                        
                        }

                        echo $shipping_datee[0];
      

    }

    if ( 'shipping_method' === $column ) {

           $parent_idd =  has_post_parent($post->ID);
                        if ($parent_idd) {
                        $p_idd = wp_get_post_parent_id($post->ID);
                       
                         $shipping_methodd = get_post_meta( $p_idd , 'custom_shipping_method'); 
                     
                        }
                        else{
                       
                          $shipping_methodd = get_post_meta( $post->ID , 'custom_shipping_method');
                        
                        }

                        echo $shipping_methodd[0];
      

    }
}


// Make searchable
function filter_woocommerce_shop_order_search_fields( $meta_keys ) {    
    // $meta_keys[] = 'custom_shipping_method';
    $meta_keys[] = 'preferred_date';
    return $meta_keys;
}
add_filter( 'woocommerce_shop_order_search_fields', 'filter_woocommerce_shop_order_search_fields', 10, 1 );


// // Make searchable
// function filter_woocommerce_shop_order_search_fieldss( $meta_keys ) {    
//     // $meta_keys[] = 'custom_shipping_method';
//     $meta_keys[] = 'custom_shipping_method';
//     return $meta_keys;
// }
// add_filter( 'woocommerce_shop_order_search_fields', 'filter_woocommerce_shop_order_search_fieldss', 10, 1 );



//PK

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


add_action( 'woocommerce_after_shop_loop_item_title','sold_by2' );
    function sold_by2(){
    ?>
        </a>
        <?php
            global $product;
            $seller = get_post_field( 'post_author', $product->get_id());
             $author  = get_user_by( 'id', $seller );

            $store_info = dokan_get_store_info( $author->ID );
            if ( !empty( $store_info['store_name'] ) ) { ?>
                    <span class="vendor">
                        <?php printf( '- <a href="%s">%s</a> -', dokan_get_store_url( $author->ID ), $author->display_name ); ?>
                    </span>
            <?php 
        } 

    }


    if( function_exists('acf_add_options_page') ) {
    
        acf_add_options_page(array(
            'page_title'    => 'Bountiful Event Settings',
            'menu_title'    => 'Bountiful Event Settings',
            'menu_slug'     => 'theme-bountiful-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }