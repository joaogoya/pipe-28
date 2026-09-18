<?php
/**
 * Schema JSON-LD da Home (Front Page)
 */

// Evita acesso direto ao arquivo por segurança
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Variáveis com Funções Nativas do WordPress
$site_url  = home_url( '/' );
$site_name = get_bloginfo( 'name' );
$site_desc = get_bloginfo( 'description' );

// 2. Montagem da Estrutura do Grafo
$schema_graph = array(
    '@context' => 'https://schema.org',
    '@graph'   => array(

        // Entidade 1: A Empresa / Negócio Local
        array(
            '@type'           => array( 'LocalBusiness', 'ProfessionalService' ),
            '@id'             => $site_url . '#organization',
            'name'            => $site_name,
            'url'             => $site_url,
            'logo'            => $site_url . 'wp-content/uploads/logo.png', // Ajustar caminho final da imagem
            'image'           => $site_url . 'wp-content/uploads/og-image.jpg',
            'email'           => 'contato@pipeline-digital.com.br',
            'telephone'       => '+5551999999999',
            'priceRange'      => '$$',
            'address'         => array(
                '@type'           => 'PostalAddress',
                'addressLocality' => 'Porto Alegre',
                'addressRegion'   => 'RS',
                'addressCountry'  => 'BR',
            ),
            'geo'             => array(
                '@type'     => 'GeoCoordinates',
                'latitude'  => -30.0346,
                'longitude' => -51.2177,
            ),
            'hasMap'          => 'https://maps.google.com/?cid=SEU_CID_DO_GPE',
            'areaServed'      => array(
                '@type' => 'City',
                'name'  => 'Porto Alegre',
            ),
        ),

        // Entidade 2: O Website
        array(
            '@type'       => 'WebSite',
            '@id'         => $site_url . '#website',
            'url'         => $site_url,
            'name'        => $site_name,
            'description' => $site_desc,
            'publisher'   => array(
                '@id' => $site_url . '#organization',
            ),
        ),

        // Entidade 3: A Página Web (Home) e suas Seções
        array(
            '@type'     => 'WebPage',
            '@id'       => $site_url . '#webpage',
            'url'       => $site_url,
            'name'      => $site_name . ' | Gestão de Tráfego e SEO Local em Porto Alegre',
            'isPartOf'  => array(
                '@id' => $site_url . '#website',
            ),
            'about'     => array(
                '@id' => $site_url . '#organization',
            ),
            'hasPart'   => array(
                array(
                    '@type'       => 'WebPageElement',
                    'cssSelector' => '#hero',
                    'name'        => 'Apresentação e Posicionamento',
                ),
                array(
                    '@type'       => 'WebPageElement',
                    'cssSelector' => '#servicos',
                    'name'        => 'Pacotes de Gestão de Tráfego e SEO',
                ),
                array(
                    '@type'       => 'WebPageElement',
                    'cssSelector' => '#sobre',
                    'name'        => 'Sobre a Agência',
                ),
                array(
                    '@type'       => 'WebPageElement',
                    'cssSelector' => '#contato',
                    'name'        => 'Formulário de Contato',
                ),
            ),
        ),

    ),
);

