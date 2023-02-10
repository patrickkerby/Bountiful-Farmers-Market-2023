<?php
/* Template Name: Homepage */

get_header();


$section1 = get_field('section_1');
$section2 = get_field('section_2');
$section3 = get_field('section_3');
$section4 = get_field('section_4');
$section5 = get_field('section_5');


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
			<h2 class="text-uppercase"><?php echo $section2['heading']; ?></h2>
			<p><?php echo $section2['paragraph']; ?><br><?php echo $section2['sub_paragraph1']; ?><br><?php echo $section2['sub_paragraph2']; ?></p>
		</div>
	</div>

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
		<div class="container">
			<div class="inner-heading text-center">
				<h2 class="text-uppercase"><?php echo $section5['heading']; ?></h2>
				<p><?php echo $section5['paragraph']; ?><br><?php echo $section5['sub_paragraph']; ?></p>
			</div>
		</div>

		<div class="vendors-row">
			<div class="container">
				<h2 class="text-center"><?php echo $section5['category_heading']; ?></h2>
				<div class="row">
					<div class="col-sm-6">
						<ul class="listing-wrapper d-f">
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_1']; ?>" alt="category-1" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_1_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_2']; ?>" alt="category-2" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_2_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_3']; ?>" alt="category-3" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_3_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_4']; ?>" alt="category-4" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_4_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_5']; ?>" alt="category-5" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_5_text']; ?></h4>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-sm-6">
						<ul class="listing-wrapper d-f">
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_6']; ?>" alt="category-6" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_6_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_7']; ?>" alt="category-7" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_7_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_8']; ?>" alt="category-8" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_8_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_9']; ?>" alt="category-9" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_9_text']; ?></h4>
									</div>
								</div>
							</li>
							<li>
								<div class="wraper">
									<span>
										<img src="<?php echo $section5['category_image_10']; ?>" alt="category-10" />
									</span>
									<div class="text">
										<h4><?php echo $section5['category_image_10_text']; ?></h4>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			
				<div class="btn-wrap">
					<a href="<?php echo $section5['vendor_button_link']; ?>" class="outline-btn"><?php echo $section5['vendor_button_text']; ?></a>
				</div>
			</div>
		</div>
	</section>

	<!--stay-connected-->
	<section class="stay-connected">
		<div class="container">
			<div class="inner-heading text-center ">
				<h2 class="text-uppercase"><?php echo $section4['heading']; ?></h2>
			</div>
		</div>
		<div class="owl-carousel owl-theme connected-slider">
			<div class="item">
				<figure>
					<img src="<?php echo $section4['slider_image_1']; ?>" alt="connected-img1" />
				</figure>
			</div>
			<div class="item">
				<figure>
					<img src="<?php echo $section4['slider_image_2']; ?>" alt="connected-img2" />
				</figure>
			</div>
			<div class="item">
				<figure>
					<img src="<?php echo $section4['slider_image_3']; ?>" alt="connected-img3" />
				</figure>
			</div>
			<div class="item">
				<figure>
					<img src="<?php echo $section4['slider_image_4']; ?>" alt="connected-img4" />
				</figure>
			</div>
			<div class="item">
				<figure>
					<img src="<?php echo $section4['slider_image_5']; ?>" alt="connected-img5" />
				</figure>
			</div>
		</div>
		
	</section>
	<!-- stay-connected Ends here  -->

<?php

get_footer();

?>
