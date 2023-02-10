<?php 

/* Template Name: Contests and Events Page */

get_header();

$section1 = get_field('section_1');
$section2 = get_field('section_2');

?>

 <div class="loader_custom_box">
            <div class="loader-01"></div>
        </div>

<section class="contests-and-eventSec">
    <figure>
        <img src="<?php echo $section1['banner_image']; ?>" />
    </figure>
    <figcaption><h2><?php echo $section1['banner_text']; ?></h2></figcaption>
</section>



<section class="contributing-sec">
    <div class="container-fluid">
        <?php echo do_shortcode('[events]'); ?> 
        <!-- <h4 class="text-capitalize text-center">Contributing vendors</h4>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/alberta-bison-ranch.PNG" alt="alberta-bison-ranch" /></figure>
                <figcaption>
                    <h2 class="text-capitalize">Madeline Wood</h2>
                    <p class="text-uppercase">06/25/2022 @ 11:00AM - 1:30 PM</p>
                    <p class="text-uppercase">on stage</p>
                    <a href="" class="">Busker</a>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/alyonka-bakery.PNG" alt="alyonka-bakery" /></figure>
                <figcaption>
                <p class="text-capitalize">Alyonka Bakery</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/confetti-sweets.PNG" alt="confetti-sweets" /></figure>
                <figcaption>
                <p class="text-capitalize">confetti sweets</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/cookie-crumbs.PNG" alt="cookie-crumbs" /></figure>
                <figcaption>
                <p class="text-capitalize">Cookie Crumbs</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/dear-dog-treats.PNG" alt="dear-dog-treats" /></figure>
                <figcaption>
                <p class="text-capitalize">Dear Dogs treats</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/eclectic-vibes.PNG" alt="eclectic-vibes" /></figure>
                <figcaption>
                <p class="text-capitalize">eclectic vibes</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/fallentimber-meadery.PNG" alt="fallentimber-meadery" /></figure>
                <figcaption>
                <p class="text-capitalize">Fallentimber Meadery</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/four-whistle-farms.PNG" alt="four-whistle-farms" /></figure>
                <figcaption>
                <p class="text-capitalize">Four whistle farms</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/garage-kombucha.PNG" alt="garage-kombucha" /></figure>
                <figcaption>
                <p class="text-capitalize">garage kombucha</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/goddess-temple.PNG" alt="goddess-temple" /></figure>
                <figcaption>
                <p class="text-capitalize">Goddess Temple</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/going-nuts.PNG" alt="going-nuts" /></figure>
                <figcaption>
                <p class="text-capitalize">Going Nuts</p>
                </figcaption>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <figure><img src="https://bountiful.valontech.com/wp-content/themes/dokan/images/irvings-farm-fresh.PNG" alt="irvings-farm-fresh" /></figure>
                <figcaption>
                    <p class="text-capitalize">Irvings farm fresh</p>
                </figcaption>
            </div>

        </div> -->
    </div>
</section>

<section class="contests-and-eventSec past-sec">
    <div class="container-fluid">
        <h2 class="text-capitalize text-center"><?php echo $section2['heading']; ?></h2>
    </div>
    <div class="container-fluid cstm-container">
        <div class="row">
            <div class="col-md-12">
                <figure>
                    <img src="<?php echo $section2['image_1']; ?>" alt="past-img1" />
                </figure>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <figure class="fig2">
                            <img src="<?php echo $section2['image_2']; ?>" alt="past-img2" />
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <figure class="fig2">
                            <img src="<?php echo $section2['image_3']; ?>" alt="past-img3" />
                        </figure>
                    </div>
                    <div class="col-md-12">
                        <figure>
                            <img src="<?php echo $section2['image_4']; ?>" alt="past-img5" />
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <figure class="fig3">
                    <img src="<?php echo $section2['image_5']; ?>" />
                </figure>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
