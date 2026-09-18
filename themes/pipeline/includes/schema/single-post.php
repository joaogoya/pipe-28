<?php
/**
 * Schema JSON-LD do Post Individual (Single Post)
 * Arquivo: inc/schema/schema-single-post.php
 */

// Evita acesso direto ao arquivo por segurança
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Variáveis com Funções Nativas do WordPress
$post_id          = get_the_ID();
$author_id        = get_post_field( 'post_author', $post_id );
$post_permalink   = get_permalink();
$site_url         = home_url( '/' );
$featured_img_url = get_the_post_thumbnail_url( $post_id, 'full' );

// 2. Montagem da Estrutura do Grafo
$schema_graph = array(
    '@context' => 'https://schema.org',
    '@graph'   => array(

        // Entidade Principal: O Artigo / Post
        array(
            '@type'            => 'BlogPosting',
            '@id'              => $post_permalink . '#article',
            'mainEntityOfPage' => $post_permalink,
            'headline'         => get_the_title(),
            'description'      => get_the_excerpt(),
            'datePublished'    => get_the_date( 'c', $post_id ),
            'dateModified'     => get_the_modified_date( 'c', $post_id ),
            'author'           => array(
                '@type' => 'Person',
                'name'  => get_the_author_meta( 'display_name', $author_id ),
            ),
            'publisher'        => array(
                '@id' => $site_url . '#organization',
            ),
            'image'            => $featured_img_url ? $featured_img_url : '',
        ),

    ),
);

// 3. Renderização do Script JSON-LD no HTML
?>
<script type="application/ld+json">
<?php echo json_encode( $schema_graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
</script>