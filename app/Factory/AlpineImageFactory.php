<?php

namespace App\Factory;

use App\Dto\FormDto;

class AlpineImageFactory implements ImageFactoryInterface
{
    public function __construct(private readonly FormDto $formDto)
    {
    }

    public function create(): void
    {
        $contents = file_get_contents(resource_path('/docker-template/Dockerfile.template'));

        $contents = str_replace("{baseImage}", $this->formDto->getBaseImage(), $contents);


        $contents = $this->getPrepareContentsWithOptions($contents);

        file_put_contents(resource_path('/docker-template/Dockerfile'), $contents);
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
EOT
        ];
    }
}
