<?php

namespace App\Factory;

class ImagePackage
{
    public function getAllowPackages(): array
    {
        return [
            'mysql' => ['default' => true],
            'pgsql' => [],
            'composer' => ['default' => true],
            'mcrypt' => ['default' => true],
            'bcmath' => ['default' => true],
            'sockets' => ['default' => true],
            'intl' => ['default' => true],
            'opcache' => ['default' => true],
            'amqp' => ['default' => true],
            'zip' => ['default' => true],
            'redis' => ['default' => true],
            'pcntl' => ['default' => true],
        ];
    }
}
