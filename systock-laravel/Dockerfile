# Use uma imagem oficial do PHP como base
FROM php:8.1-fpm

# Instale dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    netcat-openbsd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /var/www

# Copie os arquivos do projeto para o contêiner
COPY . .

# Verifique se o .env existe e crie a partir do .env.example se necessário
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Instale as dependências do projeto com Composer
RUN composer install --no-dev --optimize-autoloader

# Ajuste permissões para o diretório de cache e logs do Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponha a porta 8000
EXPOSE 8000

# Inicie o servidor do Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
