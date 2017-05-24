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

## Contributing

1. Fork it.
2. Create your branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.
