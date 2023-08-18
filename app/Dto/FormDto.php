<?php

namespace App\Dto;

class FormDto
{
    public function __construct(private readonly string $baseImage, private readonly array $options)
    {
    }

    public function getBaseImage(): string
    {
        return $this->baseImage;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
