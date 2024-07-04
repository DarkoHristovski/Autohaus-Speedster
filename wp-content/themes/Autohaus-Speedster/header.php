<?php

/**
 * Header file for essentry
 *
 * @subpackage wayv
 * @since 1.0.0
 */


?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />
    <?php wp_head(); ?>
    <script type="text/javascript">

    </script>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <header class="header">
        <div class="page-wrapper">
            <div class="container">
                <div class="navigation d-flex">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>">
                            Autohaus Speedster
                        </a>
                    </div>
                    <nav class="d-flex">
                        <?php
                        echo get_website_menu('Main');
                        ?>
                    </nav>
                </div>
                <div class="burger mobile-menu-button">
                    <span></span>
            </div>
            </div>
        </div>
    </header>