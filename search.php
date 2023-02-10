<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */
get_header();
?>

<section id="primary" class="content-area col-md-9">
    <div class="container">
    <div id="content" class="site-content" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dokan-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
             <div class="search-row">
            <?php while (have_posts()) : the_post(); ?>
               
               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    

                   <div class="search-product-inner">
                    <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"> 
                  <?php  $product = wc_get_product(get_the_ID());
                        $regular_price =  $product->get_regular_price();
                        $sale_price = $product->get_sale_price();
                        $product_price = $product->get_price();
                        $currency_symbol = get_woocommerce_currency_symbol();


                        

                   ?>


    <div class="entry-meta">
        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

            <i class="icon-calendar"></i>
            <?php dokan_posted_on(); ?>
            <span class="sep"> | </span>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'dokan-theme' ) );
            if ( $categories_list ) :
                ?>
                <span class="cat-links">
                    <i class="icon-folder-open"></i>
                    <?php printf( __( '%1$s', 'dokan-theme' ), $categories_list ); ?>
                </span>
            <?php endif; // End if categories ?>

            <?php if ( !post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="sep"> | </span>
                <span class="comments-link"><i class="icon-comment-alt"></i> <?php comments_popup_link( __( 'Leave a comment', 'dokan-theme' ), __( '1 Comment', 'dokan-theme' ), __( '% Comments', 'dokan-theme' ) ); ?></span>
            <?php endif; ?>

            <?php edit_post_link( __( 'Edit', 'dokan-theme' ), '<span class="sep"> | </span><span class="edit-link"><i class="icon-edit"></i> ', '</span>' ); ?>

        <?php endif; // End if 'post' == get_post_type() ?>
    </div><!-- .entry-meta -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <header class="entry-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'dokan-theme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            </header><!-- .entry-header -->
            <?php //the_excerpt(); ?>
           
        </div>
    </a>
         <span class="search-pro-price">
            <?php echo "".$currency_symbol."".$regular_price.""; ?>
        </span>
    <!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'dokan-theme' ) ); ?>
            <?php wp_link_pages( array('before' => '<div class="page-links">' . __( 'Pages:', 'dokan-theme' ), 'after' => '</div>') ); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

            <?php endwhile; ?>
</div>
            <?php dokan_content_nav( 'nav-below' ); ?>

        <?php else : ?>

            <?php get_template_part( 'no-results', 'search' ); ?>

        <?php endif; ?>

    </div><!-- #content .site-content -->
    </div>
</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>