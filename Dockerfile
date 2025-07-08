FROM php:8.2-cli

# Install mysqli
RUN docker-php-ext-install mysqli

WORKDIR /app
COPY . /app

CMD ["php", "-S", "0.0.0.0:10000"]
EXPOSE 10000
