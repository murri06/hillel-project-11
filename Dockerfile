FROM php:8.2-alpine
LABEL authors="ruslan"

RUN apk update && apk add curl


COPY . /var/www/html/

WORKDIR /var/www/html/