// 3. Renderização do Script JSON-LD no HTML
?>
<script type="application/ld+json">
<?php echo json_encode( $schema_graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
</script>



















<?php
/**
 * Schema JSON-LD - Home Completa
 */
$schema_home = [
  "@context" => "https://schema.org",
  "@graph"   => [

      // ==========================================
      // 1. NEGÓCIO LOCAL (Contato, Prova Social, Localização e Serviços)
      // ==========================================
      [
          "@type"      => "LocalBusiness",
          "@id"        => "https://pulsocomercial.com.br/#organization",
          "name"       => "Pulso Comercial",
          "url"        => "https://pulsocomercial.com.br",
          "logo"       => "https://pulsocomercial.com.br/wp-content/uploads/logo.png",
          "image"      => "https://pulsocomercial.com.br/wp-content/uploads/hero-bg.jpg",
          "slogan"     => "Sua vitrine pulsando no Google e gerando contatos",
          "telephone"  => "+5551999999999",
          "priceRange" => "$$",
          
          "address"    => [
              "@type"           => "PostalAddress",
              "streetAddress"   => "Endereço da Firma, 123",
              "addressLocality" => "Porto Alegre",
              "addressRegion"   => "RS",
              "postalCode"      => "90000-000",
              "addressCountry"  => "BR"
          ],

          "contactPoint" => [
              "@type"             => "ContactPoint",
              "telephone"         => "+5551999999999",
              "contactType"       => "sales",
              "contactOption"     => "https://wa.me/5551999999999?text=Vim%20pelo%20site",
              "availableLanguage" => ["Portuguese"],
              "areaServed"        => "BR",
              "hoursAvailable"    => [
                  "@type"     => "OpeningHoursSpecification",
                  "dayOfWeek" => ["Monday","Tuesday","Wednesday","Thursday","Friday"],
                  "opens"     => "08:00",
                  "closes"    => "18:00"
              ]
          ],

          "potentialAction" => [
              "@type"  => "CommunicateAction",
              "target" => "https://wa.me/5551999999999?text=Vim%20pelo%20site",
              "name"   => "Chamar no WhatsApp"
          ],

          "hasMap" => "https://maps.google.com/?cid=SEU_CID_DO_MAPS",
          "geo"    => [
              "@type"     => "GeoCoordinates",
              "latitude"  => -30.0346,
              "longitude" => -51.2177
          ],
          
          "areaServed" => [
              [
                  "@type" => "AdministrativeArea",
                  "name"  => "Porto Alegre"
              ],
              [
                  "@type" => "AdministrativeArea",
                  "name"  => "Grande Porto Alegre"
              ]
          ],

          "location" => [
              "@type"                  => "Place",
              "name"                   => "Escritório Pulso Comercial",
              "geo"                    => [
                  "@type"     => "GeoCoordinates",
                  "latitude"  => -30.0346,
                  "longitude" => -51.2177
              ],
              "publicAccess"           => true,
              "hasDriveThroughService" => false
          ],

          "aggregateRating" => [
              "@type"       => "AggregateRating",
              "ratingValue" => "5.0",
              "reviewCount" => "24"
          ],

          "review" => [
              [
                  "@type"        => "Review",
                  "author"       => [
                      "@type" => "Person",
                      "name"  => "Nome do Contato"
                  ],
                  "reviewRating" => [
                      "@type"       => "Rating",
                      "ratingValue" => "5"
                  ],
                  "reviewBody"   => "Texto do depoimento trazido do Google..."
              ]
          ],

          "hasOfferCatalog" => [
              "@type"           => "OfferCatalog",
              "name"            => "Etapas do Crescimento Digital",
              "itemListElement" => [
                  [
                      "@type"           => "OfferCatalog",
                      "name"            => "Etapa 1: Combater a Invisibilidade e Tracionar",
                      "itemListElement" => [
                          [
                              "@type"       => "Offer",
                              "itemOffered" => [
                                  "@type"       => "Service",
                                  "name"        => "Google Perfil de Empresa",
                                  "image"       => "https://pulsocomercial.com.br/wp-content/uploads/card-gmn.jpg",
                                  "description" => "Otimização e gestão do perfil no Google para atrair contatos locais."
                              ]
                          ],
                          [
                              "@type"       => "Offer",
                              "itemOffered" => [
                                  "@type"       => "Service",
                                  "name"        => "Google Ads e Páginas de Captura",
                                  "image"       => "https://pulsocomercial.com.br/wp-content/uploads/card-ads.jpg",
                                  "description" => "Campanhas focadas em conversão com landing pages de alta performance."
                              ]
                          ]
                      ]
                  ],
                  [
                      "@type"           => "OfferCatalog",
                      "name"            => "Etapa 2: Construir Autoridade",
                      "itemListElement" => [
                          [
                              "@type"       => "Offer",
                              "itemOffered" => [
                                  "@type"       => "Service",
                                  "name"        => "Sites Institucionais",
                                  "image"       => "https://pulsocomercial.com.br/wp-content/uploads/card-sites.jpg",
                                  "description" => "Desenvolvimento de sites rápidos em WordPress focados em SEO."
                              ]
                          ],
                          [
                              "@type"       => "Offer",
                              "itemOffered" => [
                                  "@type"       => "Service",
                                  "name"        => "Buscadores e Inteligências Artificiais",
                                  "image"       => "https://pulsocomercial.com.br/wp-content/uploads/card-ai.jpg",
                                  "description" => "Otimização avançada para presença nos novos buscadores e IAs."
                              ]
                          ]
                      ]
                  ]
              ]
          ],

          "workExample" => [
              [
                  "@type" => "CreativeWork",
                  "name"  => "Otimização de SEO e Perfil no Google para Clínica X",
                  "url"   => "https://pulsocomercial.com.br/projetos/case-1",
                  "image" => "https://pulsocomercial.com.br/wp-content/uploads/thumb-case-1.jpg"
              ],
              [
                  "@type" => "CreativeWork",
                  "name"  => "Desenvolvimento de Site Institucional e Campanhas Ads",
                  "url"   => "https://pulsocomercial.com.br/projetos/case-2",
                  "image" => "https://pulsocomercial.com.br/wp-content/uploads/thumb-case-2.jpg"
              ]
          ]
      ],

      // ==========================================
      // 2. HERO & PÁGINA (A Home propriamente dita)
      // ==========================================
      [
          "@type"              => "WebPage",
          "@id"                => "https://pulsocomercial.com.br/#webpage",
          "url"                => "https://pulsocomercial.com.br",
          "name"               => "Pulso Comercial | Sua Vitrine Pulsando no Google",
          "headline"           => "Título Destacado do Hero",
          "description"        => "Primeiro subtítulo do Hero com a proposta principal. Segundo subtítulo com o complemento da mensagem.",
          "abstract"           => "Segundo subtítulo / Resumo curto da proposta de valor",
          "primaryImageOfPage" => [
              "@type"   => "ImageObject",
              "@id"     => "https://pulsocomercial.com.br/#heroImage",
              "url"     => "https://pulsocomercial.com.br/wp-content/uploads/hero-image.jpg",
              "caption" => "Sua vitrine pulsando no Google - Pulso Comercial"
          ],
          "about"              => [
              "@id" => "https://pulsocomercial.com.br/#organization"
          ],
          "potentialAction"    => [
              "@type"  => "CommunicateAction",
              "name"   => "Texto do Botão do Hero",
              "target" => "https://wa.me/5551999999999?text=Vim%20pelo%20Hero%20do%20site"
          ]
      ]
  ]
];

echo '<script type="application/ld+json">' . json_encode($schema_home, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';






/*
    aqui foi
    perguntar p ele pq q na primera vez ele apresentou com haspart e agora como opsições em um array

    seguir a partir desta pergunta
    e depois, pedir p ele formatr no formato la de cima


*/

















