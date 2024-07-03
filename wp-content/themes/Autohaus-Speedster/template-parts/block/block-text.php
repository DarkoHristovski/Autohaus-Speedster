<?php
// $title = get_sub_field('title');
// $subtitle = get_sub_field('subtitle');
$text = get_sub_field('text');
if($text != ''){
?>
<section class="block-text section module">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-9 offset-lg-2">
                    <div class="text-box">
                         <?php echo $text;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>

