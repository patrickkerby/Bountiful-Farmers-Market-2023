
<!-- This block goes in header.php. its the woocommerce cart, and ties into the login/register links -->
<div class="custom_menu_top col-sm-1">
  <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    $cc = count($items);
    if ( is_user_logged_in() ) {
    wp_nav_menu( array(
    'menu' => "after_login", 
    ) );  
  ?>
  <span class="cart-count after-login"><?php echo $cc; ?></span> 
  <?php    
      } else {
    wp_nav_menu( array(
    'theme_location'    => 'top_menu',
    ));  
  ?>
  <span class="cart-count"><?php echo $cc; ?></span> 
  <?php }
  global $wp;
  $current_page_url = home_url($wp->request);
  if ($current_page_url == home_url("/shop")) {
    dynamic_sidebar( 'primary' );  ?>

  <div class="m-search">
      <a href="javascript:void(0);" class="mob-search">
          <i class="fa fa-search"></i>
      </a>
  </div>

  <?php } ?>            
</div>



{{# THIS SHIT IS IN THE FOOTER #}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
global $wp;
$faq_url = home_url( $wp->request );
if ($faq_url != "https://bountiful2022.test/faqs") {  ?>
 <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script> 
 <?php
} ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-select.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">



function backfunc(){
window.location.href = "https://bountiful2022.test/shop/";
}


// function sortTable() {
//   var table, rows, switching, i, x, y, shouldSwitch;
//   table = document.getElementById("myTable");
//   switching = true;
//   /*Make a loop that will continue until
//   no switching has been done:*/
//   while (switching) {
//     //start by saying: no switching is done:
//     switching = false;
//     rows = table.rows;
//     /*Loop through all table rows (except the
//     first, which contains table headers):*/
//     for (i = 1; i < (rows.length - 1); i++) {
//       //start by saying there should be no switching:
//       shouldSwitch = false;
//       Get the two elements you want to compare,
//       one from current row and one from the next:
//       x = rows[i].getElementsByTagName("TD")[1];
//       y = rows[i + 1].getElementsByTagName("TD")[1];
//       //check if the two rows should switch place:
//       if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//         //if so, mark as a switch and break the loop:
//         shouldSwitch = true;
//         break;
//       }
//     }
//     if (shouldSwitch) {
//       /*If a switch has been marked, make the switch
//       and mark that a switch has been done:*/
//       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
//       switching = true;
//     }
//   }
// }


jQuery( document ).ready(function() {
   

    var table1, rows, switching, i1, x, y, shouldSwitch;
      table1 = document.getElementById("myTable");
      tr = table1.getElementsByTagName("tr");
      for (var m = 0; m < tr.length; m++) {
          tr[m].style.display = "";
      }

        switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
          while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table1.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i1 = 1; i1 < (rows.length - 1); i1++) {
              //start by saying there should be no switching:
              shouldSwitch = false;
              /*Get the two elements you want to compare,
              one from current row and one from the next:*/
              x = rows[i1].getElementsByTagName("TD")[1];
              y = rows[i1 + 1].getElementsByTagName("TD")[1];
              //check if the two rows should switch place:
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
            if (shouldSwitch) {
              /*If a switch has been marked, make the switch
              and mark that a switch has been done:*/
              rows[i1].parentNode.insertBefore(rows[i1 + 1], rows[i1]);
              switching = true;
            }
          }

});


function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
      if (filter != "ALPHABETICAL") {
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
       // alert(filter);
        if (td) {        
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || filter === "DEFAULT SORTING") {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
  }
      else{

        // alert("sort alphabetically");

    var table1, rows, switching, i1, x, y, shouldSwitch;
      table1 = document.getElementById("myTable");
      tr = table1.getElementsByTagName("tr");
      for (var m = 0; m < tr.length; m++) {
          tr[m].style.display = "";
      }

        switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
          while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table1.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i1 = 1; i1 < (rows.length - 1); i1++) {
              //start by saying there should be no switching:
              shouldSwitch = false;
              /*Get the two elements you want to compare,
              one from current row and one from the next:*/
              x = rows[i1].getElementsByTagName("TD")[1];
              y = rows[i1 + 1].getElementsByTagName("TD")[1];
              //check if the two rows should switch place:
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
            if (shouldSwitch) {
              /*If a switch has been marked, make the switch
              and mark that a switch has been done:*/
              rows[i1].parentNode.insertBefore(rows[i1 + 1], rows[i1]);
              switching = true;
            }
          }

      }
}


