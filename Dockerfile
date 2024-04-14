# Use a imagem oficial do PHP 8.1 com Apache
FROM php:8.1-apache

# Atualize os pacotes e instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install zip && \
    a2enmod rewrite headers

# Copie o arquivo de configuração do Apache para o container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copie o conteúdo do seu projeto para o diretório do Apache
COPY . /var/www/html/

# Exponha a porta 80 para acesso externo
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
