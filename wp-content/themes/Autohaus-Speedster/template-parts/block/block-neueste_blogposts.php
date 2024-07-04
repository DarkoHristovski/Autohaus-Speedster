<?php
$title = get_sub_field("title");
?>

<section id="posts" class="latest-blog-post-section">
    <div class="title">
        <h2><?php echo $title ?></h2>
    </div>
    <div class="page-wrapper">
        <div class="container">
            <div class="d-flex">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_per_page' => 3,
                    'orderby'   => 'date',
                    'order'  => 'DESC'
                );

                $query = new WP_Query($args);
                while ($query->have_posts()) :
                    $query->the_post(); ?>
                    <?php if (has_post_thumbnail()) :; ?>
                        <div class="card d-flex direction-column">
                            <div class="img-wrapper">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="card-text d-flex direction-column">
                                <div class="d-flex">
                                    <h3><?php the_title(); ?></h3>
                                    <p class="date"><?php echo get_the_date(); ?></p>
                                </div>
                                <?php the_excerpt(); ?>
                                <a class="btn" href="<?php the_permalink(); ?>">Mehr erfahren</a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>