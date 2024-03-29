<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header --><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array('before' => '<div class="page-links">' . __( 'Pages:', 'dokan-theme' ), 'after' => '</div>') ); ?>
        <?php edit_post_link( __( 'Edit', 'dokan-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
