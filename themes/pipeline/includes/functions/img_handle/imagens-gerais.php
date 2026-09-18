<?php

/*******************************************************/
/******************* IMG ATRIBUTES *********************/
/*******************************************************/

    /*
        Escreve os atributos das imagens
            src, alt, title, altura, srcset, largura, ...
            Escrever isso tudo na tag img ajuda na performance e no SEO
            Essa função retorna toda a tag img

        São duas funções principais, praticamente iguais, que chamam funções utilitarias.
        A primeira função trata as imgs que sao carregadas antes da dobra e que tem 100% da largura da tela
            heros e bg dos titles e breadcrumbs das pgs single
        a segunda função trata as imagens que precisam ser carregadas depois da dobra e que tem sua largura limitada pela class container do bootstrap

        ambas, trabalham com os mesmos prametros.


        Sobre os parametros:
        $id
            Se for thumbnail vem o id do post
            se for acf ou galeria vem o id da img

        $is_thumb
            Se for thumbnail vem true
            Se não for thumb vem false

        $size_to_serve
            String com a largura que queremos servir a imagem
                thumbnail - 150
                medium - 300 
                medium_large - 768 
                large - 1024
                hero - 1920
                wide - 2560

        $class
            String de classes do html. O atributo class=""





/*
Apenas a criação de novos tamanhos para o ecossistema (usados nas listagens/thumbs)
*/
// Todos agora seguem rigorosamente a proporção 16:9
add_image_size('mobile_large', 600, 338, true); // true força o corte perfeito
add_image_size('hero', 1920, 1080, true);
add_image_size('wide', 2560, 1440, true);



/*
Função Geral - Depois da dobra (Thumbs, listagens, etc.) - Mantém o size dinâmico
*/
function pipe_get_img($id, $is_thumb, $size_to_serve, $class)
{
    $img_id = $is_thumb ? get_post_thumbnail_id($id) : $id;
    if (!$img_id) return '';

    $attachment = get_post($img_id);
    if (!$attachment) return '';

    $img_srcset = wp_get_attachment_image_srcset($img_id, $size_to_serve);
    $dimensions = pipe_img_new_size($img_id, $size_to_serve);

    $w = $dimensions['width'];

    $image = '
        <img
            loading="lazy"
            decoding="async"
            class="' . esc_attr($class) . '"
            width="' . $w . '"
            height="' . $dimensions['height'] . '"
            src="' . esc_url(wp_get_attachment_image_url($img_id, $size_to_serve)) . '"
            srcset="' . esc_attr($img_srcset) . '"
            alt="' . esc_attr(get_post_meta($img_id, '_wp_attachment_image_alt', true)) . '"
            title="' . esc_attr($attachment->post_title) . '"
            sizes="
                (max-width: 576px) ' . ($w < 600 ? $w : 300) . 'px,
                (max-width: 768px) ' . ($w < 768 ? $w : 768) . 'px,
                (max-width: 1024px) ' . ($w < 1024 ? $w : 1024) . 'px,
                ' . $w . 'px"
        >
    ';

    return $image;
}


/*******************************************************/
/**************** FUNÇÕES UTILITARIAS ******************/
/*******************************************************/

/*
Busca o tamanho REAL gerado pelo WP de forma super rápida
*/
function pipe_img_new_size($img_id, $size_to_serve)
{
    $meta = wp_get_attachment_metadata($img_id);
    $default = array('width' => 0, 'height' => 0);

    if (!$meta) {
        return $default;
    }

    if ($size_to_serve === 'hero' || !isset($meta['sizes'][$size_to_serve])) {
        return array(
            'width'  => $meta['width'] ?? 0,
            'height' => $meta['height'] ?? 0
        );
    }

    return array(
        'width'  => $meta['sizes'][$size_to_serve]['width'],
        'height' => $meta['sizes'][$size_to_serve]['height']
    );
}

