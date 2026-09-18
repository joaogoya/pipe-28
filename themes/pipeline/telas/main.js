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

    // 2. BOTÃO VOLTAR AO TOPO
    const btnTop = document.getElementById("btnScrollTop");

    window.onscroll = () => {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            btnTop.style.display = "block";
        } else {
            btnTop.style.display = "none";
        }
    };

    btnTop.onclick = () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };
});