<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */
?>
<!-- </div> -->
<!-- .row -->
<!-- </div> -->
<!-- .container -->
<!-- </div> -->
<!-- #main .site-main -->

<!-- <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>

                <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div>
            </div> 
        </div>
    </div>

    <div class="copy-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copy">
                        <div class="col-md-6 site-info">
                            <?php
                            $footer_text = get_theme_mod( 'footer_text' );

                            if ( empty( $footer_text ) ) {
                                printf( __( '&copy; %d, %s. All rights are reserved.', 'dokan-theme' ), date( 'Y' ), get_bloginfo( 'name' ) );
                                printf( __( 'Powered by <a href="%s" target="_blank">Dokan</a> from <a href="%s" target="_blank">weDevs</a>', 'dokan-theme' ), esc_url( 'http://wedevs.com/theme/dokan/?utm_source=dokan&utm_medium=theme_footer&utm_campaign=product' ), esc_url( 'http://wedevs.com/?utm_source=dokan&utm_medium=theme_footer&utm_campaign=product' ) );
                            } else {
                                echo $footer_text;
                            }
                            ?>
                        </div>

                        <div class="col-md-6 footer-gateway">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'  => 'footer',
                                    'depth'           => 1,
                                    'container_class' => 'footer-menu-container clearfix',
                                    'menu_class'      => 'menu list-inline pull-right',
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</footer>
</div>
 -->

<!-- custom footer -->


     <!-- FOOTER START  -->
     <footer>
        <div class="container">
            <div class="row justify-content-center contact-form">
                <div class="col-md-7">
                    <p>Sign up to stay up-to-date on what’s going on at Edmonton’s premier indoor farmers’ market.</p>
                    <?php echo do_shortcode('[mc4wp_form id="839"]'); ?>                    
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h4 class="text-uppercase">We Are Open</h4>
                    <ul class="open-time">
                        <li>
                            <span>Friday:</span> 10am - 4pm
                        </li>
                        <li>
                            <span>Saturday:</span> 9am - 4pm
                        </li>
                        <li>
                            <span>Sunday:</span> 10am - 4pm
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <a href="javascript:void(0);">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.svg" alt="ftr-logo" class="ftr-logo" />
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="ftr-links">
                        <li>
                            <a href="https://bountiful.valontech.com/contact-us/">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://bountiful.valontech.com/vendors/">Vendors</a>
                        </li>
                        <li>
                            <a href="https://bountiful.valontech.com/faq/">FAQ</a>
                        </li>
                        <li>
                            <a href="https://bountiful.valontech.com/contests-and-events/">Contests &amp; Events</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 colophon">
                    <a href="tel:(780) 818-3878" class="nmbr">(780) 818-3878</a> <span>&#x2022;</span> <address>3696 97 Street Edmonton, AB T6E 5S8 </address> <span>&#x2022;</span> office@bountifulmarkets.com
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END  -->

<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<?php
global $wp;
$faq_url = home_url( $wp->request );
if ($faq_url != "https://bountiful.valontech.com/faqs") {  ?>
 <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script> 
 <?php
} ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-select.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">



function backfunc(){
window.location.href = "https://bountiful.valontech.com/shop/";
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


<!-- <div id="yith-wcwl-popup-message" style="display:none;"><div id="yith-wcwl-message"></div></div> -->
</body>
</html>