// function resetFunction(data) {
//   var input, filter, table, tr, td, i;
//   input = document.getElementById("mylist");
//   filter = data.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[3];
//    // alert(filter);
//     if (td) {        
//       if (filter === "DEFAULT SORTING") {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }


function myFunction1(data) {

    // alert(data);
    const areThereAnyCommas = data.includes(',');
    // alert(areThereAnyCommas);
        var input, filter, table, tr, td, i;
        if (areThereAnyCommas == true) {
            // alert("yes");
        var newVar =  data.split(',');
            newVar.map((item)=>{
                filter = item;
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                  if (td.innerHTML.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } 
                  else {
                    if(newVar.indexOf(td.innerHTML) !== -1){  
                          tr[i].style.display = "";
                    }   
                    else{
                    tr[i].style.display = "none";
                    }
                  }
                }       
              }
            })
        }
        else{

          filter = data.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }

}


</script>

<script>
		
        // $('button').on('click', function(){
        //     var number = getRandomInt(1, 40);
        //     if (number < 10) {number = '0'+ number;}
        //     $(this).html('<div class="loader-' + number + '"></div> Loading...');
        //     console.log('Resize window to change size and color of the button');
        // });

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        $(window).resize(function() {
            $('button').css('color', 'hsl(' + Math.floor((window.innerWidth / 360)*100)  + ', 70%, 70%)');
        });
    </script>
    
    <script>
        $('.connected-slider').owlCarousel({
            loop:true,
            margin:0,
            autoplay: true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                767:{
                    items:3,
                    dots: true,
                },
                1000:{
                    items:5
                }
            }
        });

    $('.about-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

jQuery( document ).ready(function() {



  jQuery(".m-search").click(function(e){
        
    jQuery(".wp-block-search__button-inside").addClass("c-show");
      e.preventDefault();
      e.stopPropagation();
  });


jQuery(document).click(function (e) {

    let container = jQuery('body').find('.wp-block-search__button-inside');
    // If the target of the click isn't the container
    if(!container.is(e.target) && container.has(e.target).length === 0){
       jQuery('.wp-block-search__button-inside').removeClass("c-show");
    }


     jQuery(".custom-show-hide").click(function(e){

        alert('dd');
        
    jQuery(".nav-link .dropdown").toggleClass("custom-show-hide");
      e.preventDefault();
      e.stopPropagation();
  });
    
});

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#login_password');
 
 if (togglePassword) {
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

  }

  jQuery('.orderby').on('change', function() {
    jQuery('.loader_custom_box').css('display', 'block');
});

jQuery('.wpc-filters-widget-select').on('change', function() {
    jQuery('.loader_custom_box').css('display', 'block');
});


// Shipping form hide with js
 // jQuery(".shipping_address").hide();
// Shipping form hide with js

jQuery("#custom_categories_filters").on('change' , function(){

  // let link ="<?php //echo admin_url('admin-ajax.php')?>";
  let termSlug = jQuery(this).val();
  jQuery('.loader_custom_box').css('display', 'block');

  if (termSlug == "all") {
    window.location.href = "<?php echo site_url(); ?>/shop";
  }
  else{
    window.location.href = "<?php echo site_url(); ?>/product-category/"+termSlug;
  }



});



});

// Ajax code of Signup form Start

jQuery(document).ready(function(){

    jQuery.validator.addMethod("lettersonly", function(value, element) {

        // console.log(value + element);
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Only alphabets are allowed.");

      jQuery.validator.addMethod("noSpace", function(value, element) { 
          return value.indexOf(" ") < 0 && value != ""; 
        }, "No space allowed in Name");

    jQuery.validator.addMethod("emailExt", function(value, element, param) {
    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    },'Please enter a valid email address.');
          
    jQuery("#signupForm").validate({
           // in 'rules' user have to specify all the constraints for respective fields
         rules : {
             full_name : {
             required : true,
             lettersonly : true,
             noSpace : true
             },
             last_name : {
             required : true,
             lettersonly : true,
             noSpace : true
             },

             email : {
             required : true,
             emailExt : true
             },

             password : {
             required : true,
             minlength : 5
             },

             confirm_password : {
             required : true,
             minlength : 5,
             equalTo : "#password" //for checking both passwords are same or not
             },

             contact_number : {
             required : true,
             number: true,
             minlength : 10
             
             }
         
         },
             // in 'messages' user have to specify message as per rules
         messages : {

             full_name : {
                required : "Please enter First Name"
             },

             last_name : {
                required : "Please enter Last Name"
             },

             email :{
             required : "Please enter Email",
             },

             password : {
             required : "Please enter a Password",
             minlength : "Your Password must be consist of at least 5 characters"
             },

             confirm_password : {
             required : "Please enter a Password",
             minlength : "Your Password must be consist of at least 5 characters",
             equalTo : "Please enter the same Password as above"
             },

             contact_number : {
             required : "Please enter a Phone Number",
             minlength : "Your Number must have at least 10 numbers",
             number : "Please enter Numbers only"
             }

         },

        submitHandler: function() {

        let link ="<?php echo admin_url('admin-ajax.php')?>";
        let form= jQuery('#signupForm').serialize();

        // console.log(form);
        var formData = new FormData;
        formData.append('action' , 'signup_submit');
        formData.append('signup_submit' , form);

            jQuery.ajax({

                type        : "POST",
                 url         : link,
                 async       : true,
                 data        : formData,
                 processData : false,
                 contentType : false,
                 cache       : false,


                 beforeSend: function() {
                 // jQuery("#loader").css("display","block");
                 jQuery("#submit_signup").attr("disabled",true);
                },


                 success:function(result){
                      if(result==1) {

                         swal(" Done ", " User Account Created Successfully ", "success",  {button: " Ok "})
                          .then(function() {
                             location.href = "<?php echo site_url();?>/login";   
                          });                    
              
                      }
                      else if(result==2){
                           swal(" Error ", "Email Already exists in our database, Please try with Another one", "error",  {button: " Ok "});
                        // alert('Invalid Credentials');
                        jQuery("#submit_signup").attr("disabled",false);
                        return false;
                      }
                      else{
                        // alert("No data found");
                        swal(" Error ", "Error occured, Try after some time", "error",  {button: " Ok "});
                        jQuery("#submit_signup").attr("disabled",false);
                        return false;
                      }
                 }        
            });    
        }
    });
});

// Ajax code of Signup form end


// Ajax code of Login form Start

jQuery(document).ready(function(){
          
    jQuery("#loginForm").validate({
           // in 'rules' user have to specify all the constraints for respective fields
         rules : {

             email : {
             required : true,
             email : true
             },

             password : {
             required : true,
             minlength : 5
             },
         
         },
             // in 'messages' user have to specify message as per rules
         messages : {

             email :{
             required : "Please enter Email",
             email : "Please enter a valid Email address"
             },

             password : {
             required : "Please enter a Password",
             minlength : "Your Password must be consist of at least 5 characters"
             },

         },

    submitHandler: function() {

        let link ="<?php echo admin_url('admin-ajax.php')?>";
        let form= jQuery('#loginForm').serialize();

        // console.log(form);
        var formData = new FormData;
        formData.append('action' , 'login_submit');
        formData.append('login_submit' , form);

        jQuery.ajax({

                type        : "POST",
                 url         : link,
                 async       : true,
                 data        : formData,
                 processData : false,
                 contentType : false,
                 cache       : false,

                beforeSend: function() {
                 // jQuery("#loader").css("display","block");
                 jQuery("#submit_login").attr("disabled",true);
                },

                 success:function(result){

                      if(result==1) {

                         swal(" Done ", "Login Successfully", "success",  {button: " Ok "})
                          .then(function() {
                             location.href = "<?php echo site_url();?>/my-account";   
                          });           

                      }

                      else if(result==3){
                           
                           swal(" Done ", "Login Successfully", "success",  {button: " Ok "})
                          .then(function() {
                             location.href = "<?php echo site_url();?>/dashboard";   
                          });  
                      }

                      else if(result==2){
                           
                           swal(" Error ", "No data found in our records ", "error",  {button: " Ok "});
                        // alert('Invalid Credentials');
                        jQuery("#submit_login").attr("disabled",false);
                        return false;
                      }
                      else{
                        // alert("No data found");
                        swal(" Error ", "Invalid Credentials", "error",  {button: " Ok "});
                        jQuery("#submit_login").attr("disabled",false);
                        return false;
                      }

                 }
        
        });
    
    }

    });
});

// Ajax code of Login form end


// Ajax code of Forgot Password form Start

jQuery(document).ready(function(){
          
    jQuery("#forgotForm").validate({
           // in 'rules' user have to specify all the constraints for respective fields
         rules : {
             email : {
             required : true,
             email : true
             }         
         },
             // in 'messages' user have to specify message as per rules
         messages : {

             email :{
             required : "Please enter Email",
             email : "Please enter a valid Email Address"
             },
         },

    submitHandler: function() {

        // alert("ssss");

        let link ="<?php echo admin_url('admin-ajax.php')?>";
        let form= jQuery('#forgotForm').serialize();

        // console.log(form);
        var formData = new FormData;
        formData.append('action' , 'forgot_password_submit');
        formData.append('forgot_password_submit' , form);

        jQuery.ajax({

                type        : "POST",
                 url         : link,
                 async       : true,
                 data        : formData,
                 processData : false,
                 contentType : false,
                 cache       : false,

                 success:function(result){

                      if(result==1) {

                         swal(" Done ", "Reset Password Email is send to your email Successfully", "success",  {button: " Ok "})
                          .then(function() {
                             location.href = "<?php echo site_url();?>";   
                          });                                   

                      }
                      else if(result==2){
                           
                           swal(" Error ", "This email Id doesn’t exist in our database. Kindly provide your registered ID", "error",  {button: " Ok "});
                        // alert('Invalid Credentials');
                        return false;
                      }
                      else{
                        // alert("No data found");
                        swal(" Error ", "Error Occured, Please try after some time", "error",  {button: " Ok "});
                        return false;
                      }

                 }
        
        });
    
    }

    });
});


// Ajax code of Forgot Password form End


// Ajax code of Reset Password form Start

jQuery(document).ready(function(){
          
    jQuery("#resetPasswordForm").validate({
           // in 'rules' user have to specify all the constraints for respective fields
         rules : {
            password : {
             required : true,
             minlength : 5
             },

             confirm_password : {
             required : true,
             minlength : 5,
             equalTo : "#password" //for checking both passwords are same or not
             }      
         },
             // in 'messages' user have to specify message as per rules
         messages : {
            
             password : {
             required : "Please enter a password",
             minlength : "Your password must be consist of at least 5 characters"
             },

             confirm_password : {
             required : "Please enter a password",
             minlength : "Your password must be consist of at least 5 characters",
             equalTo : "Please enter the same password as above"
             }
         },

    submitHandler: function() {

        // alert("ssss");

        let link ="<?php echo admin_url('admin-ajax.php')?>";
        let form= jQuery('#resetPasswordForm').serialize();

        // console.log(form);
        var formData = new FormData;
        formData.append('action' , 'reset_password_submit');
        formData.append('reset_password_submit' , form);

        jQuery.ajax({

                type        : "POST",
                 url         : link,
                 async       : true,
                 data        : formData,
                 processData : false,
                 contentType : false,
                 cache       : false,

                 success:function(result){
                    
                      if(result==1) {

                         swal(" Done ", "Password Changed Successfully", "success",  {button: " Ok "})
                          .then(function() {
                             location.href = "<?php echo site_url();?>";   
                          });                                   

                      }
                      else{
                        // alert("No data found");
                        swal(" Error ", "Error Occured", "error",  {button: " Ok "});
                        return false;
                      }

                 }
        
        });
    
    }

    });
});


// Ajax code of Submit events form Start

jQuery(document).ready(function(){
    // jQuery.validator.addMethod("lettersonly", function(value, element) {

    //     // console.log(value + element);
    //     return this.optional(element) || /^[a-z ]+$/i.test(value);
    // }, "Only alphabets are allowed.");

    //   jQuery.validator.addMethod("noSpace", function(value, element) { 
    //       return value.indexOf(" ") < 0 && value != ""; 
    //     }, "No space allowed in Name");

    jQuery.validator.addMethod("emailExt", function(value, element, param) {
    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    },'Please enter a valid email address.');
          
    jQuery("#event_form_submit").validate({
         rules : {
             uname : {
             required : true,
             
             },

             email : {
             required : true,
             emailExt : true
             },         

             phone_number : {
             required : true,
             number: true,
             minlength : 10
             
             },
            optradio : {
             required : true,
           
             }

         
         },
         messages : {

             uname : {
                required : "Please enter Name",
             },

             email :{
             required : "Please enter Email",
             },

             phone_number : {
             required : "Please enter a Phone Number",
             minlength : "Your Number must have at least 10 numbers",
             number : "Please enter Numbers only"
             },
             optradio : {
             required : "Please Accept Event Rules",
           
             }

         },

        submitHandler: function() {

        let link ="<?php echo admin_url('admin-ajax.php')?>";
        let form= jQuery('#event_form_submit').serialize();

        // console.log(form);
        var formData = new FormData;
        formData.append('action' , 'event_submit');
        formData.append('event_submit' , form);

            jQuery.ajax({

                type        : "POST",
                 url         : link,
                 async       : true,
                 data        : formData,
                 processData : false,
                 contentType : false,
                 cache       : false,


                 beforeSend: function() {
                 // jQuery("#loader").css("display","block");
                 jQuery("#event_submit_button").attr("disabled",true);
                },

                 success:function(result){
                    
                      if(result==1) {

                         swal(" Done ", "Registered Successfully", "success",  {button: " Ok "})
                          .then(function() {
                             // location.href = "<?php //echo site_url();?>/login";   
                             location.reload();
                          });                    
              
                      }
                 
                      else{
                        // alert("No data found");
                        swal(" Error ", "Error occured, Try after some time", "error",  {button: " Ok "});
                        jQuery("#submit_signup").attr("disabled",false);
                        return false;
                      }
                 }        
            });    
        }
    });
});

// Ajax code of Submit events form end


    </script>

This was in the functions file and caused duplicate jquery and most things in the backend wouldn't work:
<?php
function my_enqueueee($hook) {

wp_enqueue_script('slim_file', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
wp_enqueue_script('popper_file', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
wp_enqueue_script('Boot_file', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js');
wp_enqueue_script('ajax_file', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
wp_enqueue_script('jquery_val_file', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js');
// wp_enqueue_script('sweetdd_file', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');
wp_enqueue_script( 'jquery-ui-datepicker' );

}

add_action('admin_enqueue_scripts', 'my_enqueueee'); 
?>



///// This part was in functions.php and I believe it was running the custom events section which has since been replaced by Events calendar PHP_ROUND_HALF_DOWN
//Event Form Submit Functionality Code start

add_action("wp_ajax_event_submit", "event_submit");
add_action("wp_ajax_nopriv_event_submit", "event_submit");


function event_submit(){

    $arr=[];    
    wp_parse_str($_POST['event_submit'],$arr);
    $event_name = $arr['event_name'];
    $name = $arr['uname'];
    $email = $arr['email'];
    $phone_number = $arr['phone_number'];
    $optradio = $arr['optradio'];

        $to        =  get_option( 'admin_email' ); 
        // $to        =  'test143434@mailinator.com'; 
        $subject   = 'New Event Register Request';
        $fromname  = 'Bountiful';
        $fromemail = 'noreply@bountiful.com'; 
        // $fromemail='test@gmail.com';
        $message="<p>Hello,</p> "; 
        $message.="<p>An event register request is received.</p>"; 
        
        $message.="<p>Name: ".$name ."</p>";
        $message.="<p>Email: ".$email ."</p>";
        $message.="<p>Phone Number: ".$phone_number ."</p>";
        $message.="<p>Event Name: ".$event_name ."</p>";
        // $message.="<a href='".site_url()."/reset-password'>Reset Password</a><br>";
        $message.="<p>Thanks</p>";

        $headers[] = 'MIME-Version: 1.0' . "\r\n";
        $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers[] = "X-Mailer: PHP \r\n";
        $headers[] = "From: ".$fromname." <".$fromemail.">";


         // $headers[] = 'From: email <wordpress@vpcapitallending.com>';

        $mail = wp_mail( $to, $subject, $message , $headers );


        if( $mail ) {
         echo 1;
         wp_die();
         // echo "mail send";
        } 
        else {
        echo 0;
        wp_die();
        }   
   
}

//Event Form Submit Functionality Code end


//Event Form Submit Functionality Code start

add_action("wp_ajax_date_range_filter", "date_range_filter");
add_action("wp_ajax_nopriv_date_range_filter", "date_range_filter");


function date_range_filter(){

$val=$_POST['value'];

if ($val != null) {

	$dates = explode("&",$val);
	$start_date = $dates[0];
	$end_date = $dates[1];
	$args  = [
	'post_type'      => 'event_listing',
	'meta_query'     => [
	   [
	      'key'     => '_event_start_date',
	      'value'   => [$start_date, $end_date],
	      'compare' => 'BETWEEN',
	      'type'    => 'DATE'
	   ]
	]
	];
	
}
else{
	$args = array(
  'numberposts' => -1,
  'post_type'   => 'event_listing',
  'orderby' => 'date',
  'order' => 'ASC'
);
}


 $loop = new WP_Query( $args ); 

 $pp=get_posts($args);

 if($pp){
 $html='';
    while ( $loop->have_posts() ) : $loop->the_post(); 
    $post_id = get_the_ID();

 $meta = get_post_meta($post_id);

 $event_data =  get_event_type($post_id) ;
 
$event_type = $event_data[0]->slug;

//  $event_type = get_post_meta($post_id , 'event_type', true);

 if($event_type == 'community-booth'){
    $color= "#ffff62";
    $sub_color= "#ffe92a";
    } 
    elseif ($event_type == 'buskers') {
       $color= "#d3e4bd";
       $sub_color= "#92bc5c";
    }
    elseif ($event_type == 'contests') {
       $color= "#f29e5a";
       $sub_color= "#ed710c";
    }
    elseif ($event_type == 'entertainment') {
       $color= "#ed6666";
       $sub_color= "#f73b3b";
    }
    elseif ($event_type == 'kids') {
       $color= "#e5b5f2";
       $sub_color= "#c447e6";
    }
    else{
       $color= "#787afa";
       $sub_color= "#4547de";
    }


$eventPlace = get_post_meta($post_id , '_event_online',true);
if($eventPlace == 'yes'){
    $location = 'Online Event' ; 
}
else{
    $location = 'On Site' ; 
}
    

 $startDate= $meta['_event_start_date'][0];

 $StartDateD = explode(" ",$startDate);
 $finalDateStart = $StartDateD[0];

 $endDate= $meta['_event_end_date'][0];

 $EndDateD = explode(" ",$endDate);
 $finalDateEnd = $EndDateD[0];

 $startTime= $meta['_event_start_time'][0];

 $endTime= $meta['_event_end_time'][0];
    
    $html.='<div class="wpem-event-box-col wpem-col wpem-col-12 wpem-col-md-6 wpem-col-lg-4"><div class="wpem-event-layout-wrapper">';
    $html.='<div class="event_listing event-type-'.$event_type.'  post-'.get_the_ID().' type-event_listing status-publish has-post-thumbnail hentry event_listing_type-'.$event_type.'">';
    $html.='<a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "><div class="wpem-event-banner">';
    $html.='<div class="wpem-event-banner-img" style="background-image: url('.get_the_post_thumbnail_url().')">';
    $html.='<div class="wpem-event-date"><div class="wpem-event-date-type"></div></div></div></div></a>';
    $html.='<div class="wpem-event-infomation" style="background-color:  '.$color.' "><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color ">';
    $html.='<div class="wpem-event-date"><div class="wpem-event-date-type"><div class="wpem-from-date"><div class="wpem-date">08</div><div class="wpem-month">Jul</div></div><div class="wpem-to-date"><div class="wpem-date-separator">-</div>';
    $html.='<div class="wpem-date">15</div><div class="wpem-month">Jul</div></div></div></div>';
    $html.='</a><div class="wpem-event-details"><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "><div class="wpem-event-title"><h3 class="wpem-heading-text">'.get_the_title().'</h3>';
    $html.='</div><div class="wpem-event-date-time"><span class="wpem-event-date-time-text">'.$finalDateStart.'@'.$startTime.'-'.$finalDateEnd.'@'.$endTime.'</span></div><div class="wpem-event-location"><span class="wpem-event-location-text">'.$location.'</span>';
    $html.='</div></a><div class="wpem-event-type"><a href="'.get_the_permalink().'" class="wpem-event-action-url event-style-color "></a><a href="" class="custom-event-type-a">';
    $html.='<span class="custom-event-type-a-span" style="background-color: '.$sub_color.'!important ">'.$event_type.'</span></a></div></div></div></div></div></div>';

    endwhile;
}
else{
    $html = '<div class="custom-err-class"><p>There are no events matching your search.</p></div>';
}
echo $html;
wp_die();

}

// Register main datepicker jQuery plugin script
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );
function enabling_date_picker() {

    // Only on front-end and checkout page
    if( is_admin() || ! is_checkout() ){
         // wp_enqueue_script( 'jquery-ui-datepicker' );
        return;
    } 
    else{
            // Load the datepicker jQuery-ui plugin script
    wp_enqueue_script( 'jquery-ui-datepicker' );
    }


} 


// This is the checkout fields concerning picking time and delivery. They go in the functions.php file, and have a comment showing where:


// Custom Checkout Fields
add_action( 'woocommerce_after_checkout_billing_form', 'custom_shipping_method' );

function custom_shipping_method( $checkout ){


	echo '<div id="my_custom_checkout_field">
    <h3>'.__('Delivery Info').'</h3>';

    echo '<p>'.__('"Please note that Deliveries are only within Edmonton. Delivery times are estimates only. If you are not available to receive your order, the products will be left on your doorstep."').'</p>';



    woocommerce_form_field( 'shipping_method_custom', array(
        'type' => 'select',
        'required' => true,
        'class' => array('form-row-wide'),
        'label' => 'Choose the Delivery method',
        'options' => get_ship_methods()
    ), $checkout->get_value( 'shipping_method_custom' ) );

  ?>
    <script>

        jQuery(function($){

            var shiping_method = "";
            var get_holidays_dates = [];
            jQuery("#shipping_method_custom").on("change", function () {
                shiping_method = jQuery(this).val();

                jQuery('#time_field').val('');
                jQuery('#datepicker').val('');

                    let link ="<?php echo admin_url('admin-ajax.php')?>";
                    let formData = new FormData;
                    formData.append('action' , 'get_holidays');
                    // formData.append('update_checkout_total' , shiping_method);

                    jQuery.ajax({
                            type        : "POST",
                            url         : link,
                            async       : true,
                            data        : formData,
                            processData : false,
                            contentType : false,
                            cache       : false,

                beforeSend: function() {
                 // jQuery("#loader").css("display","block");
                 jQuery("#datepicker").attr("disabled",true);
                },


                        success: function (data) {
                           var dd= JSON.parse(data);
                            get_holidays_dates = dd;
                            jQuery("#datepicker").attr("disabled",false);                          
                        },
                        error: function () {
                            alert("Error Accured...");
                        }
                    });
                });

      const d = new Date();
			let day = d.getDay();
			let hour = d.getHours();

			const mindate = (day , hours) =>{

				if (day <= 3) {
					if (hour < 18) {
						return '+1D';
					}
					else{
						return '+2D';
					}
				}
				else{
					if (hour < 18) {
						return '+2D';
					}
					else{
						return '+3D';
					}
				}
			}

            $( "#datepicker" ).datepicker({ minDate: mindate(day,hour) , maxDate: '+1M',
            	beforeShowDay: function(date){
                var ymd = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                console.log(get_holidays_dates);
                 if ($.inArray(ymd, get_holidays_dates) >= 0) {
                return [ false, 'holiday red', 'Red!' ];
            }
                     // console.log(holidays); 
                    if(shiping_method == "pickup"){  
                          
                         if(date.getDay() == 0  || date.getDay() == 5 || date.getDay() == 6){
                                            return [true];
                                        } else {
                                            return [false];
                                        }

                    }
                    else if(shiping_method == "delivery"){
                        if(date.getDay() == 5 || date.getDay() == 6){
                                            return [true];
                                        } else {
                                            return [false];
                                        }
                    }
                    else{
                        return [false];
                                    
                    }

		        },
                onSelect: function(dateText, inst) {
                    var date = $(this).datepicker('getDate');
                    var dayName = $.datepicker.formatDate('DD', date);

                    // console.log(dayName);
                    // return false;
                    // var dayOfWeek = date.getUTCDay();
                    var ship = jQuery('#shipping_method_custom').val();

                     // console.log(dayOfWeek);

                    let link ="<?php echo admin_url('admin-ajax.php')?>";
                    let formData = new FormData;
                    formData.append('action' , 'on_select_date');
                    formData.append('dayOfWeek' , dayName);
                    formData.append('ship' , ship);

                    // alert(dayOfWeek);
                    // return false;


                    jQuery.ajax({

                            type        : "POST",
                            url         : link,
                            async       : true,
                            data        : formData,
                            processData : false,
                            contentType : false,
                            cache       : false,


                        success: function (data) {
                            //alert("Ok");
                            
                            // console.log(data);
                            
                        
                            $('#time_field').html(data);
                          
                        },
                        error: function () {
                            alert("Error Accured...");
                        }
                    });


                }
     

             });

        });
    </script>
    <?php

   woocommerce_form_field( 'order_pickup_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'id'            => 'datepicker',
        'required'      => true,
        'label'         => ('Select Delivery Date'),
        'placeholder'   => ('Select Date'),
        // 'options'     	=>   $mydateoptions,

        ),$checkout->get_value( 'order_pickup_date' ));

    echo '</div>';

        woocommerce_form_field( 'time_field', array(
        'type' => 'select',
        'required' => true,
        'class' => array('form-row-wide'),
        'label' => 'Select Time Slot',
        'options'       => array(
            ''     => __( 'Select Time Slot', 'wps' )
        )
    ), $checkout->get_value( 'time_field' ) );

    }


   function get_ship_methods() {

    $leaders = [];
    // $leaders = ['' => 'Choose '];
    // $users = get_users( $args );
    $users = array("" => "Select Delivery Method" ,"delivery"=>"Delivery", "pickup"=>"Pickup");
    if($users){
       foreach($users as $key => $value){
           $leaders[$key] = $value;
       }
    }
    return $leaders;
   }

add_action('woocommerce_checkout_process', 'customised_checkout_field_process');

	function customised_checkout_field_process(){

		if (!$_POST['shipping_method_custom']) wc_add_notice(__('Please enter Shipping Method!') , 'error');

		if (!$_POST['order_pickup_date']) wc_add_notice(__('Please enter Preferred Date!') , 'error');

		if (!$_POST['time_field']) wc_add_notice(__('Please enter Preferred Time!') , 'error');

	}


// Save custom checkout field value as user meta data
add_action('woocommerce_checkout_update_order_meta','custom_checkout_checkbox_update_customer', 10, 2 );

	function custom_checkout_checkbox_update_customer( $order_id, $posted  ){	  

	   if( isset( $_POST['shipping_method_custom'] ) ) {
	    update_post_meta( $order_id, 'custom_shipping_method', $_POST['shipping_method_custom'] );
		}

	 	if( isset( $_POST['order_pickup_date'] ) ) {
	    update_post_meta( $order_id, 'preferred_date', $_POST['order_pickup_date'] );
	    }

    if( isset( $_POST['time_field'] ) ) {
    update_post_meta( $order_id, 'preferred_time', $_POST['time_field'] );
    }
	}

add_action( 'woocommerce_thankyou', 'cloudways_display_order_data', 20 );
add_action( 'woocommerce_view_order', 'cloudways_display_order_data', 20 );

	function cloudways_display_order_data( $order_id ){

$parent_id =  has_post_parent($order_id);
if ($parent_id) {
  $order_id = wp_get_post_parent_id($order_id);
}
  ?>
	    <h2><?php _e( 'Delivery Information' ); ?></h2>
	    <table class="shop_table shop_table_responsive additional_info">
	        <tbody>
	        	<tr>
	                <th><?php _e( 'Shipping Method:' ); ?></th>
	                <td><?php echo get_post_meta( $order_id, 'custom_shipping_method', true ); ?></td>
	            </tr>
	            <tr>
	                <th><?php _e( 'Delivery Date/Pickup:' ); ?></th>
	                <td><?php echo get_post_meta( $order_id, 'preferred_date', true ); ?></td>
	            </tr>
                <tr>
                    <th><?php _e( 'Delivery/Pickup Time:' ); ?></th>
                    <td><?php echo get_post_meta( $order_id, 'preferred_time', true ); ?></td>
                </tr>
	            
	        </tbody>
	    </table>
	<?php }



add_action( 'woocommerce_admin_order_data_after_order_details', 'cloudways_display_order_data_in_admin' );

	function cloudways_display_order_data_in_admin( $order ){
    $order_id =  $order->id;
    $parent_id =  has_post_parent($order_id);
if ($parent_id) {
  $order_id = wp_get_post_parent_id($order_id);
}
    ?>
	    <div class="order_data_column">
	        <h4><?php _e( 'Additional Information', 'woocommerce' ); ?><a href="#" class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a></h4>
	        <div class="address">
	        <?php
	            echo '<p><strong>' . __( 'Shipping Method:' ) . ':</strong>' . get_post_meta( $order_id, 'custom_shipping_method', true ) . '</p>';
	            echo '<p><strong>' . __( 'Delivery Date:' ) . ':</strong>' . get_post_meta( $order_id, 'preferred_date', true ) . '</p>';
                 echo '<p><strong>' . __( 'Delivery Time:' ) . ':</strong>' . get_post_meta( $order_id, 'preferred_time', true ) . '</p>'; ?>

	        </div>
	        <div class="edit_address">
	            <?php woocommerce_wp_text_input( array( 'id' => 'custom_shipping_method', 'label' => __( 'Some field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
	            <?php woocommerce_wp_text_input( array( 'id' => 'preferred_date', 'label' => __( 'Another field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
                <?php woocommerce_wp_text_input( array( 'id' => 'preferred_time', 'label' => __( 'Another field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
	        </div>
	    </div>
	<?php }



add_action( 'woocommerce_process_shop_order_meta', 'cloudways_save_extra_details', 45, 2 );

	function cloudways_save_extra_details( $post_id, $post ){
	    update_post_meta( $post_id, '_cloudways_text_field', wc_clean( $_POST[ 'custom_shipping_method' ] ) );
	    update_post_meta( $post_id, '_cloudways_dropdown', wc_clean( $_POST[ 'preferred_date' ] ) );
      update_post_meta( $post_id, '_cloudways_dropdown', wc_clean( $_POST[ 'preferred_time' ] ) );
	}


  