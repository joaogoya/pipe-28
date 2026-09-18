<section id="contato" class="section-padding py-5 bg-white">
    <div class="container">
        <div class="row g-5 align-items-stretch">

            <!-- LADO ESQUERDO: MAPA + CONTEXTO LOCAL -->
            <div class="col-lg-6 d-flex flex-column justify-content-between">
                <div class="title-elaborado-col mb-4">
                    <span class="subtitle-tag">Presença Local</span>
                    <h2 class="fw-bold">Sua marca no <span class="text-accent"> mapa dos clientes.</span></h2>
                    <p class="text-muted mt-2">Atendemos Porto Alegre e região metropolitana com estratégias focadas em
                        dominância de busca local.</p>
                </div>

                <!-- Container do Mapa -->
                <div class="map-wrapper rounded-5  overflow-hidden position-relative flex-grow-1 min-h-300">
                    <!-- Container do Bloco de Mapa e Ações -->
                    <div class="map-container-wrapper p-3 bg-light rounded border shadow-sm">

                        <!-- 1. Iframe Principal (O seu iframe que já carrega o local) -->
                        <div class="ratio ratio-16x9 mb-3">
                            <iframe id="gpe-main-map"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.540007325411!2d-51.2042333!3d-30.078717200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951983cabb890869%3A0xa58298ab1666f00d!2sPipeline%20Digital!5e0!3m2!1spt-BR!2sbr!4v1786453297375!5m2!1spt-BR!2sbr"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin">
                            </iframe>
                        </div>

                        <!-- 2. Botões de Ação (Rotas e Comodidades) -->
                        <div class="row g-2">

                            <!-- Botão de Traçar Rota -->
                            <div class="col-12 col-md-4">
                                <button id="btn-tracar-rota" class="btn btn-primary w-100 fw-bold">
                                    Traçar Rota
                                </button>
                            </div>

                            <!-- Botões de Comodidades Próximas -->
                            <div class="col-6 col-md-4">
                                <button class="btn btn-outline-secondary w-100 btn-comodidade"
                                    data-busca="estacionamento">
                                    🅿️ Estacionamentos
                                </button>
                            </div>

                            <div class="col-6 col-md-4">
                                <button class="btn btn-outline-secondary w-100 btn-comodidade"
                                    data-busca="transporte publico">
                                    🚌 Paradas / Ônibus
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- 3. Script para disparar as URLs do Google Maps -->
                    <script>
                    document.addEventListener("DOMContentLoaded", function() {

                        // Dados fixos da sua empresa baseados no seu iframe do GPE
                        const placeName = encodeURIComponent("Pipeline Digital");
                        const latLng = "-30.0787172,-51.2042333";

                        // 1. AÇÃO DO BOTÃO "TRAÇAR ROTA"
                        // Pega a localização atual do usuário (se permitido) ou abre o Maps pedindo a origem
                        const btnRota = document.getElementById("btn-tracar-rota");
                        if (btnRota) {
                            btnRota.addEventListener("click", function() {
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(
                                        function(position) {
                                            // Sucesso: rota do ponto do usuário até a empresa
                                            const userLat = position.coords.latitude;
                                            const userLng = position.coords.longitude;
                                            const urlRota =
                                                `https://www.google.com/maps/dir/?api=1&origin=${userLat},${userLng}&destination=${placeName}&destination_place_id=0x951983cabb890869:0xa58298ab1666f00d`;
                                            window.open(urlRota, '_blank');
                                        },
                                        function() {
                                            // Fallback caso a localização do browser esteja desativada
                                            const urlFallback =
                                                `https://www.google.com/maps/dir/?api=1&destination=${placeName}&destination_place_id=0x951983cabb890869:0xa58298ab1666f00d`;
                                            window.open(urlFallback, '_blank');
                                        }
                                    );
                                } else {
                                    const urlFallback =
                                        `https://www.google.com/maps/dir/?api=1&destination=${placeName}`;
                                    window.open(urlFallback, '_blank');
                                }
                            });
                        }

                        // 2. AÇÃO DOS BOTÕES DE COMODIDADES
                        // Abre o Google Maps com uma busca focada no raio da sua coordenada
                        const btnsComodidade = document.querySelectorAll(".btn-comodidade");
                        btnsComodidade.forEach(function(btn) {
                            btn.addEventListener("click", function() {
                                const termoBusca = encodeURIComponent(this.getAttribute(
                                    "data-busca"));
                                // Busca serviços próximos ao ponto central do seu negócio
                                const urlComodidade =
                                    `https://www.google.com/maps/search/${termoBusca}/@${latLng},16z`;
                                window.open(urlComodidade, '_blank');
                            });
                        });

                    });
                    </script>

                    <!-- Badge flutuante sobre o mapa -->
                    <!-- <div
                        class="map-badge position-absolute bottom-0 start-0 m-3 p-3 rounded-4 bg-white shadow-lg d-flex align-items-center gap-3">
                        <div
                            class="icon-circle bg-accent-soft text-accent rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <small class="d-block text-muted fw-bold text-uppercase"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Atendimento Presencial &
                                Online</small>
                            <strong class="text-dark" style="font-size: 0.9rem;">Porto Alegre, RS e Região</strong>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- LADO DIREITO: CTA PREMIUM COM ESTRUTURA NAP -->
            <div class="col-lg-6">
                <div
                    class="cta-box-premium p-4 p-md-5 rounded-5 shadow-2 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-accent-soft text-accent px-3 py-2 rounded-pill fw-bold mb-3"
                            style="font-size: 0.8rem;">
                            <i class="fas fa-bolt me-1"></i> RESPOSTA RÁPIDA
                        </span>
                        <h3 class="display-6 fw-bold mb-3">Pronto para vender mais<span class="text-accent"> todos os
                                dias? </span></h3>
                        <p class="mb-4 opacity-75">Não deixe o seu pipeline de oportunidades secar. Vamos colocar o seu
                            negócio no radar de quem realmente quer comprar.</p>

                        <!-- BLOCO NAP (Name, Address, Phone) -->
                        <div class="nap-container mb-4 p-3 rounded-4 bg-white-10 border border-white-10">
                            <!-- Name -->
                            <div class="nap-item d-flex align-items-center gap-3 mb-3">
                                <div class="nap-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-building text-accent"></i>
                                </div>
                                <div>
                                    <small class="d-block opacity-50 text-uppercase"
                                        style="font-size: 0.65rem; letter-spacing: 0.5px;">Seu Trabalho no Pipeline das
                                        Oportunidades</small>
                                    <strong class="fs-6">Pipeline Digital - Gestão de Tráfego</strong>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="nap-item d-flex align-items-center gap-3 mb-3">
                                <div class="nap-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-location-dot text-accent"></i>
                                </div>
                                <div>
                                    <small class="d-block opacity-50 text-uppercase"
                                        style="font-size: 0.65rem; letter-spacing: 0.5px;">Localização &
                                        Cobertura</small>
                                    <strong class="fs-6">R. Prof. Carvalho de Freitas - Cascata, Porto Alegre - RS, 91720-090 </strong>
                                    <small class="d-block opacity-50 text-uppercase"
                                        style="font-size: 0.65rem; letter-spacing: 0.5px;">Atendimento em todo o Brasil</small>
                                </div>
                            </div>

                            <!-- Phone/WhatsApp -->
                            <div class="nap-item d-flex align-items-center gap-3">
                                <div class="nap-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fab fa-whatsapp text-accent fs-5"></i>
                                </div>
                                <div>
                                    <small class="d-block opacity-50 text-uppercase"
                                        style="font-size: 0.65rem; letter-spacing: 0.5px;">Fale Conosco</small>
                                    <strong class="fs-6">(51) 99896-2624</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão de Ação Principal -->
                    <a href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank"
                        class="btn-pipeline-main w-100 text-center py-3 rounded-4 fw-bold text-decoration-none d-block mt-2"
                        data-analytics="cta-click-whatsapp">
                        QUERO VENDER MAIS <i class="fab fa-whatsapp ms-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>