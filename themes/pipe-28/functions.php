<?php

function carregar_recursos_bootstrap() {
    // CSS do Bootstrap 5
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // JS do Bootstrap 5 (inclui Popper.js)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
}
add_action('wp_enqueue_scripts', 'carregar_recursos_bootstrap');

function tema_setup() {
    // Suporte ao título dinâmico na aba do navegador
    add_theme_support('title-tag');
    // Suporte a imagem destacada nos posts
    add_theme_support('post-thumbnails');
    // Registro do menu principal
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'meu-tema-bs5'),
    ));
}
add_action('after_setup_theme', 'tema_setup');