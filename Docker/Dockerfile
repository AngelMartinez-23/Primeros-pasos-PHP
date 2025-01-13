# Usar la imagen oficial de PHP 7.4 con Apache
FROM php:7.4-apache

# Instalar extensiones adicionales de PHP si es necesario
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos correctos para la carpeta del proyecto
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Exponer el puerto 80 para Apache
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
