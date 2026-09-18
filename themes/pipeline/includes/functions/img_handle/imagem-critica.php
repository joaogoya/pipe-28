<?php
/*******************************************************/
/********************* IMG CRITICA *********************/
/*******************************************************/

/*
Primeira função principal - Antes da dobra (Hero) - REMOVIDO size_to_serve
*/
function pipe_get_img_hero($id, $is_thumb, $class)
{
    $img_id = $is_thumb ? get_post_thumbnail_id($id) : $id;
    if (!$img_id) return '';

    $attachment = get_post($img_id);
    if (!$attachment) return '';

    // Passamos 'full' nativo para garantir que o srcset traga todas as mídias disponíveis do arquivo original
    $img_srcset = wp_get_attachment_image_srcset($img_id, 'hero');

    //aqui estao as duas funcoes que eu copiei
    $img_url = wp_get_attachment_image_url($img_id, 'hero');
    // $img_url = str_replace(['.jpg', '.jpeg', '.png'], ['.jpg.webp', '.jpeg.webp', '.png.webp'], $img_url);
    // $img_srcset = str_replace(['.jpg', '.jpeg', '.png'], ['.jpg.webp', '.jpeg.webp', '.png.webp'], $img_srcset);
    
    // Dimensões originais da imagem mãe para travar o aspect-ratio perfeito
    $dimensions = pipe_img_new_size($img_id, 'hero');

$image = '<img loading="eager" fetchpriority="high" decoding="async" class="' . esc_attr($class) . '" ';
    $image .= 'width="' . $dimensions['width'] . '" height="' . $dimensions['height'] . '" ';
    $image .= 'src="' . esc_url($img_url) . '" srcset="' . esc_attr($img_srcset) . '" ';
    $image .= 'alt="' . esc_attr(get_post_meta($img_id, '_wp_attachment_image_alt', true)) . '" ';
    $image .= 'title="' . esc_attr($attachment->post_title) . '" ';
    $image .= 'sizes="(max-width: 480px) 150px, (max-width: 768px) 600px, 100vw">';

    return $image;
}


function pipe_render_hero_preload($img_id) 
{
    if (!$img_id) return '';
    $attachment = get_post($img_id);
    if (!$attachment) return '';

    // Pega os dados com base no tamanho 'hero' (igual ao do HTML do seu tema)
    $img_url = wp_get_attachment_image_url($img_id, 'large');
    $img_srcset = wp_get_attachment_image_srcset($img_id, 'large');

    if (!$img_url) return '';

    // Força o WebP para bater com o EWWW
    $img_url = str_replace(['.jpg','.jpeg','.png'], ['.jpg.webp','.jpeg.webp','.png.webp'], $img_url);
    $img_srcset = str_replace(['.jpg','.jpeg','.png'], ['.jpg.webp','.jpeg.webp','.png.webp'], $img_srcset);

    $preload_tag = sprintf(
        '<link rel="preload" as="image" href="%s" imagesrcset="%s" imagesizes="(max-width: 480px) 150px, (max-width: 768px) 768px, 100vw" type="image/webp" fetchpriority="high">' . "\n",
        esc_url($img_url),
        esc_attr($img_srcset)
    );

    return $preload_tag;
}
