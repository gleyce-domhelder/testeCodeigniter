const { createProxyMiddleware } = require('http-proxy-middleware');

module.exports = function(app) {
  app.use(
    '/api', // Define o prefixo da URL que será redirecionada para o servidor PHP
    createProxyMiddleware({
      target: 'http://localhost:8000', // Endereço do servidor PHP
      changeOrigin: true,
    })
  );
};
