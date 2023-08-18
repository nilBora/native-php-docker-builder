<?php

namespace App\Http\Controllers;

use App\Dto\FormDto;
use App\Factory\ImageFactory;
use Illuminate\Http\Request;

class Generator extends Controller
{
    public function make(Request $request)
    {
        $formDto = new FormDto($request->get('docker-image'), $request->get('options'));

        $imageFactory = new ImageFactory($formDto->getBaseImage());

        $imageFactory->factory($formDto)->create();

//        $contents = file_get_contents(resource_path('/docker-template/Dockerfile.template'));
//
//        $contents = str_replace("{baseImage}", "php:8.2-alpine", $contents);
//
//        file_put_contents(resource_path('/docker-template/Dockerfile'), $contents);
    }
}
