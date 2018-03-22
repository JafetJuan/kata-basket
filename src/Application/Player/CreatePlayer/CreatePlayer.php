<?php
namespace Kata\Application\Player\CreatePlayer;

use Kata\Domain\Model\Role\Role;
use Kata\Domain\Model\Player\Player;
use Kata\Domain\Model\Player\PlayerRepository;

class CreatePlayer
{
    private $repo;

    /**
     * @var CreatePlayerDataTransform
     */
    private $dataTransform;

    public function __construct(PlayerRepository $repo, CreatePlayerDataTransform $transform)
    {
        $this->repo = $repo;
        $this->dataTransform = $transform;
    }

    /**
     * @param CreatePlayerCommand $createPlayerCommand
     * @return array
     * @throws \Assert\AssertionFailedException
     */
    public function execute(CreatePlayerCommand $createPlayerCommand)
    {
        $this->repo->existDorsalException($createPlayerCommand->getDorsal());

        $player = new Player(
            $createPlayerCommand->getDorsal(),
            $createPlayerCommand->getName(),
            $createPlayerCommand->getRate(),
            new Role($createPlayerCommand->getRole())
        );

        $this->repo->add($player);

        return $this->dataTransform->transform($player);
    }
}