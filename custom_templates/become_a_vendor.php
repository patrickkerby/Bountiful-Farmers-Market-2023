<?php
/* Template Name: Become A Vendor */

get_header();


$section1 = get_field('section_1');
$section2 = get_field('section_2');

?>

<!-- become-vendor Start  -->
<section class="home-banner become-vendor-page" style="background-image:url('<?php echo $section1['banner_image']; ?>);">
		<div class="container">
			<div class="banner-details text-center text-capitalize">
				<h1><?php echo $section1['banner_heading']; ?></h1>
			</div>
		</div>
    </section>
<!-- become-vendor END  -->

<!-- become-vendor-description Start  -->
<div class="vendor-describe">
    <div class="container">
        <h4 class="text-capitalize text-center"><?php echo $section2['heading']; ?></h4>

        <p class="text-center"><?php echo $section2['paragraph']; ?>
         <a href="mailto:<?php echo $section2['mail_link']; ?> "><?php echo $section2['mail_text']; ?></a>
         <?php echo $section2['paragraph_2']; ?>
         <a href="tel:<?php echo $section2['call_link']; ?>"><?php echo $section2['call_text']; ?></a>
        </p>

        <p class="text-center"><?php echo $section2['sub_paragraph']; ?></p>
    
        <span class="pdf"><a href="<?php echo $section2['button_link']; ?>" download="Vendor_registration_form"><?php echo $section2['button_text']; ?></a></span>
    
    </div>
</div>
<!-- become-vendor-description END  -->

<?php

get_footer();

?>
