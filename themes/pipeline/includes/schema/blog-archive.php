<?php
/**
 * Schema hardcoded para teste na Listagem Geral (Feed Misto)
 */
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "Blog & Central de Conteúdo - Pulso Comercial",
  "description": "Artigos, casos reais, vídeos e tendências sobre tráfego pago, SEO e vendas locais.",
  "mainEntity": {
    "@type": "ItemList",
    "name": "Feed de Publicações",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "item": {
          "@type": "BlogPosting",
          "name": "Resultados de Agosto: +40% de Chamadas no WhatsApp",
          "description": "Post da categoria Resultados (Marmita) com gráficos e análise."
        }
      },
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@type": "VideoObject",
          "name": "Como Configurar o Pixel no WP em 5 Minutos",
          "description": "Post da categoria Vídeos com embed do YouTube.",
          "thumbnailUrl": "https://img.youtube.com/vi/ID_DO_VIDEO/maxresdefault.jpg"
        }
      },
      {
        "@type": "ListItem",
        "position": 3,
        "item": {
          "@type": "CreativeWork",
          "name": "Case de Reformulação Visual e Tráfego para Clínica",
          "description": "Post da taxonomia Projetos apresentando o case completo."
        }
      }
    ]
  }
}
</script>