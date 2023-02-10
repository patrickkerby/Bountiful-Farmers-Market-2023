<?php

/* Template Name: Reset Password Page */

get_header();

$key=$_GET['key'];


 $sql = "SELECT * from wpfm_users WHERE user_activation_key='$key'";
 $data = $wpdb->get_results( $sql);

if($data){
$email=$data[0]->user_email;
$idd=$data[0]->ID;

?>

 <div class="signUp-page">
	<div class="container">
		<div class="sign-up-heading">
			<h2 class="text-center">Reset Password</h2>
		</div>
		<form class="signup-form custom_signup_form" id="resetPasswordForm" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $idd;?>">
     		<input type="hidden" name="email" id="email" value="<?php echo $email;?>">
			<div class="form-group">
			    <label for="exampleInputPassword1">New Password<sup>*</sup></label>
			    <input type="password" name="password" class="form-control" id="password">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Confirm New Password<sup>*</sup></label>
			    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
			</div>
		
			<button type="submit" class="btn" id="submit_signup">Submit</button>
		</form>
	</div>
</div>
<?php
	}
else{
 wp_redirect(home_url());
exit;

}
?>
<?php get_footer(); ?>