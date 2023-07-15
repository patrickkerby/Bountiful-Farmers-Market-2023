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
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                    ?>

                <?php endwhile; // end of the loop. ?>
            </div>
        </div><!-- #content .site-content -->
    </div>
</div>
<!-- become-vendor-description END  -->

<?php

get_footer();

?>
