# どんな docker イメージを利用して構築をするか
FROM php:8.1-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
# ADD：ローカルのファイルをDockerコンテナ内にコピーする
COPY /docker/app/php.ini /usr/local/etc/php/
COPY /docker/app/000-default.conf /etc/apache2/sites-enabled/

# Composerのインストール
# RUN：コンテナ内でコマンド実行する
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# ミドルウェアのインストール
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libpng-dev \
    libpq-dev \
    libxrender-dev \
    libfontconfig \
    libssl-dev \
    && docker-php-ext-install pdo_mysql


# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite