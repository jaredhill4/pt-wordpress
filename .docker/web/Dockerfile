# Default arguments
ARG PHP_VERSION=7.3

# Base image
FROM php:${PHP_VERSION}-apache

# Use arguments
ARG NODE_VERSION
ARG WEB_ROOT_DIR
ARG ACF_PRO_KEY
ARG COMPOSER_AUTH

# Environment variables
ENV NVM_DIR /usr/local/nvm
ENV ACF_PRO_KEY ${ACF_PRO_KEY}
ENV COMPOSER_AUTH ${COMPOSER_AUTH}

# Replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# Enable `mod_rewrite`
RUN a2enmod rewrite

# Install server dependencies
RUN apt-get update \
    && apt-get install -y git \
    sudo \
    curl \
    unzip \
    && docker-php-ext-install mysqli

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Get WP CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp \
    && echo 'wp() {' >> ~/.bashrc \
    && echo '/usr/local/bin/wp "$@" --allow-root' >> ~/.bashrc \
    && echo '}' >> ~/.bashrc

# Get NVM
RUN mkdir ${NVM_DIR} \
    && curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash \
    && source ${NVM_DIR}/nvm.sh \
    && nvm install ${NODE_VERSION} \
    && nvm alias default ${NODE_VERSION} \
    && nvm use default

# Add Node to the path
ENV NODE_PATH ${NVM_DIR}/v${NODE_VERSION}/lib/node_modules
ENV PATH ${NVM_DIR}/versions/node/v${NODE_VERSION}/bin:${PATH}

# Set the working directory to the web root
WORKDIR ${WEB_ROOT_DIR}

# Install Composer packages
COPY ["composer.*", "./"]
RUN composer install --no-scripts --prefer-dist

# Copy files
COPY . .
