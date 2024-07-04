<?php
$background_img = get_sub_field('background-img');
$text = get_sub_field('text');
$link = get_sub_field('link');
?>

<?php if ($background_img) : ?>
    <section class="hero-section background-img" style="background-image:url(<?php echo $background_img['url']; ?>);">
        <div class="page-wrapper">
            <div class="container">
                <div class="hero-section-text d-flex">
                    <?php if ($text) : ?>
                        <div class="text">
                            <?php echo $text; ?>
                        </div>
                        <a class="btn" target="_blank" href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>