<?php

namespace App\Factory;

use App\Dto\FormDto;

class ImageFactory
{
    public function __construct(private readonly string $baseImage)
    {

    }

    public function factory(FormDto $formDto): ImageFactoryInterface
    {
        $ident = $this->getBaseIdentFromName();
        switch ($ident) {
            case 'alpine':
                return new AlpineImageFactory($formDto);
            default:
                throw new \Exception('Unknown base image');
        }
    }

    private function getBaseIdentFromName(): string
    {
        $idents = explode('-', $this->baseImage);
        return array_pop($idents);
    }
}
