FROM php:8.3-fpm

# Установка необходимых пакетов и PHP-расширений
RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      curl && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Копирование конфигурации PHP
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Копирование исходного кода (без storage, так как он вынесен в volume)
COPY app            /var/www/app
COPY bootstrap      /var/www/bootstrap
COPY config         /var/www/config
COPY database       /var/www/database
COPY public         /var/www/public
COPY resources      /var/www/resources
COPY routes         /var/www/routes
COPY artisan        /var/www/artisan
COPY package.json   /var/www/package.json
COPY package-lock.json   /var/www/package-lock.json
COPY vite.config.js /var/www/vite.config.js
COPY tailwind.config.js /var/www/tailwind.config.js
COPY postcss.config.js /var/www/postcss.config.js

COPY composer.*  ./

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin
# alias
RUN echo "alias a='artisan'" >> /root/.bashrc

# Установка Node.js
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
    RUN apt-get install -y nodejs

# Установка PHP-зависимостей через Composer
RUN composer install \
      --no-interaction \
      --no-plugins \
      --no-suggest \
      --no-scripts \
      --no-autoloader \
      --prefer-dist

# Настройка прав доступа
RUN composer dump-autoload  --no-scripts --optimize && \ 
    chown -R root:www-data /var/www && \
    chmod 755 -R /var/www && \
    chmod -R 777 /var/www/storage && \
    chmod -R 775 /var/www/bootstrap/cache

# Установка рабочей директории
WORKDIR /var/www
