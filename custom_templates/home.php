<?php
/* Template Name: Homepage */

get_header();

$section1 = get_field('section_1');
$section2 = get_field('section_2');
$section3 = get_field('section_3');
$section4 = get_field('section_4');
$section5 = get_field('section_5');

$newsflash_set = get_field('newsflash!');

?>

	<!--Banner starts here-->
	<section class="home-banner" style="background: url('<?php //echo $section1['banner_image']; ?>')">
		<div class="container">
			<video src="<?php echo $section1['banner_video_link']; ?>" autoplay loop playsinline muted></video>
			<div class="banner-details text-center text-capitalize">
				<p><?php echo $section1['sub_heading']; ?></p>
				<h1><?php echo $section1['heading']; ?></h1>
				<p><?php echo $section1['sub_heading2']; ?></p>
			</div>
		</div>
	</section>
	<!--Banner ends here-->

	<!--heart-of-canada section starts here-->
	<section class="heart-of-canada">
		<div class="container">
			<div class="inner-heading text-center ">
				<h2><?php echo $section2['heading']; ?></h2>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-10 col-md-5 intro">
					<p><?php echo $section2['paragraph']; ?></p>
				</div>
				<div class="col-sm-10 col-md-5 newsflash">
					<h4>Newsflash!</h4>

					<?php
					$index = 0;
					foreach($newsflash_set as $newsflash) { ?>
					
					<div>
						<a href="#modal<?php echo $index; ?>" data-bs-target="#modal<?php echo $index; ?>" data-bs-toggle="modal">
							<h3><?php echo $newsflash['news_flash_title']; ?></h3>
							<span><?php echo $newsflash['news_flash_short_description']; ?></span>
						</a>
					</div>
										
					<?php 
						$index++;
					} ?>

				</div>
			</div>
		</div>
	</secton>

	<!-- free-parking section starts here-->
	<section class="free-parking">
		<div class="container">
			<div class="outer-box">
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_1']; ?>" alt="facility-1">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_1_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_2']; ?>" alt="facility-2">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_2_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_3']; ?>" alt="facility-3">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_3_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_4']; ?>" alt="facility-4">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_4_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_5']; ?>" alt="facility-4">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_5_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_6']; ?>" alt="facility-4">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_6_text']; ?></h3>
					</div>
				</div>
				<div class="box">
					<figure>
						<img src="<?php echo $section3['image_7']; ?>" alt="facility-4">
					</figure>
					<div class="box-text">
						<h3><?php echo $section3['image_7_text']; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- free-parking section starts here-->
		<div class="wrapper d-f">
			<a href="<?php echo $section2['image_1_link']; ?>" class="headrt-div">
				<figure>
					<img src="<?php echo $section2['image_1']; ?>" alt="diet-1" />
				</figure>
				<h4><?php echo $section2['image_1_text']; ?></h4>
			</a>
		
			<a href="<?php echo $section2['image_2_link']; ?>" class="headrt-div">
				<figure>
					<img src="<?php echo $section2['image_2']; ?>" alt="diet-2" />
				</figure>
				<h4><?php echo $section2['image_2_text']; ?></h4>
			</a>
			<a href="<?php echo $section2['image_3_link']; ?>" class="headrt-div">
				<figure>
					<img src="<?php echo $section2['image_3']; ?>" alt="diet-3" />
				</figure>
				<h4><?php echo $section2['image_3_text']; ?></h4>
			</a>
		</div>
	</section>
	<!--heart-of-canada section ends here-->

	
	<!--vendors-sec starts here-->
	<section class="vendors-sec">
		<h2><?php echo $section5['heading']; ?></h2>
		<p><?php echo $section5['paragraph']; ?></p>

		<div class="vendors-row">
			<ul class="listing-wrapper">
				<li>
					<span><img src="<?php echo $section5['category_image_1']; ?>" alt="category-1" /></span>
					<?php echo $section5['category_image_1_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_2']; ?>" alt="category-2" /></span>
					<?php echo $section5['category_image_2_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_3']; ?>" alt="category-3" /></span>
					<?php echo $section5['category_image_3_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_4']; ?>" alt="category-4" /></span>
					<?php echo $section5['category_image_4_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_5']; ?>" alt="category-5" /></span>
					<?php echo $section5['category_image_5_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_6']; ?>" alt="category-6" /></span>
					<?php echo $section5['category_image_6_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_7']; ?>" alt="category-7" /></span>
					<?php echo $section5['category_image_7_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_8']; ?>" alt="category-8" /></span>
					<?php echo $section5['category_image_8_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_9']; ?>" alt="category-9" /></span>
					<?php echo $section5['category_image_9_text']; ?>
				</li>
				<li>
					<span><img src="<?php echo $section5['category_image_10']; ?>" alt="category-10" /></span>
					<?php echo $section5['category_image_10_text']; ?>
				</li>
			</ul>
			<a href="<?php echo $section5['vendor_button_link']; ?>"><?php echo $section5['vendor_button_text']; ?></a>
		</div>
	</section>

	<!--stay-connected-->
	<section class="stay-connected">
				<h2 class=""><?php echo $section4['heading']; ?></h2>
		<div class="gallery">
			<div class="item">				
					<img src="<?php echo $section4['slider_image_1']; ?>" alt="connected-img1" />
			</div>
			<div class="item">
					<img src="<?php echo $section4['slider_image_2']; ?>" alt="connected-img2" />
			</div>
			<div class="item">
					<img src="<?php echo $section4['slider_image_3']; ?>" alt="connected-img3" />
			</div>
			<div class="item">
					<img src="<?php echo $section4['slider_image_4']; ?>" alt="connected-img4" />
			</div>
			<div class="item">
					<img src="<?php echo $section4['slider_image_5']; ?>" alt="connected-img5" />
			</div>
			<div class="item">
					<img src="<?php echo $section4['slider_image_5']; ?>" alt="connected-img5" />
			</div>
		</div>
		
	</section>
	<!-- stay-connected Ends here  -->

	<?php
					$index = 0;
					foreach($newsflash_set as $newsflash) { ?>					
					<!-- Modal -->
					<div id="modal<?php echo $index; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-body">										
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<?php echo $newsflash['newsflash_popup_content']; ?>
								</div>
							</div>								
						</div>
					</div>	

			
					
					<?php 
						$index++;
					} ?>

<?php

get_footer();

?>
