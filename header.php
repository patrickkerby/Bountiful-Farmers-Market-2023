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
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.min.css" />
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
</head>

<body <?php body_class( 'woocommerce' ); ?>>

    <!--Header top starts here-->
    <header>
        <div class="top-header container-fluid">
            <div class="row">
                
                <!-- Social Media -->
                <div class="socials col-sm-1 justify-content-end">
                    <a href="" class="facebook">Facebook</a>
                    <a href="" class="instagram">Instagram</a>
                </div>
	            
                <!-- Directions -->
                <a class="directions header-cta col-sm-3" href="">
                    <div>
                        <span>Come visit</span>
                        <h6>Get Directions</h6>
                    </div>
                </a>

	            <!-- Brand -->
                <div class="brand col-sm-4 justify-content-center">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-horizontal.svg">
                    </a>
                </div>

                <!-- Hours of Operation -->
                <a class="hours col-sm-3 align-items-end header-cta" href="#">
                    <div class="">
                        <span>Open next</span>
                        <h6>Friday, 9am</h6>
                    </div>
                </a>

                <!-- Cart -->
                <div class="cart col-sm-1 justify-content-center">
                    <a href="">Cart</a>
                </div>
            </div>
        </div>
        <!--navbar starts here-->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="new-nav" id="">
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
        </nav>
    </header>
