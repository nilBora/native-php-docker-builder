<?php

namespace App\Factory;

use App\Dto\FormDto;

class AlpineImageFactory extends AbstractFactory implements ImageFactoryInterface
{
    public function __construct(protected readonly FormDto $formDto)
    {
    }

    public function create(): void
    {
        $contents = file_get_contents(resource_path('/docker-template/Dockerfile.template'));

        $contents = str_replace("{baseImage}", $this->formDto->getBaseImage(), $contents);


        $contents = $this->getPrepareContentsWithOptions($contents);

        file_put_contents(storage_path('/app/public/Dockerfile'), $contents);

        $this->buildImage(storage_path('/app/public/Dockerfile'));
    }

    private function getPrepareContentsWithOptions(string $contents): string
    {
        $options = $this->formDto->getOptions();
        $dataForOptions = $this->getDataForOptions();
        foreach ($options as $option) {
            if (!isset($dataForOptions[$option])) {
                continue;
            }

            $contents .= $dataForOptions[$option];
        }
        return $contents;
    }

    private function getDataForOptions(): array
    {
        return [
            'mcrypt' =>
            <<<EOT
# mcrypt
RUN apk add --no-cache libmcrypt-dev
RUN pecl install mcrypt
RUN docker-php-ext-enable mcrypt
\n
EOT,
            'bcmath' =>
            <<<EOT
# bcmath
RUN docker-php-ext-install bcmath
RUN docker-php-ext-enable bcmath
\n
EOT,
            'sockets' => <<<EOT
# sockets
RUN docker-php-ext-install sockets
RUN docker-php-ext-enable sockets
\n
EOT,
            'intl' => <<<EOT
# intl
RUN apk add --no-cache icu-dev
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl
\n
EOT,
            'opcache' => <<<EOT
# opcache
RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache
\n
EOT,
            'amqp' => <<<EOT
# amqp
RUN apk add --no-cache rabbitmq-c-dev
RUN pecl install amqp
RUN docker-php-ext-enable amqp
\n
EOT,
            'redis' => <<<EOT
# redis
RUN pecl install redis
RUN docker-php-ext-enable redis
\n
EOT,
            'zip' => <<<EOT
# zip
RUN apk add --no-cache libzip-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip
\n
EOT,
            'mysql' => <<<EOT
# mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
# pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql
\n
EOT,
            'pgsql' => <<<EOT
RUN apk add --no-cache postgresql-dev
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql
EOT,
            'gd' => <<<EOT
# gd
RUN apk add --no-cache libpng-dev libjpeg-turbo-dev freetype-dev
EOT
        ];
    }
}
