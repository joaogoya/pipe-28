<?php
/* Template Name: FAQ */
get_header(); 
?>

<section class="faq-section py-5">
    <div class="container">

        <!-- Cabeçalho da Página -->
        <div class="title-elaborado-center mb-5">
            <span class="subtitle-tag d-block text-center">Tire Suas Dúvidas</span>
            <h2 class="display-5 fw-bold text-center">
                Perguntas <b>Frequentes</b>
            </h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="accordion accordion-custom" id="faqAccordion">

                    <?php
                    $args = array(
                        'post_type'      => 'faq',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC'
                    );

                    $faq_query = new WP_Query($args);
                    $counter = 0;

                    if ($faq_query->have_posts()) :
                        while ($faq_query->have_posts()) : $faq_query->the_post();
                            $counter++;
                            $item_id = 'faq-item-' . $counter;
                            $collapse_id = 'faq-collapse-' . $counter;
                            $video_oembed = get_field('video_oembed'); // Campo ACF Oembed do Vídeo
                    ?>

                    <div class="accordion-item mb-3">
                        <!-- Título / Pergunta -->
                        <h2 class="accordion-header" id="<?php echo esc_attr($item_id); ?>">
                            <button class="accordion-button <?php echo ($counter !== 1) ? 'collapsed' : ''; ?>" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#<?php echo esc_attr($collapse_id); ?>" 
                                    aria-expanded="<?php echo ($counter === 1) ? 'true' : 'false'; ?>" 
                                    aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                <span><?php the_title(); ?></span>
                            </button>
                        </h2>

                        <!-- Conteúdo / Resposta (Expansível) -->
                        <div id="<?php echo esc_attr($collapse_id); ?>" 
                             class="accordion-collapse collapse <?php echo ($counter === 1) ? 'show' : ''; ?>" 
                             aria-labelledby="<?php echo esc_attr($item_id); ?>" 
                             data-bs-parent="#faqAccordion">
                            
                            <div class="accordion-body p-4">
                                <div class="row align-items-center g-4">
                                    
                                    <!-- Esquerda: Texto da Resposta -->
                                    <div class="<?php echo !empty($video_oembed) ? 'col-lg-6 col-12' : 'col-12'; ?>">
                                        <div class="faq-content-text">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>

                                    <!-- Direita: Vídeo oEmbed (Condicional) -->
                                    <?php if (!empty($video_oembed)): ?>
                                    <div class="col-lg-6 col-12">
                                        <div class="faq-video-wrapper ratio ratio-16x9">
                                            <?php echo $video_oembed; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>