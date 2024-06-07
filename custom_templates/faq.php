    <?php
/* Template Name: Faq Page*/

get_header();

    $heading_image = get_field("header_image");
    $title = get_field("title");
    $subtitle = get_field("subtitle");

    if (is_null($title)) {
        $title = get_the_title();
    }

    $faqs = get_field('faq');

    $faq_categories = get_terms( array(
      'taxonomy' => 'faq_categories',
      'hide_empty' => true,
    ) );   

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
                    <?php foreach ($faq_categories as $faq_category) { ?>
                        <!-- <div class="col"> -->
                            <!-- <a href="#<?php echo $faq_category->term_id; ?>"><?php echo $faq_category->name; ?></a>           -->
                        <!-- </div> -->
                    <?php } 
                
                    if( $faqs ) { ?>
                        <div id="accordion1" class="accordion">
                            <?php foreach ($faq_categories as $faq_category_single) {
                                $selected_category = $faq_category_single->term_id;
                                ?>
                                <h2><?php echo $faq_category_single->name; ?></h2>
                                <div id="<?php echo $selected_category; ?>" class="">

                                    <?php $count = 0;
                                    foreach( $faqs as $faq_row ) {
                                        $faq_title = $faq_row['faq_title'];
                                        $faq_content = $faq_row['faq_content'];
                                        $faq_category_selected = $faq_row['faq_category']->name;
                                        $faq_category_id = $faq_row['faq_category']->term_id;

                                        if($faq_category_id == $selected_category) {
                                            $faq_id = $count . '-' . $faq_category_id; ?>   
                                            <div class="card accordion-item">
                                                <div class="card-header" id="faqhead1">
                                                    <a href="javascript:void(0);" class="btn btn-header-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $faq_id; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $faq_id; ?>"><?php echo $faq_title; ?></a>
                                                </div>
                                            
                                                <div id="collapse-<?php echo $faq_id; ?>" class="collapse" aria-labelledby="heading<?php echo $faq_id; ?>" data-parent="#accordion1">
                                                    <div class="card-body">
                                                        <?php echo $faq_content; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $count++; 
                                        }
                                    } ?>
                                </div>
                            <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ-PAGE END  -->


<?php

get_footer();
?>