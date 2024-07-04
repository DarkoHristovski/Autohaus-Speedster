
<?php get_header(); ?>
<section class="single-blog">
    <div class="page-wrapper">
        <div class="container">
            <div>
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content d-flex">
                            <div class="img-wrapper">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('large'); // Use 'large' or any other size you prefer
                                }
                                ?>
                            </div>
                            <div class="single-post-text">
                                <?php
                                the_title('<h1 class="entry-title">', '</h1>');
                                the_content();
                                ?>
                            </div>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
