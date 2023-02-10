<?php 

/* Template Name: login Page */

get_header();



 ?>
<div class="signUp-page">
  <div class="container">
  	<div class="sign-up-heading">
  		<h2 class="text-center">Log In</h2>
  	</div>
    <form class="signup-form custom_signup_form" id="loginForm">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address<sup>*</sup></label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password<sup>*</sup></label>
        <div class="pswd-eye">
        <input type="password" name="password" class="form-control" id="login_password">
        <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
      </div>
      </div>

   <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">
  Forgot Your Password ?
</a>
      
      <button type="submit" id="submit_login" class="btn">Log In</button>
    </form>
  </div>
</div>




<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="forgot_form custom_signup_form" id="forgotForm">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address<sup>*</sup></label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>          
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>