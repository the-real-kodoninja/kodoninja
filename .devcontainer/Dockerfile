# See here for image contents: https://github.com/microsoft/vscode-dev-containers/tree/v0.209.0/containers/php
FROM mcr.microsoft.com/vscode/devcontainers/php:8

# Install PostgreSQL
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install postgresql postgresql-contrib

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Set the default command to run PostgreSQL
CMD ["postgres"]