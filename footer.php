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

     <!-- FOOTER START  -->
     <footer>
        <div class="container">
            <div class="row justify-content-center contact-form">
                <?php 
                    if(is_page('home')) { ?>
                        <div class="col-10 col-md-7 form-wrapper">
                            <p>Sign up to stay up-to-date on what’s going on at Edmonton’s premier indoor farmers’ market.</p>                                        
                    <?php }
                    else { ?>
                        <div class="col-md-9 form-wrapper">
                            <p>Newsletter signup</p>                                        
                    <?php }
                    echo do_shortcode('[mc4wp_form id="839"]'); ?>                    
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 col-md-4 order-sm-1">
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
                <div class="col-sm-10 col-md-4 order-sm-3 order-md-2">
                    <a href="javascript:void(0);">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.svg" alt="ftr-logo" class="ftr-logo" />
                    </a>
                </div>
                <div class="col-sm-5 col-md-4 order-sm-2 order-md-3">
                    <ul class="ftr-links">
                        <li>
                            <a href="https://bountiful2022.test/contact-us/">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/vendors/">Vendors</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/faq/">FAQ</a>
                        </li>
                        <li>
                            <a href="https://bountiful2022.test/contests-and-events/">Contests &amp; Events</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 order-sm-4 colophon">
                    <a href="tel:(780) 818-3878" class="nmbr">(780) 818-3878</a> <span>&#x2022;</span> <address>3696 97 Street Edmonton, AB T6E 5S8 </address> <span>&#x2022;</span> office@bountifulmarkets.com
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END  -->

<?php wp_footer(); ?>



<!-- <div id="yith-wcwl-popup-message" style="display:none;"><div id="yith-wcwl-message"></div></div> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

</body>
</html>

<?php 
    if(is_page('vendors')) { ?>

    <script>

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // This one filters the vendors listing
        function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("mylist");
        filter = input.value.toUpperCase();
            if (filter != "ALPHABETICAL") {
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
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


    //This one filters from the category listing below the map
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
                td = tr[i].getElementsByTagName("td")[2];
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

<?php } ?>