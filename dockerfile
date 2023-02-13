# Use an official PHP image as the base image
FROM php:7.4-apache

# Install the required extensions
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libicu-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpq-dev \
    && docker-php-ext-install \
    zip \
    curl \
    intl \
    gd \
    pdo_mysql \
    mysqli \
    bcmath

# Copy the PHP code into the Docker image
COPY ./php/ /var/www/html/

# Expose the default Apache port
EXPOSE 80

# Start Apache when the container is run
CMD ["apache2-foreground"]
