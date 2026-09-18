<section id="sucesso-dos-clientes" class="section-padding py-5">
    <div class="container">

        <!-- CABEÇALHO DA SEÇÃO -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="title-elaborado-col">
                    <span class="subtitle-tag">Nossa melhor métrica é o</span>
                    <h2 class="display-5 fw-bold">Sucesso dos <span class="text-accent">Clientes.</span></h2>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mt-3 mt-lg-0">
                <p class="small text-muted mb-0">Transformando visibilidade em faturamento real para negócios locais.</p>
            </div>
        </div>

        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'projetos', // Nome/Slug da sua custom taxonomy
                    'operator' => 'EXISTS',   // Traz qualquer post que tenha ao menos um termo dessa taxonomy
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
        ?>

            <!-- ==========================================
                 1. LAYOUT DESKTOP (GRID MASONRY)
                 ========================================== -->
            <div class="portfolio-masonry d-none d-md-grid">
                <?php
                while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="portfolio-item item-medium">
                        <?php echo pipe_get_img(get_the_ID(), true, 'medium_large', 'img-fluid'); ?>

                        <div class="portfolio-overlay">
                            <div class="overlay-content">
                                <?php $primary_category = get_post_primary_category(get_the_ID()); ?>
                                <span class="client-category">
                                    <b>Cliente:</b> <?php echo isset($primary_category->name) ? $primary_category->name : ''; ?>
                                </span>
                                <h4 class="fw-bold"><?php the_title(); ?></h4>
                                <a href="<?php the_permalink(); ?>" class="btn-case-detail" data-analytics="portfolio-click-alexandre">
                                    Ver Case <i class="fas fa-external-link-alt ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>

            <!-- ==========================================
                 2. LAYOUT MOBILE (CAROUSEL BOOTSTRAP 5)
                 ========================================== -->
            <?php $query->rewind_posts(); ?>

            <div id="portfolioCarouselMobile" class="carousel slide d-block d-md-none" data-bs-ride="carousel">

                <!-- Indicadores (Bolinhas) -->
                <div class="carousel-indicators">
                    <?php
                    $slide_index = 0;
                    while ($query->have_posts()) : $query->the_post();
                    ?>
                        <button type="button" data-bs-target="#portfolioCarouselMobile" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo ($slide_index === 0) ? 'active' : ''; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
                    <?php
                        $slide_index++;
                    endwhile;
                    $query->rewind_posts();
                    ?>
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <?php
                    $is_first = true;
                    while ($query->have_posts()) : $query->the_post();
                    ?>
                        <div class="carousel-item <?php echo $is_first ? 'active' : ''; ?>">
                            <div class="portfolio-item mobile-portrait">
                                <?php echo pipe_get_img(get_the_ID(), true, 'medium', 'img-fluid'); ?>

                                <div class="portfolio-overlay">
                                    <div class="overlay-content">
                                        <?php $primary_category = get_post_primary_category(get_the_ID()); ?>
                                        <span class="client-category">
                                            <b>Cliente:</b> <?php echo isset($primary_category->name) ? $primary_category->name : ''; ?>
                                        </span>
                                        <h4 class="fw-bold"><?php the_title(); ?></h4>
                                        <a href="<?php the_permalink(); ?>" class="btn-case-detail" data-analytics="portfolio-click-alexandre">
                                            Ver Case <i class="fas fa-external-link-alt ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $is_first = false;
                    endwhile;
                    ?>
                </div>

                <!-- Controles Ant / Prox -->
                <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarouselMobile" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarouselMobile" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

        <?php
            wp_reset_postdata();
        else:
            echo 'Nenhum post encontrado.';
        endif;
        ?>

        <!-- BOTÃO VEJA TODOS OS CASES -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                   <?php
                        $cases_url = home_url('/sucesso-dos-clientes//');
                        ?>
                <a href="<?php echo esc_url($cases_url); ?>" class="btn btn-outline-light btn-cta-block px-4 py-3 btn-see-all">
                    Veja todos os cases <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

    </div>
</section>