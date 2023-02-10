<?php
/* Template Name: Contact Page*/

get_header();

$section1 = get_field("section_1");
// print_r($section1);

 ?>


    <!-- FAQ-PAGE START  -->
    <section class="faq-page contact-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <h4><?php echo $section1['heading']; ?></h4>
                        <?php echo do_shortcode( '[contact-form-7 id="34" title="Contact form 1"]' );  ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact-formDetails">
                        <div class="details-of-form">
                            <h4 class="text-capitalize"><?php echo $section1['heading_2']; ?></h4>
                            <p><?php echo $section1['paragraph']; ?> <a href="mailto: <?php echo $section1['mail_url']; ?>"><?php echo $section1['mail_text']; ?></a><?php echo $section1['paragraph_2']; ?></p>

                            <p><?php echo $section1['sub_paragraph']; ?> <a href="tel: <?php echo $section1['call_link']; ?>"><?php echo $section1['call_text']; ?></a></p>

                            <p><?php echo $section1['sub_paragraph2']; ?></p>

                            <p><?php echo $section1['sub_paragraph3']; ?> <a href="<?php echo $section1['vendor_link']; ?>"><?php echo $section1['vendor_text']; ?></a>. </p>
                        </div>
                        <div class="details-of-form">
                            <h4 class="text-capitalize"><?php echo $section1['heading3']; ?></h4>
                            <p><?php echo $section1['paragraph3']; ?></p>
                          <!--   <form>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Email Address">
                                    <button type="submit" class="custom-btn">Submit</button>
                                </div>
                            </form> -->
                             <?php echo do_shortcode('[mc4wp_form id="839"]'); ?>

                            <div class="follow text-center">
                                <h5><?php echo $section1['heading4']; ?></h5>
                                <strong><?php echo $section1['paragraph4']; ?></strong>
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