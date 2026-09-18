<?php
/**
 * Segurança e Estabilidade
 */

// 1. Esconde a versão do WP no <head> HTML
remove_action('wp_head', 'wp_generator');

// 2. Desativa cabeçalhos HTTP e links de Pingback / XML-RPC
add_action('init', function() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'pingback_url');
});

add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});

// 3. Remove histórico de revisões de banco de dados
add_filter('wp_revisions_to_keep', '__return_zero');

// 4. Trava expiração do login em 45 minutos (2700s)
add_filter('auth_cookie_expiration', function($expiration, $user_id, $remember) {
    return 45 * MINUTE_IN_SECONDS;
}, 10, 3);

// 5. Bloqueia endpoints de usuários na REST API para não-administradores
add_filter('rest_endpoints', function($endpoints) {
    if (!current_user_can('manage_options')) {
        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }
        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    }
    return $endpoints;
});

// 6. Desativa Feeds RSS/Atom e redireciona para a Home
function disable_all_feeds() {
    wp_redirect(home_url('/'), 301);
    exit;
}

add_action('do_feed',               'disable_all_feeds', 1);
add_action('do_feed_rdf',           'disable_all_feeds', 1);
add_action('do_feed_rss',           'disable_all_feeds', 1);
add_action('do_feed_rss2',          'disable_all_feeds', 1);
add_action('do_feed_atom',         'disable_all_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_all_feeds', 1);
add_action('do_feed_atom_comments', 'disable_all_feeds', 1);

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);


// Oculta erros de banco de dados diretamente na classe $wpdb
add_action('init', function() {
    global $wpdb;
    if (isset($wpdb) && is_object($wpdb)) {
        $wpdb->hide_errors();
    }
});