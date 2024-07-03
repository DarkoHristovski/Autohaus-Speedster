<?php


?>

<section class="latest-blog-post-section">
    <div class="page-wrapper">
        <div class="container">
            <div class="d-flex">
                <?php
                $post_args = array(
                    'post_type' => 'post',
                    'post_per_page' => 3,
                    'orderby'   => 'date',
                    'order'  => 'DESC'
                );

                $post_query = new WP_Query($post_args);
                while ($post_query->have_posts()) :
                    $post_query->the_post();
                    if (has_post_thumbnail()) :
                ?>

                        <div class="card d-flex direction-column">
                            <div class="img-wrapper">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="card-text d-flex direction-column">
                               <div class="d-flex">
                               <h3><?php the_title(); ?></h3><p><?php echo get_the_date(); ?></p>
                               </div>
                                <?php the_excerpt(); ?>
                                <a class="btn" target="_blank" href="<?php the_permalink(); ?>">Mehr erfahren</a>
                            </div>
                        </div>

                <?php
                    endif;
                endwhile; ?>
            </div>
        </div>
    </div>
</section>