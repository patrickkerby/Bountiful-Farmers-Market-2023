<?php 

/* Template Name: Events Home Page */

get_header();

  $heading_image = get_field("header_image", 'option');
    $title = get_field("title", 'option');
    $subtitle = get_field("subtitle", 'option');

    if (is_null($title)) {
        $title = get_the_title();
    }

 ?>

    <!-- PAGE START  -->
    <div class="container-fluid heading">        
        <div class="row justify-content-center" style="background-image: linear-gradient(174deg, rgba(27,48,46,0.62) 0%, rgba(43,77,74,0.62) 100%), url('<?php echo $heading_image['url'] ?>'); background-size: cover;">
            <h1><?php echo $title; ?></h1>

            <?php if ($subtitle) { ?>
                <div class="col-sm-9 intro">
                    <h2><?php echo $subtitle; ?></h2>
                </div>
            <?php } ?>
        </div>        
        <div class="row weeklyevents">
          <?php 
            $rows = get_field('weekly_events', 'option');
            if( $rows ) {
                echo '<h2>Weekly Events</h2>';
                foreach( $rows as $row ) {
                    $title = $row['title'];
                    $desc = $row['weekly_event_description'];
                    echo '<div class="col-sm-4">';
                    echo '<h3>'.$title.'</h3>';
                    echo '<p>'.$desc.'</p>';
                    echo '</div>';
                }
            }
          ?>
        </div>
    </div>

<main id="tribe-events-pg-template" class="tribe-events-pg-template">

<div id="primary" class="content-area col-md-12">
    <div id="content" class="site-content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part( 'content', 'page' ); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
                comments_template( '', true );
            ?>

        <?php endwhile; // end of the loop. ?>

        <?php 
            $rows = get_field('gallery', 'option');
            if( $rows ) {
                echo '<h2>Past Events</h2>';
                echo '<div class="gallery">';
                $i = 0;
                foreach( $rows as $row ) {
                    // var_dump($row);
                    echo '<div class="grid-item"><a data-bs-toggle="modal" href="" data-bs-target="#exampleModal'.$i.'"><img src="'.$row['url'].'" alt="'.$row['alt'].'" /></a>';
                    ?>
                    
                    <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img src="<?php echo $row['url']; ?>" />
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                    <?php
                    $i++;
                }
                echo '</div>';
            }
          ?>
    </div><!-- #content .site-content -->

</div><!-- #primary .content-area -->

<?php get_footer(); ?>