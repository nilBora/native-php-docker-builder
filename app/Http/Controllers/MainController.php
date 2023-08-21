<?php

namespace App\Http\Controllers;

use App\Factory\ImagePackage;

class MainController extends Controller
{
    public function __construct(private readonly ImagePackage $imagePackage)
    {

    }

    public function index()
    {
        $allowPackages = $this->imagePackage->getAllowPackages();
        return view('main', ['allowPackages' => $allowPackages, 'baseImage' => 'alpine']);
    }
}
