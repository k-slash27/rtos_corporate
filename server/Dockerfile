FROM php:7.3-apache

# Apache のモジュールを有効化
RUN a2enmod rewrite

# install-php-extensions をインストール
# ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
# RUN chmod +x /usr/local/bin/install-php-extensions

# # PHP のエクステンションをインストール
# RUN install-php-extensions opcache intl gd exif imagick mysqli pdo_mysql redis xdebug

# # PHP の設定ファイルを配置
# COPY ./php.ini /usr/local/etc/php/php.ini
# RUN chmod 644 /usr/local/etc/php/php.ini