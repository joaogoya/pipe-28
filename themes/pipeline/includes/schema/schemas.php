<?php

function pd_injetar_dados_estruturados()
{

    // 1. HOME
    if (is_front_page()) {
        get_template_part('includes/schema/home'); //ok, sechema certo

        // 2. PÁGINAS FIXAS (Serviços e FAQ)
    } elseif (is_page('servicos')) {
        get_template_part('includes/schema/page-servicos'); //ok, schema certo
    } elseif (is_post_type_archive('faq')) {
        get_template_part('includes/schema/page-faq'); // ok, schema certo

        // 3. CPT CLIENTES
    } elseif (is_singular('clientes')) {
        get_template_part('includes/schema/single-cliente'); // nçao é para agora

    // 4. TAXONOMY PROJETOS (Cases em Posts)
    } elseif (is_tax('projetos')) {
        // LISTAGEM DO TERMO DA TAXONOMIA (/projetos/slug-do-termo/)
        get_template_part('includes/schema/archive-projetos'); // ok, schema certo

    } elseif (is_single() && has_term('', 'projetos')) {
        // SINGLE DO POST COM A TAXONOMIA PROJETOS
        get_template_part('includes/schema/single-projeto');// ok, schema certo

        // 5. CATEGORIA VÍDEOS
    } elseif (is_single() && has_category('videos')) {
        get_template_part('includes/schema/single-video');// ok, schema certo
    } elseif (is_category('videos')) {
        get_template_part('includes/schema/archive-videos');// ok, schema certo

        // 6. POSTS NORMAIS DO BLOG (Resultados, Tendências, Como Fazemos)
    } elseif (is_single() && get_post_type() === 'post') {
        get_template_part('includes/schema/single-post');// ok, schema certo

        // 7. LISTAGEM GLOBAL DO BLOG (Home do Blog / Categorias Normais / Tags)
    } elseif (is_home() || is_archive()) {
        get_template_part('includes/schema/blog-archive'); //ok, schema certo

        // 8. PÁGINA 404
    } elseif (is_404()) {
        get_template_part('includes/schema/404');// ok, schema certo
    }
}
add_action('wp_head', 'pd_injetar_dados_estruturados');
