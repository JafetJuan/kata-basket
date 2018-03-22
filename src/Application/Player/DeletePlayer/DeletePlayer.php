<?php
namespace Kata\Application\Player\DeletePlayer;

use Kata\Domain\Model\Player\PlayerRepository;

class DeletePlayer
{
    private $playerRepository;
    /**
     * DeletePlayer constructor.
     */
    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;

    }

    public function execute(DeletePlayerCommand $deletePlayerCommand)
    {
       $player = $this->playerRepository->findPlayerByDorsalOrNull($deletePlayerCommand->getDorsal());

       if($player){
            $this->playerRepository->deletePlayer($deletePlayerCommand->getDorsal());
       }
    }
}