FROM php:8.2-fpm

# Instalando ferramentas
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip

# Configurando extensões
RUN docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    pdo pdo_mysql mysqli gd

# Crie um usuário do sistema para executar os comandos Composer e Artisan
RUN useradd -G www-data,root -u 1000 -d /home/user_application user_application
RUN mkdir -p /home/user_application/.composer && \
    chown -R user_application:user_application /home/user_application

# Adicionando debug
RUN pecl --no-cache $PHPIZE_DEPS \
	&& pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable xdebug

# Copiando composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./conf/php/script.sh /tmp/entrypoint.sh

RUN chmod +x /tmp/entrypoint.sh

USER user_application

EXPOSE 9000

ENTRYPOINT [ "/tmp/entrypoint.sh" ]
CMD [ "php-fpm" ]
