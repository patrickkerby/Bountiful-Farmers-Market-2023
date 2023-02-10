<?php
/* Template Name: Testimonial Page*/

get_header();

$section1 = get_field('section_1');

$section2 = get_field('section_2');

$section3 = get_field('section_3');

$section4 = get_field('section_4');

 ?>

    <!-- Testimonial Start  -->
    <section class="home-banner testimonial-page" style="background-image:url('<?php echo $section1['banner_image']; ?>')">
		<div class="container">
			<div class="banner-details text-center text-capitalize">
				<h1><?php echo $section1['banner_text']; ?></h1>
			</div>
		</div>
    </section>
    <!-- Testimonial END  -->

    <!-- INNER-TESTIMONIAL START  -->
    <section class="inner-testimonial faq-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 local-content text-center">
                    <h4><?php echo $section2['heading']; ?><br><?php echo $section2['sub_heading']; ?></h4>
                    <p><?php echo $section2['paragraph']; ?></p>
                    <p><?php echo $section2['sub_paragraph']; ?></p>
                    <div class="rating">
                        <div class="rate">
                            <h2><?php echo $section2['google_rating_given']; ?><sub>/<?php echo $section2['google_rating_out_off']; ?></sub><i class="fa fa-star" aria-hidden="true"></i></h2>
                            <p><?php echo $section2['google_rating_text']; ?></p>
                        </div>
                        <div class="rate">
                            <h2><?php echo $section2['facebook_rating_given']; ?><sub>/<?php echo $section2['facebook_rating_out_off']; ?></sub><i class="fa fa-star" aria-hidden="true"></i></h2>
                            <p><?php echo $section2['facebook_rating_text']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="testimonial-topImg">
                        <figure>
                            <img src="<?php echo $section2['right_image_1']; ?>" class="firstImg" />
                            <img src="<?php echo $section2['right_image_2']; ?>" alt="T-topImg2" class="secImg" />
                        </figure>
                    </div>
                </div>
            </div>
            <div class="row align-items-center great-loc">
                <div class="col-lg-6 col-md-12">
                    <div class="testimonial-box green-box text-center">
                        <p><?php echo $section3['review_1']['review_text']; ?></p>
                        <h4><strong><?php echo $section3['review_1']['name']; ?></strong>
                            <div class="stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="testimonial-box red-box text-center">
                        <p><?php echo $section3['review_2']['review_text']; ?></p>
                        <h4><strong><?php echo $section3['review_2']['name']; ?></strong>
                            <div class="stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="testimonial-box red-box text-center">
                        <p><?php echo $section3['review_3']['review_text']; ?></p>
                        <h4><strong><?php echo $section3['review_3']['name']; ?></strong>
                            <div class="stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="testimonial-box green-box text-center">
                        <p><?php echo $section3['review_4']['review_text']; ?></p>
                        <h4><strong><?php echo $section3['review_4']['name']; ?></strong>
                            <div class="stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
            <a href="<?php echo $section3['leave_review_link']; ?>" class="review_link_custom" target=_blank><?php echo $section3['leave_review_text']; ?></a>
        </div>
        <div class="container-fluid lastRow">
        <div class="row">    
            <div class="col-lg-3 col-md-12 col-sm-12 row1-test">
                <figure class="testi-imgs">
                    <img src="<?php echo $section4['image_1']; ?>" alt="T-img1" />
                </figure>
                <figure class="testi-imgs">
                    <img src="<?php echo $section4['image_2']; ?>" alt="T-img2" />
                </figure>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 row2-test">
                <figure class="testi-imgs">
                    <img src="<?php echo $section4['image_3']; ?>" alt="T-img3" />
                </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 row3-test">
                <figure class="testi-imgs">
                    <img src="<?php echo $section4['image_4']; ?>" alt="T-img4" />
                </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 row4-test">
                <figure class="testi-imgs">
                    <img src="<?php echo $section4['image_5']; ?>" alt="T-img5" />
                </figure>
            </div>
        </div>
        </div>
    </section>
    <!-- INNER-TESTIMONIAL END  -->



<?php

get_footer();
?>