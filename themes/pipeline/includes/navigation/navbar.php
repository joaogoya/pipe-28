<!-- NAVBAR --> 
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">

            <!-- navbar-brand -->
            <a class="navbar-brand fw-bold" href="<?php echo bloginfo('url'); ?>">PIPELINE DIGITAL</a>

            <!-- btn toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPipeline">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- menu -->
            <div class="collapse navbar-collapse" id="navbarPipeline">
                <ul class="navbar-nav ms-auto text-center gap-2 gap-lg-3 w-100 justify-content-end align-items-center">
                    <?php get_template_part('includes/navigation/loophome'); ?>
                    
                    <!-- cta -->
                    <li class="nav-item w-100-mobile mt-3 mt-lg-0 mb-2 mb-lg-0">
                        <a class="nav-link btn-nav-accent text-center mx-auto" href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>" target="_blank"
                            data-analytics="nav-click-orcamento">
                             <b> Solicitar Orçamento <i class="fas fa-arrow-right ms-2"></i></b>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>