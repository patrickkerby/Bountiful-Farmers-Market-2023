<?php 

/* Template Name: About us Page */

get_header();

$heading_image = get_field("background_image");
$heading_title = get_field("page_title");
$heading_intro = get_field("intro");
$intro_photos_caption = get_field("intro_photos_caption");
$intro_photos = get_field("intro_photos");

$local_impact_heading = get_field("section_title");
$local_impact_subheading = get_field("section_subtitle");
$local_impact_content = get_field("section_content");

$vendor_slider = get_field("slider");
$vendor_slider_text = get_field("slider_textblock");

 ?>

<div class="about-us">
    <div class="container-fluid heading">
        <div class="row justify-content-center" style="background-image: linear-gradient(174deg, rgba(27,48,46,0.62) 0%, rgba(43,77,74,0.62) 100%), url('<?php echo $heading_image['url'] ?>');">
            <h1><?php echo $heading_title; ?></h1> 
            <span>Friday & Sunday:  10 AM - 4 PM,  Saturday: 9 AM - 5 PM</span>
            <div class="col-sm-9 intro">
                <h2><?php echo $heading_intro; ?></h2>
            </div>            
        </div>        
        <div class="row intro-photos justify-content-center g-0 no-gutters">
            <?php
                foreach($intro_photos as $photo) {?>
                    <div class="col-sm-6">
                        <img src="<?php echo $photo['url']; ?>" />
                    </div>   
            <?php } ?>
            <div class="col-12 caption">
                <p><?php echo $intro_photos_caption; ?></p>
            </div>
        </div>
    </div>

    <div class="container-fluid local-impact">
        <div class="row justify-content-center">
            <h2><?php echo $local_impact_heading; ?></h2>
            <h3><?php echo $local_impact_subheading; ?></h3>
            <div class="col-sm-9 content">
                <?php echo $local_impact_content; ?>
            </div>
        </div>
        <div class="row no-gutters slider justify-content-center">
            <div class="col-11">
                <?php 
                    foreach($vendor_slider as $slide) { ?>
                        <img src="<?php echo $slide['url']; ?>" />
                <?php } ?>

                <h4><?php echo $vendor_slider_text; ?></h4>
            </div>
        </div>
    </div>
    
</div>

<?php get_footer(); ?>