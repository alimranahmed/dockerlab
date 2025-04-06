FROM php:8.4-fpm-alpine

WORKDIR /app

COPY composer.json /app

#RUN composer install

COPY .. /app

EXPOSE 3000

CMD ["php", "start"]