# Stage 1: Build dependencies
FROM php:8.4-fpm-alpine AS builder

# Install build dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    curl-dev \
    libtool \
    libxml2-dev \
    postgresql-dev \
    sqlite-dev \
    oniguruma-dev \
    linux-headers

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mysqli \
    mbstring \
    opcache \
    pcntl \
    bcmath

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Stage 2: Final production image
FROM php:8.4-fpm-alpine

# Install only runtime dependencies
RUN apk add --no-cache \
    curl \
    libxml2 \
    postgresql-libs \
    sqlite-libs \
    oniguruma

# Copy PHP extensions from builder
COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/

# Copy Composer from builder
COPY --from=builder /usr/bin/composer /usr/bin/composer

# Add user for Laravel/PHP application
RUN addgroup -g 1000 www && \
    adduser -D -u 1000 -G www www

# Set working directory
WORKDIR /var/www

# Change ownership of working directory
RUN chown -R www:www /var/www

# Switch to www user
USER www

# Expose port 9000
EXPOSE 9000

CMD ["php-fpm"]