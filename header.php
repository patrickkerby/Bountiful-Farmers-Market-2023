<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */
?>

<!-- Custom Header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/all.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap-select.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.min.css" /> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&family=Barlow+Condensed:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/zno3axd.css" -->

    <link rel="stylesheet" href="https://use.typekit.net/imp1lqn.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/fav.png" type="image/x-icon">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pk.css" />
    <?php 
        if(is_page('about-us')) {
            echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() .'/css/about.css" />';
        }
        if(is_page('vendors')) {
            echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() .'/css/vendors.css" />';
        }
        $current_url = home_url( $wp->request );
        if( str_contains($current_url, '/vendor/')) {
            echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() .'/css/vendor-single.css" />';
        }
        if(str_contains($current_url, '/events') || is_singular( 'tribe_events' )) {
            echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() .'/css/events.css" />';
        }
        
    ?>

</head>

<body <?php body_class( 'woocommerce' ); ?>>

    <!--Header top starts here-->
    <header>
        <div class="top-header container-fluid header-static">
            <div class="row justify-content-center">
                
                <!-- Social Media -->
                <div class="col socials justify-content-end">
                    <a href="#" class="facebook"></a>
                    <a href="#" class="instagram"></a>
                </div>
	            
                <!-- Directions -->
                <a class="directions header-cta col col-sm-3 order-2 order-sm-1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <div>
                        <span>Come visit</span>
                        <h6>Get Directions</h6>
                    </div>
                </a>

	            <!-- Brand -->
                <div class="brand col-sm justify-content-center order-first order-sm-1">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-horizontal.svg">
                    </a>
                </div>

                <!-- Hours of Operation -->
                <a class="hours col col-sm-3 align-items-end header-cta order-3 order-sm-5" href="#">
                    <div class="">                        
                        <?php echo do_shortcode('[mbhi location="Bountiful Farmers\' Market"]'); ?>
                    </div>
                </a>

                <!-- Cart -->
                <div class="col cart justify-content-center order-sm-last">
                    <a href=""></a>
                </div>
            </div>
        </div>
        <!--navbar starts here-->
        <nav class="navbar navbar-expand-md">
            <div class="container justify-content-center ">
                
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="new-nav">
					<?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse navbar-main-collapse',
                            'container_id'   	=> 'collapsibleNavbar',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                       ?>
                </div>
            </div>
            <a class="contact" data-bs-toggle="offcanvas" href="#contactModal" role="button" aria-controls="contactModal">Contact Us</a>
        </nav>
    </header>



<div class="offcanvas offcanvas-start directions" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div>
            <div class="close-wrapper">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <iframe width='100%' height='500px' src="https://api.mapbox.com/styles/v1/patrickkerby/clij7sc9b004x01q16mlh8j60.html?title=false&access_token=pk.eyJ1IjoicGF0cmlja2tlcmJ5IiwiYSI6ImpxWDBaVFkifQ.t3gbX7-Sfy3Z9Nh14aLFow&zoomwheel=false#10.72/53.4818/-113.477" title="Bountiful" style="border:none;"></iframe>
            <a href="https://goo.gl/maps/h1t9EP4MEw4cAdkB6" target="_blank" class="button google-directions">Get directions</a>            
            <h2>Find us on Edmonton’s South Side!</h2>
            <div class="content">
                <address>3696 97 Street Edmonton, AB T6E 5S8</address>
                <h3>Convenient</h3>
                <p>Easy to get to via car, bus or bicycle. Convenient access from Anthony Henday, Whitemud Drive, 99 Street, 34 Ave and 91 street.</p>
                <h3>Free Parking:</h3>
                <p>Plenty of free parking for both customers and vendors along with accessible parking for vehicles and bicycles.</p>
                
                <h3>Open every weekend, year-long!</h3>
                <ul>
                    <li>Friday 10AM - 4PM</li>
                    <li>Saturday 9AM - 4PM</li>
                    <li>Sunday 10AM - 4PM</li>
                </ul>

                <h3>Get in touch:</h3>
                <ul>
                    <li>(780) 818-3878</li>
                    <li><a href="mailto:office@bountifulmarkets.com">office@bountifulmarkets.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-end contact" tabindex="-1" id="contactModal" aria-labelledby="contactModal">
    <div class="offcanvas-body">
        <div>
            <div class="close-wrapper">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        
            <h2>Get in touch</h2>
            <div class="content">
                <h3>Market Team</h3>
                <ul>
                    <li>(780) 818-3878</li>
                    <li><a href="mailto:office@bountifulmarkets.com">office@bountifulmarkets.com</a></li>
                </ul>

                <h3>Office Hours:</h3>
                <p>Tuesday to Sunday, 9 A.M. to 5 P.M.</p>
                <hr />  
                <p>If you have a question for a specific vendor please contact them directly via their contact information listed on their vendor page.</p>                
                <h3>Send us a message:</h3>
                <?php gravity_form( 1, false, true, false, '', true, 12 ); ?>

            </div>
        </div>
    </div>
</div>