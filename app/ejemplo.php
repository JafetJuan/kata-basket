<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Console\Application;
use Kata\Ejemplo\IntSumApp;
use Kata\Ejemplo\IntSum;
use Kata\Ejemplo\FileRepo;

$application = new Application();

$intSumApp = new IntSumApp(
    new IntSum(
        new FileRepo(__DIR__ . '/../src/Ejemplo/data.txt')
    )
);

$application->addCommands([$intSumApp]);
$application->run();