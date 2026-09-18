<!-- TOPBAR: Oculto no mobile (d-none), visível de tablets para cima (d-md-block) -->
    <div id="topbahome" class="topbar bg-dark text-white py-2 d-none d-md-block border-bottom border-secondary border-opacity-25">
        <div class="container">
            <div class="row align-items-center">

                <!-- Esquerda: Informações de Contato Local -->
                <div class="col-md-9">
                    <div class="d-flex flex-wrap gap-4 small opacity-75">

                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-home text-accent"></i>
                            <span>
                                <?php echo get_afc_by_page_slug('endereco', 'home_config', 'informacoes-de-contato'); ?>
                            </span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            <i class="fab fa-whatsapp text-accent"></i>
                            <strong>
                                <?php echo get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato'); ?>
                            </strong>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-clock text-accent"></i>
                            <span>
                                <?php echo get_afc_by_page_slug('horario_de_funcionamento', 'home_config', 'informacoes-de-contato'); ?>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- Direita: Redes Sociais -->
                <div class="col-md-3 text-end">
                    <div class="social-nav-top d-flex gap-2 justify-content-end">
                        
                        <a href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>" target="_blank" class="topbar-social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>   

                        <!-- <a href=""https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>" class="topbar-social-link" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a> -->   

                        <a href="<?php echo get_afc_by_page_slug('youtube', 'home_config', 'informacoes-de-contato'); ?>" target="_blank" class="topbar-social-link" title="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>

                        <a href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>" target="_blank" class="topbar-social-link" title="YouTube">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="<?php echo get_afc_by_page_slug('google', 'home_config', 'informacoes-de-contato'); ?>" target="_blank" class="topbar-social-link" title="YouTube">
                            <i class="fa-brands fa-google"></i>
                        </a>

                    </div>
                                        
                </div>

            </div>
        </div>
    </div>
