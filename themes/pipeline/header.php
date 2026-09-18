<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
        href="<?php bloginfo('template_url'); ?>/assets/images/logo.png"
        type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Space+Grotesk:wght@700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Preload da Imagem do Hero (LCP) -->
    <?php
    if (is_front_page()) {
        $hero_preload_id = get_afc_by_page_slug('imagem_do_hero', 'home_config', 'hero');
        echo pipe_render_hero_preload($hero_preload_id);
    }
    ?>
    <!-- FIM Preload da Imagem do Hero (LCP) -->

    <?php wp_head(); ?>
</head>

<body id="home">

    <!-- Site Loader Overlay
    <div id="site-loader" class="loader-overlay">
        <div class="loader-content text-center">
            <!-- Spinner Bootstrap Customizado --
            <div class="spinner-border custom-spinner mb-3" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
            <!-- Texto Opcional de Carregamento --
            <p class="loader-text mb-0 fw-semibold">Carregando...</p>
        </div>
    </div> -->

    <header id="masthead" class="site-header">
        <?php get_template_part('includes/navigation/topbar'); ?>
        <?php get_template_part('includes/navigation/navbar'); ?>
        <?php get_template_part('includes/navigation/navbarfixed'); ?>
    </header>


















































    <main id="home">