<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="icon"
        href="<?php bloginfo('template_url'); ?>/assets/images/logo.png"
        type="image/png">

    <?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>> 
<?php wp_body_open(); ?> 

<!-- <header> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav ms-auto',
                    'fallback_cb'    => '__return_false',
                ));
                ?>
            </div>
        </div>
    </nav>
</header> -->


    <header id="masthead" class="site-header">
        <?php get_template_part('includes/navigation/topbar'); ?>
        <?php get_template_part('includes/navigation/navbar'); ?>
        <?php get_template_part('includes/navigation/navbarfixed'); ?>
    </header>