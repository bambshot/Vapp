FROM php:7.4-apache

RUN apt-get update && \
    # 必要パッケージのインストール
    apt-get -y install zip unzip git libicu-dev && \
    docker-php-ext-install pdo_mysql intl

COPY ./apache2.conf /etc/apache2/
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled && \
    /bin/sh -c a2enmod rewrite

# composerのインストール
WORKDIR /usr/local
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer
