// vue.config.js
module.exports = {
  devServer: {
    port: 8081, // Escolha a porta que deseja
  },
  chainWebpack: config => {
    // Remove a configuração padrão de `index.html` que o Vue CLI gera
    config.plugin('html').tap(args => {
      args[0].template = './public/index.ejs'; // Usando o template EJS
      return args;
    });
  }
};
