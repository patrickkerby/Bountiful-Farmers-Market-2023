<?php 

/* Template Name: About us Page */

get_header();

$section1 = get_field("section_1");
$section2 = get_field("section_2");
$section3 = get_field("section_3");
//print_r($section3);

 ?>

<div class="aboutUs-page">
    <div class="container-fluid">
        <div class="row amplifyDiv">
            <div class="col-lg-6 col-md-12 col1">
                <div class="amplify-div">
                    <div class="main-heading">
                        <h2><?php echo $section1['heading']; ?></h2>
                    </div>
                    <p><?php echo $section1['paragraph']; ?></p>

                    <p><?php echo $section1['sub_paragraph']; ?></p>
                    <a href="<?php echo $section1['button_link']; ?>" class="btn text-capitalize" target="_blank"><?php echo $section1['button_text']; ?></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="aboutImages">
                    <figure>
                        <img src="<?php echo $section1['image_1']; ?>" srcset="" class="img-1" />
                    </figure>
                    <figure>
                        <img src="<?php echo $section1['image_2']; ?>" srcset="" class="img-2" />
                    </figure>
                </div>
            </div>
        </div>
        <div class="row localDiv">
            <div class="col-lg-6 col-md-12">
                <div class="aboutImages aboutImages2">
                    <figure>
                        <img src="<?php echo $section2['image_1']; ?>" alt="local-img1" srcset="" class="img-1" />
                    </figure>
                    <figure>
                        <img src="<?php echo $section2['image_2']; ?>" alt="local-img2" srcset="" class="img-2" />
                    </figure>
                    <figure>
                        <img src="<?php echo $section2['image_3']; ?>" alt="local-img3" srcset="" class="img-3" />
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="amplify-div text-right">
                    <div class="main-heading">
                        <h2><?php echo $section2['heading']; ?></h2>
                    </div>
                    <p><?php echo $section2['paragraph']; ?></p>

                    <p><?php echo $section2['sub_paragraph']; ?></p>

                    <p><?php echo $section2['sub_paragraph1']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="bountiful-sec">
        <div class="container-fluid">
            <div class="main-heading text-center">
                <h2><?php echo $section3['heading']; ?></h2>
            </div>
            <p class="text-center"><?php echo $section3['paragraph']; ?></p>
        </div>
            <ul>
                <li>
                    <figure><img src="<?php echo $section3['image']; ?>" alt="community-img1" srcset=""></figure>
                </li>
                <li>
                    <figure><img src="<?php echo $section3['image_2']; ?>" alt="community-img2" srcset=""></figure>
                </li>
                <li>
                    <figure><img src="<?php echo $section3['image_3']; ?>" alt="community-img3" srcset=""></figure>
                </li>
                <li>
                    <figure><img src="<?php echo $section3['image_4']; ?>" alt="community-img4" srcset=""></figure>
                </li>
                <li>
                    <figure><img src="<?php echo $section3['image_5']; ?>" alt="community-img5" srcset=""></figure>
                </li>
                <li>
                    <figure><img src="<?php echo $section3['image_6']; ?>" alt="community-img6" srcset=""></figure>
                </li>
            </ul>
        
    </div>
</div>

<?php get_footer(); ?>