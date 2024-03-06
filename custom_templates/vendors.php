<?php
/* Template Name: Vendors Page*/

get_header();


$heading_image = get_field("header_image");
$title = get_field("title");
$subtitle = get_field("subtitle");

if (is_null($title)) {
    $title = get_the_title();
}

 ?>

<div class="container-fluid heading">
    <div class="row justify-content-center" style="background-image: linear-gradient(174deg, rgba(27,48,46,0.12) 0%, rgba(43,77,74,0.12) 100%), url('<?php echo $heading_image['url'] ?>'); background-size: cover;">
        <h1><?php echo $title; ?></h1>
        
        <?php if ($subtitle) { ?>
            <div class="col-sm-9 intro">
                <h2><?php echo $subtitle; ?></h2>
            </div>
            <?php } ?>
        </div>
    </div>
    
<section class="vendor-page">
    <div class="container">        
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <!-- <?php echo do_shortcode('[Map1]');  ?> -->
            </div> 
        </div>
    </div>
</section>

 <section class="vendor-stores">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <?php echo do_shortcode('[dokan-stores per_page=-1]');  ?>  
            </div>
        </div>
  </div>
</section>

<?php

get_footer();
?>
