/* Configuração da página. Edite aqui antes de publicar. */
window.WEAGLES_CONFIG = Object.freeze({
  // Endpoint público do backend que grava o lead no CRM. Sem tokens no navegador.
  // O serviço do site encaminha ao CRM; a chave nunca chega ao navegador.
  leadEndpoint: '/api/leads',
  whatsapp: '5516997833173',
  whatsappMessage: 'Olá! Vim pela página da Weagles e quero conversar sobre as vendas da minha empresa.',
  metaPixelId: '1467056031365003', // Dataset “Landing page”, conta Vitor Mkt (Ads).
  pixelEnabled: true,
  // Evita disparos de testes/prévias. Inclua aqui o domínio final se for diferente.
  pixelAllowedHosts: ['weagles.com.br', 'www.weagles.com.br'],
  companyEmail: 'consultoriaweagles@gmail.com'
});
