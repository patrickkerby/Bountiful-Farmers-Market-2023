    <?php
/* Template Name: Faq Page*/

get_header();

    $heading_image = get_field("header_image");
    $title = get_field("title");
    $subtitle = get_field("subtitle");

    if (is_null($title)) {
        $title = get_the_title();
    }

 ?>

    <!-- FAQ-PAGE START  -->
    <div class="container-fluid heading">
        <div class="row justify-content-center" style="background-image: linear-gradient(174deg, rgba(27,48,46,0.62) 0%, rgba(43,77,74,0.62) 100%), url('<?php echo $heading_image['url'] ?>'); background-size: cover;">
            <h1><?php echo $title; ?></h1> 
            
            <?php if ($subtitle) { ?>
                <div class="col-sm-9 intro">
                    <h2><?php echo $subtitle; ?></h2>
                </div>
            <?php } ?>
        </div>
    </div>
    <section class="faq-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 sidebar">
                    <h3>Hours of Operation</h3>
                    <p>We are open all year round!</p>
                    <ul>
                        <li>Friday: 10am - 4pm</li>
                        <li>Saturday: 9am - 4pm</li>
                        <li>Sunday: 10am - 4pm</li>
                    </ul>
                    <hr />
                </div>
                <div class="accordion col-sm-8" id="faq">

                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">1. Where are you located? What are your hours?</a>
                        </div>

                        <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>We are located on the Southside of Edmonton at  <a href="https://www.google.com/maps/place/Bountiful+Farmers'+Market/@53.472053,-113.4827447,17z/data=!3m2!4b1!5s0x53a01f2c8568966f:0xd0c3d57e38078fd2!4m5!3m4!1s0x53a01fd071969a35:0xca2cdfd481c389bd!8m2!3d53.4720498!4d-113.4805507">3696 97 Street NW</a>. We are conveniently located in the middle of numerous major roadways including 91st Street, 34th Avenue, Gateway Blvd, and Whitemud. Quick, easy access from any direction!</li>
                                    <li>We are open every Friday, Saturday and Sunday, year round. Fridays and Sundays we are open 10 A.M. to 4 P.M.. On Saturdays we are open 9 A.M. to 5 P.M..</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                            aria-expanded="true" aria-controls="faq2">2. Do you have a vendor that sells _____?</a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>Our vendors’ stock can vary week-to-week! If you’re looking for a specific item, we encourage you to check out our  <a href="<?php echo site_url(); ?>/vendors">vendor list</a> to get an idea of who sells what and each vendor’s most popular items. You can also use our search function on the top of webpage. </li>
                                    <li>If you can’t find what you’re looking for on our website, or if you’re looking to see if a specific item is in stock on a market day, please email us or give us a call! You can email us at <a href="mailto: office@bountifulmarkets.com">office@bountifulmarkets.com</a> or call us at <a href="tel:(780) 818-3878">(780) 818-3878</a>. We’d be happy to help!</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                            aria-expanded="true" aria-controls="faq3">3. Is Bountiful wheelchair accessible?</a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>Yes, we have ramp access on our west and south doors. We encourage wheelchair users to use our South doors as that side of the lot is paved. The aisles in our market are plenty wide enough to accommodate wheelchairs.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead4">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                            aria-expanded="true" aria-controls="faq4">4. Are pets allowed into the market?</a>
                        </div>

                        <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>Only registered service dogs are allowed into the market. We ask that if you are bringing your service dog, please have identification with you that indicates the animal is registered. Contact us if you have any other questions. </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead5">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                            aria-expanded="true" aria-controls="faq4">5. Are you accepting new vendors? How much does it cost?</a>
                        </div>

                        <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>Yes, we are always accepting new vendor applications! The first step in joining is to fill out an application. You can find a fillable version or a pdf version by visiting our “Become a Vendor” page  <a href="<?php echo site_url(); ?>/become-a-vendor">here</a>.</li>
                                    <li>Pricing varies depending on your needs as we have a few different programs available. We would be happy to give you more specifics in relation to your business/products. Please send us an email with your business information and what products you are interested in selling at <a href="mailto: office@bountifulmarkets.com">office@bountifulmarkets.com</a>.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead6">
                            <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
                            aria-expanded="true" aria-controls="faq4">6. Do you have buskers and performers? How do I become a busker?</a>
                        </div>

                        <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                            <div class="card-body">
                                <ul>
                                    <li>Yes, we love having live performers and events at our market! Did you know that we have a stage to showcase live entertainers? Check out our <a href="<?php echo site_url(); ?>/contests-and-events">events calendar</a> to see the latest news on what’s coming up. </li>
                                    <li>If you’re interested in busking, please email <a href="mailto: assistant@bountifulmarkets.com">assistant@bountifulmarkets.com</a> with some information on your talents, your contact information, and a sample video of your work if possible. </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- FAQ-PAGE END  -->


<?php

get_footer();
?>