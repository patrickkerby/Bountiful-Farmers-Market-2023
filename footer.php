<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */
?>
<!-- </div> -->
<!-- .row -->
<!-- </div> -->
<!-- .container -->
<!-- </div> -->
<!-- #main .site-main -->

<!-- <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div>
            </div> 
        </div>
    </div>

    <div class="copy-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copy">
                        <div class="col-md-6 site-info">
                            <?php
                            $footer_text = get_theme_mod( 'footer_text' );

                            if ( empty( $footer_text ) ) {
                                printf( __( '&copy; %d, %s. All rights are reserved.', 'dokan-theme' ), date( 'Y' ), get_bloginfo( 'name' ) );
                                printf( __( 'Powered by <a href="%s" target="_blank">Dokan</a> from <a href="%s" target="_blank">weDevs</a>', 'dokan-theme' ), esc_url( 'http://wedevs.com/theme/dokan/?utm_source=dokan&utm_medium=theme_footer&utm_campaign=product' ), esc_url( 'http://wedevs.com/?utm_source=dokan&utm_medium=theme_footer&utm_campaign=product' ) );
                            } else {
                                echo $footer_text;
                            }
                            ?>
                        </div>

                        <div class="col-md-6 footer-gateway">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'  => 'footer',
                                    'depth'           => 1,
                                    'container_class' => 'footer-menu-container clearfix',
                                    'menu_class'      => 'menu list-inline pull-right',
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</footer>
</div>
 -->

<!-- custom footer -->


     <!-- FOOTER START  -->
     <footer>
        <div class="container">
            <div class="row justify-content-center contact-form">
                <?php 
                    if(is_page('home')) { ?>
                        <div class="col-10 col-md-7 form-wrapper">
                            <p>Sign up to stay up-to-date on what’s going on at Edmonton’s premier indoor farmers’ market.</p>                                        
                    <?php }
                    else { ?>
                        <div class="col-md-9 form-wrapper">
                            <p>Newsletter signup</p>                                        
                    <?php }
                    echo do_shortcode('[mc4wp_form id="839"]'); ?>                    
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 col-md-4 order-sm-1">
                    <h4 class="text-uppercase">We Are Open</h4>
                    <ul class="open-time">
                        <li>
                            <span>Friday:</span> 10am - 4pm
                        </li>
                        <li>
                            <span>Saturday:</span> 9am - 4pm
                        </li>
                        <li>
                            <span>Sunday:</span> 10am - 4pm
                        </li>
                    </ul>
                </div>
                <div class="col-sm-10 col-md-4 order-sm-3 order-md-2">
                    <a href="javascript:void(0);">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.svg" alt="ftr-logo" class="ftr-logo" />
                    </a>
                </div>
                <div class="col-sm-5 col-md-4 order-sm-2 order-md-3">
                    <ul class="ftr-links">
                        <li>
                            <a href="https://bountiful2022.test/contact-us/">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/vendors/">Vendors</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/faq/">FAQ</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/contests-and-events/">Contests &amp; Events</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 order-sm-4 colophon">
                    <a href="tel:(780) 818-3878" class="nmbr">(780) 818-3878</a> <span>&#x2022;</span> <address>3696 97 Street Edmonton, AB T6E 5S8 </address> <span>&#x2022;</span> office@bountifulmarkets.com
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END  -->

<?php wp_footer(); ?>



<!-- <div id="yith-wcwl-popup-message" style="display:none;"><div id="yith-wcwl-message"></div></div> -->
</body>
</html>