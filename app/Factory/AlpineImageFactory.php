<?php

namespace App\Factory;

use App\Dto\FormDto;

class AlpineImageFactory implements ImageFactoryInterface
{
    public function __construct(private readonly FormDto $formDto)
    {
    }

    public function create(): string
    {

    }
}
