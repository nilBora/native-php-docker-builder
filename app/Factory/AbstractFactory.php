<?php

namespace App\Factory;

use Symfony\Component\Process\Process;

class AbstractFactory
{
    public function buildImage(string $path)
    {
        $process = new Process(["docker", "build", "-f", $path, ".", "--progress=plain", "--no-cache"]);
        //$process = new Process(["ls", "-ls"]);
        $process->setTimeout(3600);
        $process->run();

        print_r($process->getOutput());
        exit;
    }
}
