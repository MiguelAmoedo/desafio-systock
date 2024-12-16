# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Define o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia o projeto Laravel para o diretório de trabalho
COPY . /var/www/html

# Define permissões necessárias para o Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Habilita o módulo rewrite do Apache (necessário para o Laravel)
RUN a2enmod rewrite

# Define o ponto de entrada
CMD ["apache2-foreground"]
