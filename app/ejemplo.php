<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Console\Application;
use Kata\Infrastructure\Command\CreatePlayerCommand;
use Kata\Infrastructure\Domain\Model\Player\FileRepository;
use Kata\Application\Player\CreatePlayer\CreatePlayerDataTransform;
use Kata\Application\Player\DeletePlayer\DeletePlayer;
use Kata\Infrastructure\Command\DeletePlayerCommand;
use Kata\Application\Player\CreatePlayer\CreatePlayer;
use Kata\Application\Player\ListPlayer\ListPlayer;
use Kata\Infrastructure\Command\ListPlayerCommand;

$pathFile =__DIR__ . '/../src/Ejemplo/data.txt';

$application = new Application();
$fileRepository = new FileRepository($pathFile);

$createPlayer = new CreatePlayer($fileRepository, new CreatePlayerDataTransform());
$createPlayerCommand = new CreatePlayerCommand($createPlayer);

$deletePlayer = new DeletePlayer($fileRepository);
$deletePlayerCommand = new DeletePlayerCommand($deletePlayer);

$listPlayer = new ListPlayer($fileRepository, new \Kata\Application\Player\ListPlayer\ListPlayerDataTransform());
$listPlayerCommand = new ListPlayerCommand($listPlayer);

$application->addCommands([$createPlayerCommand, $deletePlayerCommand, $listPlayerCommand]);
$application->run();