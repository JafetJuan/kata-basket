<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Console\Application;
use Kata\Persistence\FileRepository;
use Kata\CreatePlayer\CreatePlayer;
use Kata\CreatePlayer\CreatePlayerCommand;
$pathFile =__DIR__ . '/../src/Ejemplo/data.txt';

$application = new Application();

$fileRepository = new FileRepository($pathFile);
$createPlayer = new CreatePlayer($fileRepository);
$createPlayerCommand = new CreatePlayerCommand($createPlayer);

$application->addCommands([$createPlayerCommand]);
$application->run();