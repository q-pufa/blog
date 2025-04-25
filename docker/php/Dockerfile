# Використовуємо PHP 8.3 з Apache
FROM php:8.3-apache

# Встановлюємо необхідні залежності
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql \
    && apt-get clean

# Завантажуємо та встановлюємо Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Встановлюємо модулі Apache
RUN a2enmod rewrite

# Копіюємо конфігураційний файл Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Вказуємо корінь документа
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Запускаємо Apache
CMD ["apache2-foreground"]
