# Use uma imagem oficial do Node.js como base
FROM node:16

# Defina o diretório de trabalho
WORKDIR /usr/src/app

# Copie o arquivo package.json e package-lock.json (se existir)
COPY package*.json ./

# Instale as dependências
RUN npm install

# Copie o restante dos arquivos do projeto para o contêiner
COPY . .

# Exponha a porta 8080
EXPOSE 8080

# Inicie o servidor Vue.js
CMD ["npm", "run", "serve"]
