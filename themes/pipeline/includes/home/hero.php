<section class="hero-premium section-padding">
    <div class="container">
        <div class="row align-items-center">

            <!-- Coluna da esquerda: Textos (Centralizados no Mobile, Esquerda no Desktop) -->
            <div class="col-lg-6 hero-text-area text-center text-lg-start">

                <!-- subtitulo -->
                <h2 class="badge-premium d-inline-block">
                    <?php echo get_afc_by_page_slug('subtitulo_01_da_home', 'home_config', 'hero'); ?>
                </h2>

                <!-- titulo -->
                <h1 class="display-2 fw-bold main-title">
                    <?php echo get_afc_by_page_slug('titulo_do_hero', 'home_config', 'hero'); ?>
                </h1>

                  <h2 class="badge-premium d-inline-block">
                    <?php echo get_afc_by_page_slug('subtitulo_02_da_home', 'home_config', 'hero'); ?>
                </h2>

                <!-- frase -->
                <div class="hero-description mt-4 mx-auto mx-lg-0">
                    <?php echo get_afc_by_page_slug('frase_de_apoio', 'home_config', 'hero'); ?>
                </div>

                <!-- btn cta -->
                <div class="hero-actions mt-5"> 
                    <a href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>" target="_blank" class="btn-pipeline-main" data-analytics="hero-cta-principal">
                       Quero vender no Google <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

            </div>

            <!-- Segunda coluna: Escondida no Mobile, visível no Desk -->
            <div class="col-lg-6 mt-5 mt-lg-0 d-none d-lg-block">
                
                <!-- frame  - ::before dessa div -->
                <div class="hero-img-frame">

                    <!-- img -->
                    <?php
                        $hero_img_id = get_afc_by_page_slug('imagem_do_hero_da_home', 'home_config', 'hero');
                        echo pipe_get_img_hero($hero_img_id, false, 'img-fluid img-main-hero');
                    ?>

                    <!-- txt apoio -->
                    <div class="floating-card shadow-lg">
                        <i class="fas fa-bolt text-accent"></i>
                        <span>Mais clientes do digital para o local</span>
                    </div>

                </div> <!-- fim frame -->

            </div> <!-- fim segunda coluna -->
        </div>
    </div>
</section>