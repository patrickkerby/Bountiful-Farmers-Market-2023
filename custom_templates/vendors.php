<?php
/* Template Name: Vendors Page*/

get_header();
 ?>

<section class="vendor-page">
    <div class="container">
        <div class="inner-heading text-center ">
            <h2 class="text-uppercase">Vendor Map</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php echo do_shortcode('[Map1]');  ?>                
            </div> 
        </div>
    </div>
</section>

 <section class="vendor-stores">
    <div class="container">
        <?php echo do_shortcode('[dokan-stores per_page=-1]');  ?>  
  </div>
</section>

<?php

get_footer();
?>