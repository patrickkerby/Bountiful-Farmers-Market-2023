<?php 

/* Template Name: Sign Up Page */

get_header();

$current_user = wp_get_current_user();
$email= $current_user->user_email;
$id=$current_user->ID;

if ($id) {
	wp_redirect( site_url() );
exit;
}
else{
?>


 <div class="signUp-page">
	<div class="container">
		<div class="sign-up-heading">
			<h2 class="text-center">Sign up</h2>
		</div>
		<form class="signup-form custom_signup_form" id="signupForm" method="post">
			<div class="row">
				<div class="col">
					<div class="form-group">
					    <label for="exampleInputEmail1">First Name<sup>*</sup></label>
					    <input type="text" name="full_name" class="form-control">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
					    <label for="exampleInputEmail1">Last Name<sup>*</sup></label>
					    <input type="text" name="last_name" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Email address<sup>*</sup></label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Password<sup>*</sup></label>
			    <input type="password" name="password" class="form-control" id="password">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Confirm Password<sup>*</sup></label>
			    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Phone Number<sup>*</sup></label>
			    <input type="text" name="contact_number" class="form-control" id="contact_number">
			</div>
			<button type="submit" class="btn" id="submit_signup">Sign Up</button>
		</form>
	</div>
</div>

<?php  } ?>

<?php get_footer(); ?>