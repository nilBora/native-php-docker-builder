<?php

namespace App\Http\Controllers;

class Generator extends Controller
{
    public function make()
    {
        $contents = file_get_contents(resource_path('/docker-template/Dockerfile.template'));

        $contents = str_replace("{baseImage}", "php:8.2-alpine", $contents);

        file_put_contents(resource_path('/docker-template/Dockerfile'), $contents);
    }
}
