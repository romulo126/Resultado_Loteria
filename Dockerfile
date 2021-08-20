# VERSION  0.0.1
# AUTHOR: Romulo Henrique
# DESCRIPTION: Resultados Loterica
# CREATED AT: 2021-08-19
# UPDATEd AT: 2021-08-19 by Romulo Henrique

# base image
FROM wyveo/nginx-php-fpm:php74
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
COPY ./src /usr/share/nginx/html
RUN cd /usr/share/nginx/html
WORKDIR /usr/share/nginx/html
RUN composer update