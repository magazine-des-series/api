# README

## Installation

### Development environment

```sh
# Install dependencies

composer install

# Prepare database

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console fixtures:load --fixtures app/fixtures --purge-with-truncate

# Run the tests

php bin/simple-phpunit --stop-on-failure

# Launch API via PHP built-in server

php bin/console server:start

# Go to "http://127.0.0.1:8000"
```
