# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Habilita módulos do Apache e PHP
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql && \
    a2enmod rewrite

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura o diretório de trabalho
WORKDIR /var/www/html

# Copia o conteúdo do seu projeto para o container
COPY . .

# Instalar dependências do Laravel
RUN composer install

# Expor a porta do Apache
EXPOSE 80

# Definir o comando de inicialização para o Apache
CMD ["apache2-foreground"]
