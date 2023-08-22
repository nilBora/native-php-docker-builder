<?php

namespace App\Http\Controllers;

use App\Dto\FormDto;
use App\Factory\ImageFactory;
use Illuminate\Http\Request;

class Generator extends Controller
{
    public function make(Request $request)
    {
        $options = $request->get('options') ?? [];
        $formDto = new FormDto($request->get('docker-image'), $options, $request->get('tag'));

        $imageFactory = new ImageFactory($formDto->getBaseImage());

        $imageFactory->factory($formDto)->create();

//        $contents = file_get_contents(resource_path('/docker-template/Dockerfile.template'));
//
//        $contents = str_replace("{baseImage}", "php:8.2-alpine", $contents);
//
//        file_put_contents(resource_path('/docker-template/Dockerfile'), $contents);
    }
}
