document.addEventListener('DOMContentLoaded', () => {

    // 1. DATA ANALYTICS TRACKER (O JS que você pediu)
    const trackedElements = document.querySelectorAll('[data-analytics]');

    trackedElements.forEach(el => {
        el.addEventListener('click', () => {
            const eventID = el.getAttribute('data-analytics');

            // Envia para o GA4 se o gtag estiver presente
            if (typeof gtag === 'function') {
                gtag('event', 'click', {
                    'event_category': 'Engagement',
                    'event_label': eventID
                });
            }

            // Log para debug (você pode remover depois)
            console.log(`Pipeline Analytics: Click em ${eventID}`);
        });
    });

    //comportamento do bt scroll to top e do navbar fixed
    let ultimoScroll = 0;
    const navFixed = document.getElementById("navbarfixed");
    const btnTop = document.getElementById("btnScrollTop");

    window.addEventListener('scroll', () => {
        const scrollAtual = window.scrollY || document.documentElement.scrollTop;

        // 1. LÓGICA DA NAVBAR (Dispara após 250px)
        if (scrollAtual > 250) {
            if (scrollAtual < ultimoScroll) {
                // ROLANDO PRA CIMA
                navFixed.classList.add("nav-visible");
            } else {
                // ROLANDO PRA BAIXO
                navFixed.classList.remove("nav-visible");
            }
        } else {
            navFixed.classList.remove("nav-visible");
        }

        // 2. LÓGICA DO BOTÃO TOP (Dispara após 500px, também só quando rola pra cima)
        if (btnTop) {
            if (scrollAtual > 500 && scrollAtual < ultimoScroll) {
                btnTop.classList.add("btn-visible");
            } else {
                btnTop.classList.remove("btn-visible");
            }
        }

        // Atualiza a posição para o próximo evento
        ultimoScroll = scrollAtual;
    }, { passive: true });

    // AÇÃO DE CLIQUE
    if (btnTop) {
        btnTop.onclick = () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    }



    window.addEventListener('load', function () {
        const loader = document.getElementById('site-loader');
        if (loader) {
            // Aplica o efeito suave de fade out
            loader.classList.add('fade-out');

            // Remove o elemento do DOM após a transição para liberar memória
            setTimeout(() => {
                loader.remove();
            }, 400);
        }
    });

});