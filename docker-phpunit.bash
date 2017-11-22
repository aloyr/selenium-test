#!/bin/bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer install
docker run -it --rm  -v "$PWD":/app -w /app php:7.1-cli-alpine vendor/bin/phpunit $@
